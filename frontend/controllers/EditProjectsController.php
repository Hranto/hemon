<?php

namespace frontend\controllers;

use Yii;
use common\models\Projects;
use common\models\ProjectsSearch;
use common\models\Upload;
use frontend\controllers\AdminController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EditProjectsController implements the CRUD actions for Projects model.
 */
class EditProjectsController extends AdminController
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Projects models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProjectsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Projects model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Projects model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Projects();
        $model->active=1;
        if ($model->load(Yii::$app->request->post()) ) { 
            $image = Upload::uploadImage($model); //var_dump($image); exit;
            $images = Upload::uploadImages($model); 
            $attachments = Upload::uploadFiles($model); 
            if ($model->save()) {
                // upload only if valid uploaded file instance found
                if ($image !== false) {
                    $path = Upload::getImageFile($image); 
                    $image->saveAs($path);
                }
                if ($images !== false) {
                    foreach ($images as $img) {
                        $path = Upload::getImageFile($img); 
                        //var_dump($path); exit;
                        $img->saveAs($path);
                    }
                }
                if ($attachments !== false) {
                    foreach ($attachments as $attachment) {
                        $path = Upload::getAttachmentFile($attachment); 
                        $attachment->saveAs($path);
                    }
                }
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Projects model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
        public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $params = Yii::$app->request->post();
        if(empty($params['updated_images'])) { $params['updated_images'] = array(); }
        if(empty($params['updated_files'])) { $params['updated_files'] = array(); }
        if ($model->load(Yii::$app->request->post()) ) { 
            $image = Upload::uploadImage($model);
            $images = Upload::uploadImages($model); 
            $attachments = Upload::uploadFiles($model);
            if (!$image) {
                $model->image = $model->oldAttributes['image']; 
            }
            if (!$images) {
                //if(!empty($params['updated_images'])) {
                    $model->images = json_encode($params['updated_images']); 
                // } else {
                //     $model->images = '';
                // }     
            } else {
                foreach ($images as $img) {
                    $path = Upload::getImageFile($img); 
                    $image_array[] = $img->name;
                    $img->saveAs($path);
                }
                $model->images = json_encode(array_merge($params['updated_images'], $image_array));
            }

            if (!$attachments) {
                //if(!empty($params['updated_files'])) {
                    $model->attachment = json_encode($params['updated_files']); 
                // } else {
                //     $model->attachment = ''; 
                // }
                
            } else {
                foreach ($attachments as $attachment) {
                    $path = Upload::getImageFile($attachment); 
                    $attachment_array[] = $attachment->name;
                    $attachment->saveAs($path);
                }
                $model->attachment = json_encode(array_merge($params['updated_files'], $attachment_array));
            }
            if ($model->save()) {
                // upload only if valid uploaded file instance found
                if ($image !== false) {
                    $path = Upload::getImageFile($image); 
                    $image->saveAs($path);
                }
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Projects model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Projects model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Projects the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Projects::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

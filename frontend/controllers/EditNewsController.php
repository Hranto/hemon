<?php

namespace frontend\controllers;

use Yii;
use common\models\news;
use common\models\NewsSearch;
use common\models\Upload;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * NewsController implements the CRUD actions for news model.
 */
class EditNewsController extends Controller
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
     * Lists all news models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single news model.
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
     * Creates a new news model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {   
        $model = new news();
        $model->active=1;
        if ($model->load(Yii::$app->request->post()) ) { 
            // echo '<pre>';
            // var_dump($model->images); exit;
            $image = Upload::uploadImage($model); //var_dump($image); //exit;
            $images = Upload::uploadImages($model); //var_dump($images);
            $attachments = Upload::uploadFiles($model); //var_dump($attachments); exit;
            //var_dump($model);
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
     * Updates an existing news model.
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
     * Deletes an existing news model.
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
     * Finds the news model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return news the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = news::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

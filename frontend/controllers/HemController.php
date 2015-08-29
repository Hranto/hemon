<?php
namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use frontend\controllers\BaseController;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\News;
use common\models\NewsQuery;
use common\models\Team;
use common\models\Projects;
use common\models\Partners;
use common\models\About;
use yii\data\Pagination;
use frontend\helpers\Helper;
use yii\helpers\Json;
use frontend\components\LangUrlManager;
/**
 * Site controller
 */
class HemController extends BaseController
{ 
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {   
        //$count = NewsQuery::getNewsesAndProjectsCount(); 
        //$pages = new Pagination(['totalCount' => $count['count'], 'forcePageParam' => false, 'pageSizeParam' => false, 'defaultPageSize' => 1]);
        $offset = 0;
        $limit = 2;
        $newses = NewsQuery::getNewsesAndProjects($offset, $limit);

        return $this->render('index', [
            'newses' => $newses,
             //'pages' => $pages
        ]);
    }

    public function actionMoreNews()
    {   
        $page = Yii::$app->request->get('page');
        $default_offset = 2;
        $limit = 2;
       
        $offset = $default_offset + $page*$limit;

        $count = NewsQuery::getNewsesAndProjectsCount();
        //var_dump($offset, $count); exit;
         
        if($offset >= $count['count']-1){
            $array = array(
                'status' => 2,
            );
        } else {
            $newses = NewsQuery::getNewsesAndProjects($offset, $limit);
            $html = Helper::ShowNews($newses); 
            $array = array(
                'status' => 1,
                'html' => $html,
            );
        }
   
        echo Json::encode($array);
    }

    public function actionProjects()
    {   
        $pages = new Pagination(['totalCount' => Projects::find()->count(), 'urlManager'=> new LangUrlManager, 'route'=>'/projects', 'forcePageParam' => true, 'pageSizeParam' => false, 'defaultPageSize' => 1]);
        //$pages->createUrl(5, null, true);
        $projects = Projects::find()->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('projects', [
            'projects' => $projects,
            'pages' => $pages
        ]);
    }

    public function actionProject()
    {   
        $params = Yii::$app->request->get();
        $project = Projects::find()->where(array('id'=>$params['id']))->one(); 
        $other_projects = Projects::find()->limit(3)->all(); 
        return $this->render('project', [
            'project' => $project,
            'other_projects' => $other_projects
        ]);
    }

    public function actionServices()
    {   
        $pages = new Pagination(['totalCount' => Projects::find()->count(), 'forcePageParam' => false, 'pageSizeParam' => false, 'defaultPageSize' => 1]);
        $projects = Projects::find()->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('services', [
            'projects' => $projects,
            'pages' => $pages
        ]);
    }

    public function actionPartners()
    {   
        $partners = Partners::find()->all();
        return $this->render('partners', [
            'partners' => $partners
        ]);
    }

    public function actionNews()
    {   
        $params = Yii::$app->request->get();
        $news = News::find()->where(array('id'=>$params['id']))->one(); 
        $other_news = News::find()->limit(3)->all(); 
        return $this->render('news', [
            'news' => $news,
            'other_news' => $other_news
        ]);
    }

    public function actionTeam()
    {   
        $team = Team::find()->all();
        return $this->render('team', [
            'team' => $team
        ]);
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContacts()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionAbout()
    {   
        $about = About::find()->one(); //var_dump($about); exit;
        return $this->render('about', [
            'about' => $about,
        ]);
    }

    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->getSession()->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->getSession()->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->getSession()->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

}

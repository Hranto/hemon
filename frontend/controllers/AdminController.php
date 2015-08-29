<?php

namespace frontend\controllers;

use Yii;
use frontend\assets\AppAsset;
class AdminController extends \yii\web\Controller
{
	public function init(){
		$this->layout = 'main-admin';
		if(Yii::$app->user->isGuest){
			return $this->redirect('/login');
		}
	}

	public function actionIndex(){
		
		return $this->render('index', []);
	}
}

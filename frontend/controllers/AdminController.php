<?php

namespace frontend\controllers;

use Yii;

class AdminController extends \yii\web\Controller
{
	public function init(){
		if(Yii::$app->user->isGuest){
			return $this->redirect('/login');
		}
	}

	public function actionIndex(){
		return $this->render('index', []);
	}
}

<?php

namespace frontend\controllers;

use Yii;

class BaseController extends \yii\web\Controller
{
	public function init(){
		$params = Yii::$app->request->get();
		if(!empty($params['language'])) {
			Yii::$app->language = $params['language'];
		} else {
			Yii::$app->language = Yii::$app->params['default_language']; 
		}
	}
}

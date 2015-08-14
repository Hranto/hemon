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

	    /**
     * Create language urls
     *
     * @param $language
     * @return mixed|string
     */
    public static function createLanguageUrl($language){
        if(Yii::$app->request->url == '/' || Yii::$app->request->url == '/' . Yii::$app->language) {
            return '/' . $language;
        } elseif(strpos(Yii::$app->request->url, '/' . Yii::$app->language . '/') !== false){
            return str_replace('/' . Yii::$app->language . '/', '/' . $language . '/', Yii::$app->request->url);
        } else{
            return '/' . $language . '/' . substr(Yii::$app->request->url, 1);
        }
    }
}

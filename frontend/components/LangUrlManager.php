<?php
namespace frontend\components;

use yii\web\UrlManager;
use Yii;
class LangUrlManager extends UrlManager
{
    public function createUrl($params)
    {	
        if( isset($params['language']) ){
            $lang = $params['language'];
            unset($params['language']);
        } else {
            //Если не указан параметр языка, то работаем с текущим языком
            $lang = Yii::$app->params['default_language'];
        }
        //Получаем сформированный URL(без префикса идентификатора языка)
        $this->enablePrettyUrl = true;
        $this->showScriptName = false;
        $this->enableStrictParsing = false;       
        $url = parent::createUrl($params);

        //Добавляем к URL префикс - буквенный идентификатор языка
        if( $url == '/' ){
            return '/'.$lang;
        }else{
            return '/'.$lang.$url;
        }
    }
}

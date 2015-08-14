<?php
namespace frontend\helpers;
use Yii;

	class Helper
	{	

		public static function showNews($newses)
		{	$language = Yii::$app->language; 
			$html = '';
			$description = 'description_'.$language; 
			$title = 'title_'.$language; 
			foreach ($newses as $news) {
            $html .= '<div class="col-md-4">
                <img src="'.Yii::$app->params['uploadUrl'] . 'images/' . $news['image'].'" width="300px" height="200px">
                <h2>'.$news[$title].'</h2>
                <p>'.$news[$description].'</p>
                <p>
                	<a class="btn" href="/news?id='.$news['id'].'">'.Yii::t('app', 'Read more').'</a>
                </p>
            </div>';
        	}
        	return $html;
		}
		
}

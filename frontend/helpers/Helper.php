<?php
namespace frontend\helpers;
use Yii;

	class Helper
	{	

		public static function showNewsAndProjects($newses)
		{	
			if(!$newses){
				return '';
			}
			$language = Yii::$app->language; 
			$html = '';
			$description = 'description_'.$language; 
			$title = 'title_'.$language; 
			foreach ($newses as $news) { 
	            $html .='<div class="col-md-4"> 
	            			<div class="list-item">
				                <img class="img-responsive" src="'.Yii::$app->params['uploadUrl'] . 'images/' . $news['image'].'">
				                <div class="main-wrapper">
					                <h3 class="title">'.$news[$title].'</h3>
					                <p class="description">'.$news[$description].'</p>';
					                if($news['type']=='news'){
					                	$html .='<div class="date">'.date('Y-m-d', strtotime($news['created_date'])).'</div>';
					                } else {
					                	$html .='<div class="date">'.date('Y-m-d', strtotime($news['start_date'])).'';
					                	if(!empty($news['end_date'])) {
					                		$html .= ' - '.date('Y-m-d', strtotime($news['end_date'])). ' </div>';
					                	} else {
					                		$html .= '</div>';
					                	}
					                }
					                $html .='<a class="btn pull-right" href="/'.$news['type'].'?id='.$news['id'].'">'.Yii::t('app', 'Read more').'</a>
					                <div class="clear-block"></div>
					            </div>    
				            </div>
	            		 </div>';
        	}
        	return $html;
		}
		
		public static function showNews($newses)
		{	
			if(!$newses){
				return '';
			}
			$language = Yii::$app->language; 
			$html = '';
			$description = 'description_'.$language; 
			$title = 'title_'.$language; 
			foreach ($newses as $news) {
	            $html .='<div class="col-md-4">
	            			<div class="list-item">
				                <img class="img-responsive" src="'.Yii::$app->params['uploadUrl'] . 'images/' . $news['image'].'">
				                <div class="main-wrapper">
					                <h3 class="title">'.$news[$title].'</h3>
					                <p class="description">'.$news[$description].'</p>
					                <div class="date">'.date('Y-m-d', strtotime($news['created_date'])).'</div>
					                <a class="btn pull-right" href="/news?id='.$news['id'].'">'.Yii::t('app', 'Read more').'</a>
					                <div class="clear-block"></div>
					            </div>    
				            </div>
	            		 </div>';
        	}
        	return $html;
		}

		public static function showProjects($projects)
		{	
			if(!$projects){
				return '';
			}
			$language = Yii::$app->language; 
			$html = '';
			$description = 'description_'.$language; 
			$title = 'title_'.$language; 
			foreach ($projects as $project) {
	            $html .='<div class="col-md-4">
	            			<div class="list-item">
				                <img class="img-responsive" src="'.Yii::$app->params['uploadUrl'] . 'images/' . $project['image'].'">
				                <div class="main-wrapper">
					                <h3 class="title">'.$project[$title].'</h3>
					                <p class="description">'.$project[$description].'</p>';
									$html .='<div class="date">'.date('Y-m-d', strtotime($project['start_date'])).'';
				                	if(!empty($project['end_date'])) {
				                		$html .= '-'.date('Y-m-d', strtotime($project['end_date'])). ' </div>';
				                	} else {
				                		$html .= '</div>';
				                	}					              
					                $html .='<a class="btn pull-right" href="/project?id='.$project['id'].'">'.Yii::t('app', 'Read more').'</a>
					                <div class="clear-block"></div>
					            </div>    
				            </div>
	            		 </div>';
        	}
        	return $html;
		}
}

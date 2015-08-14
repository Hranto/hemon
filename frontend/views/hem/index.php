<?php
/* @var $this yii\web\View */
use frontend\widgets\MySlider;
use yii\widgets\LinkPager;
use frontend\helpers\Helper;
$language = Yii::$app->language;
$this->title = 'My Yii Application';
?>
<div class="site-index">

       <div class="container-fluid">
    <div class="row">

        <div class="col-md-12">
            <?php echo MySlider::widget(); ?>
            
        </div>
    </div>
    <div class="row" id="prew">
        <?php  echo Helper::showNews($newses);  ?>      
    </div>
    <div class="btn" id="more_news" data-page='2'>LOAD MORE</div>
  
</div>
</div>           
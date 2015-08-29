<?php
/* @var $this yii\web\View */
use frontend\widgets\MySlider;
use frontend\helpers\Helper;
$language = Yii::$app->language;
$this->title = Yii::t('app', 'news');
?>
<section>
    <div class="container-fluid">
        <div class="row">
            <?php echo MySlider::widget(); ?>
        </div>
    </div>
<section>   
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="page-title"><?php echo Yii::t('app', 'news') ?></h2>
            </div>
        </div>
        <div class="row" id="prew">
            <?php  echo Helper::showNewsAndProjects($newses);  ?>
        </div>
        <div class="row text-center">
            <button class="btn more" id="more_news" data-page="0"><?php echo Yii::t('app', 'load more') ?></button>
        </div>
    </div>
</section>      
<script type="text/javascript">
    var a = document.body;
    if (a.classList) {
        a.classList.add('news-page');
    } else {
        a.className += ' news-page';
    }
</script>
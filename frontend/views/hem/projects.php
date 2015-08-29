<?php
/* @var $this yii\web\View */
use yii\widgets\LinkPager;
use frontend\helpers\Helper;
$language = Yii::$app->language;
$this->title = Yii::t('app', 'projects');
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="page-title"><?php echo Yii::t('app', 'projects'); ?></h2>
            </div>
        </div>
        <div class="row">
           <?php  echo Helper::showProjects($projects);  ?>
        </div>
         <?php echo LinkPager::widget([
            'pagination' => $pages,
         ]); ?>
    </div>
</section>           
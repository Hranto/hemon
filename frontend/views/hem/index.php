<?php
/* @var $this yii\web\View */
use frontend\widgets\MySlider;
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
    <div class="row">
        <?php   foreach ($newses as $news) { ?>
            <div class="col-md-4">
                <img alt="Bootstrap Image Preview" src="<?php echo Yii::$app->params['uploadUrl'] . 'images/' . $news->image; ?>" width='300px' height='200px'>
                <h2>
                    <?php $title = 'title_'.$language; 
                        echo $news->$title;
                    ?>
                    <?php //echo Yii::t('app', 'contacts'); ?>
                </h2>
                <p>
                    <?php $description = 'description_'.$language; 
                        echo $news->$description;
                    ?>
                </p>
                <p>
                    <a class="btn" href="#"><?php echo Yii::t('app', 'Read more'); ?></a>
                </p>
            </div>
        <?php } ?>
        
    </div>
</div>
</div>           
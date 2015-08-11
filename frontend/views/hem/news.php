<?php
/* @var $this yii\web\View */
use yii\helpers\Json;
$language = Yii::$app->language;
$this->title = 'My Yii Application';
?>
<div class="site-index"><?php //var_dump($news); exit; ?>
    <div class="container-fluid">
        <div class="row">
        </div>
        <div class="row">
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

                </div>   
                <div>
                    <?php if(!empty($news->images)) {
                        $images = json_decode($news->images);
                        foreach ($images as $img) { ?>
                            <img alt="Bootstrap Image Preview" src="<?php echo Yii::$app->params['uploadUrl'] . 'images/' . $img; ?>" width='150px' height='100px'>
                    <?php } 
                        }
                    ?>
                </div>    
                <div>
                    <?php if(!empty($news->attachment)) {
                        $attachments = json_decode($news->attachment);
                        foreach ($attachments as $attachment) { ?>
                        <a class="btn" href="<?php echo Yii::$app->params['uploadUrl'] . 'files/' . $attachment; ?>"><?php echo Yii::t('app', 'Read more'); ?></a>
                    <?php } 
                        }
                    ?>
                </div>       
        </div>

        <div class="row">
        <?php   foreach ($other_news as $other) { ?>
            <div class="col-md-4">
                <img alt="Bootstrap Image Preview" src="<?php echo Yii::$app->params['uploadUrl'] . 'images/' . $other->image; ?>" width='300px' height='200px'>
                <h2>
                    <?php $title = 'title_'.$language; 
                        echo $other->$title;
                    ?>
                    <?php //echo Yii::t('app', 'contacts'); ?>
                </h2>
                <p>
                    <?php $description = 'description_'.$language; 
                        echo $other->$description;
                    ?>
                </p>
                <p>
                    <a class="btn" href="/news?id=<?php echo $other->id; ?>"><?php echo Yii::t('app', 'Read more'); ?></a>
                </p>
            </div>
        <?php } ?>
        
    </div>
    </div>
</div>           
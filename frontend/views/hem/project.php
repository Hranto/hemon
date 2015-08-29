<?php
/* @var $this yii\web\View */
use yii\helpers\Json;
use frontend\helpers\Helper;
$language = Yii::$app->language;
$this->title = 'My Yii Application';
?>
<div class="site-index"><?php //var_dump($news); exit; ?>
    <div class="container-fluid">
        <div class="row">
        </div>
        <div class="row">
                <div class="col-md-4">
                    <img alt="Bootstrap Image Preview" src="<?php echo Yii::$app->params['uploadUrl'] . 'images/' . $project->image; ?>" width='300px' height='200px'>
                    <h2>
                        <?php $title = 'title_'.$language; 
                            echo $project->$title;
                        ?>
                        <?php //echo Yii::t('app', 'contacts'); ?>
                    </h2>
                    <p>
                        <?php $description = 'description_'.$language; 
                            echo $project->$description;
                        ?>
                    </p>

                </div>   
                <div>
                    <?php if(!empty($project->images)) {
                        $images = json_decode($project->images);
                        foreach ($images as $img) { ?>
                            <img alt="Bootstrap Image Preview" src="<?php echo Yii::$app->params['uploadUrl'] . 'images/' . $img; ?>" width='150px' height='100px'>
                    <?php } 
                        }
                    ?>
                </div>    
                <div>
                    <?php if(!empty($project->attachment)) {
                        $attachments = json_decode($project->attachment);
                        foreach ($attachments as $attachment) { ?>
                        <a class="btn" href="<?php echo Yii::$app->params['uploadUrl'] . 'files/' . $attachment; ?>"><?php echo Yii::t('app', 'Read more'); ?></a>
                    <?php } 
                        }
                    ?>
                </div>       
        </div>

        <div class="row">
            <?php  echo Helper::showProjects($other_projects);  ?>       
        </div>
    </div>
</div>           
<?php
/* @var $this yii\web\View */
$language = Yii::$app->language;
$this->title = 'My Yii Application';
?>
<div class="site-index"><?php //var_dump($news); exit; ?>
    <div class="container-fluid">
        <div class="row">
            <?php   foreach ($partners as $partner) { ?>
                <div class="col-md-4">
                    <img alt="Bootstrap Image Preview" src="<?php echo Yii::$app->params['uploadUrl'] . 'images/' . $partner->image; ?>" width='300px' height='200px'>
                    <h2>
                        <?php $title = 'title_'.$language; 
                            echo $partner->$title;
                        ?>
                        <?php //echo Yii::t('app', 'contacts'); ?>
                    </h2>
                    <p>
                        <?php $description = 'description_'.$language; 
                            echo $partner->$description;
                        ?>
                    </p>
                    <p>
                        <?php $projects = 'projects_'.$language; 
                            echo $partner->$projects;
                        ?>
                    </p>
                    <p>
                        <a class="btn" href="/news?id=<?php echo $partner->id; ?>"><?php echo Yii::t('app', 'Read more'); ?></a>
                    </p>
                </div>
            <?php } ?>   
        </div>
    </div>
</div>           
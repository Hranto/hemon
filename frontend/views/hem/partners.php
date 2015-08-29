<?php
/* @var $this yii\web\View */
$language = Yii::$app->language;
$this->title = Yii::t('app', 'Partners');
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="page-title"><?php echo Yii::t('app', 'partners'); ?></h2>
            </div>
            <div class="clear-block"></div>
            <?php   foreach ($partners as $partner) { ?>
            <div class="col-md-12">
                <div class="col-md-4">
                    <div class="partner-logo-container">
                         <img src="<?php echo Yii::$app->params['uploadUrl'] . 'images/' . $partner->image; ?>">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="partnership-info">
                        <p class="company-name">
                            <?php 
                                $title = 'title_'.$language; 
                                echo $partner->$title;
                            ?>
                        </p>
                        <p class="partner-description">
                            <?php 
                                $description = 'description_'.$language; 
                                echo $partner->$description;
                            ?>
                        </p>
                        <p class="project">Our projects</p>
                        <p class="short-info">
                            <?php 
                                $projects = 'projects_'.$language; 
                                echo $partner->$projects;
                            ?>
                            <span><?php echo Yii::t('app', 'Read more'); ?></span>
                        </p>
                    </div>
                </div>
            </div>
        <?php } ?> 
        </div>
    </div>
</section>         
<?php
/* @var $this yii\web\View */
use yii\widgets\LinkPager;
$language = Yii::$app->language;
$this->title = 'My Yii Application';
?>
<div class="site-index"><?php //var_dump($news); exit; ?>
    <div class="container-fluid">
        <div class="row">
            <?php   foreach ($projects as $project) { ?>
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
                    <p>
                        <a class="btn" href="/project?id=<?php echo $project->id; ?>"><?php echo Yii::t('app', 'Read more'); ?></a>
                    </p>
                </div>
            <?php } ?> 
        </div>
         <?php echo LinkPager::widget([
            'pagination' => $pages,
            // 'nextPageLabel' => false,
         ]); ?>
    </div>
</div>           
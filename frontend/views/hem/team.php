<?php
/* @var $this yii\web\View */
$language = Yii::$app->language;
$this->title = 'My Yii Application';
?>
<div class="site-index">

   <div class="container-fluid">
        <div class="row">  
           <img alt="Carousel Bootstrap First" src="http://lorempixel.com/output/sports-q-c-1200-500-1.jpg">
        </div>
        <div class="row">
            <?php   foreach ($team as $member) { ?>
                <div class="col-md-4">
                    <img alt="Bootstrap Image Preview" src="<?php echo Yii::$app->params['uploadUrl'] . 'images/' . $member->image; ?>" width='300px' height='200px'>
                    <h2>
                        <?php $name = 'name_'.$language; 
                            echo $member->$name;
                        ?>
                        <?php //echo Yii::t('app', 'contacts'); ?>
                    </h2>
                    <h2>
                        <?php $sname = 'sname_'.$language; 
                            echo $member->$sname;
                        ?>
                    </h2>
                    <h2>
                        <?php $position = 'position_'.$language; 
                            echo $member->$position;
                        ?>
                    </h2>
                </div>
            <?php } ?>
            
        </div>
    </div>
</div>           
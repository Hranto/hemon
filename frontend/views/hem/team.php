<?php
/* @var $this yii\web\View */
$language = Yii::$app->language;
$this->title = Yii::t('app', 'Team');
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="page-title"><?php echo Yii::t('app', 'our team'); ?></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="img-conatiner">
                    <img src="/static/img/team-pic.png" class="img-responsive">
                </div>
            </div>
        </div>
        <div class="row">
        <?php   foreach ($team as $member) { ?>
            <div class="col-md-3">
                <div class="team-member">
                    <img class="img-responsive" src="<?php echo Yii::$app->params['uploadUrl'] . 'images/' . $member->image; ?>" >
                    <div class="main-wrapper text-center">
                        <p class="member-name">
                            <?php 
                                $name = 'name_'.$language; 
                                echo $member->$name.' ';
                                $sname = 'sname_'.$language; 
                                echo $member->$sname;
                            ?>
                        </p>
                        <div class="divider"></div>
                        <p class="member-position">
                            <?php 
                                $position = 'position_'.$language; 
                                echo $member->$position;
                            ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>
</section>       
<?php
$language = Yii::$app->language;
$i = 0;
$flag = true;
$description = 'description_'.$language; 
$title = 'title_'.$language; 
?>
<!-- start slider -->
<div class="carousel slide" id="carousel-106546">
    <ol class="carousel-indicators">
        <?php while( $i < count($slides) ) { ?>
            <li data-slide-to="<?php echo $i; ?>" data-target="#carousel-106546" <?php if($i==0) { echo 'class="active"'; } ?> >
            </li>
        <?php $i++;
        } ?>
    </ol>
    <div class="carousel-inner">
        <?php foreach( $slides as $slide ) { ?>
        <?php if($flag) { 
            $flag = false; 
        ?> 
            <div class="item active">
        <?php } else { ?>
            <div class="item">
        <?php }?>
        
            <img alt="" src="<?php echo Yii::$app->params['uploadUrl'] . 'images/' . $slide['image'] ?>">
            <div class="carousel-caption">
                <h2>
                    <?php echo $slide[$title]; ?>
                </h2>
                <p>
                    <?php echo $slide[$description]; ?>
                </p>
            </div>
        </div>
        <?php } ?>
       
    </div> 
   <!--  <a class="left carousel-control" href="#carousel-106546" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> 
    <a class="right carousel-control" href="#carousel-106546" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a> -->
</div>
<!-- end slider -->

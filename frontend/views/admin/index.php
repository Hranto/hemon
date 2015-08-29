<?php
/* @var $this yii\web\View */
use frontend\widgets\MySlider;
use yii\widgets\LinkPager;
use frontend\assets\AppAsset;
$language = Yii::$app->language;
$this->title = 'Admin';
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-success" href="/edit-projects">Create Projects</a>
            <a class="btn btn-success" href="/edit-partners">Create partners</a>
            <a class="btn btn-success" href="/edit-news">Create news</a>
            <a class="btn btn-success" href="/edit-team">Create team</a>
            <a class="btn btn-success" href="/edit-about">Create about</a>
            <a class="btn btn-success" href="/edit-services">Create services</a>
            <a class="btn btn-success" href="/edit-slider">Create slider</a>
        </div>
    </div>
</div>
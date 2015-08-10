<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\news */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

     <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <div class="col-sm-8">
        <div class="form-group field-demo-image">
<label class="control-label" for="demo-image">Image</label>
<input type="hidden" name="Demo[image]" value=""><div class="file-input file-input-new"><div class="file-preview">
    <div class="close fileinput-remove">×</div>
    <div class="">
    <div class="file-preview-thumbnails"></div>
    <div class="clearfix"></div>    <div class="file-preview-status text-center text-success"></div>
    <div class="kv-fileinput-error file-error-message" style="display: none;"></div>
    </div>
</div>
<div class="kv-upload-progress hide"><div class="progress">
    <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%;">
        0%
     </div>
</div></div>
<div class="input-group ">
   <div tabindex="500" class="form-control file-caption  kv-fileinput-caption">
   <div class="file-caption-name" title=""></div>
</div>

   <div class="input-group-btn">
       <button type="button" tabindex="500" title="Clear selected files" class="btn btn-default fileinput-remove fileinput-remove-button"><i class="glyphicon glyphicon-trash"></i> Remove</button>
       <button type="button" tabindex="500" title="Abort ongoing upload" class="btn btn-default hide fileinput-cancel fileinput-cancel-button"><i class="glyphicon glyphicon-ban-circle"></i> Cancel</button>
       <button type="submit" tabindex="500" title="Upload selected files" class="btn btn-default fileinput-upload fileinput-upload-button"><i class="glyphicon glyphicon-upload"></i> Upload</button>
       <div tabindex="500" class="btn btn-primary btn-file"><i class="glyphicon glyphicon-folder-open"></i> &nbsp;Browse …<input type="file" id="demo-image" class="" name="Demo[image]" accept="image/*" data-krajee-fileinput="fileinput_84f9f1b5"></div>
   </div>
</div></div>
<!--[if lt IE 10]><br><div class="alert alert-warning"><strong>Note:</strong> Your browser does not support file preview and multiple file upload. Try an alternative or more recent browser to access these features.</div><script>document.getElementById("demo-image").className.replace(/\bfile-loading\b/,"");;</script><![endif]-->

<div class="help-block"></div>
</div>  </div>
    <?= $form->field($model, 'image')->input('file', ['accept' => "image/*"]) ?>

    <?= $form->field($model, 'title_en')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'title_ru')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'title_am')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description_en')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description_ru')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description_am')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <?= $form->field($model, 'updated_date')->textInput() ?>

    <?= $form->field($model, 'images')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'attachment')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

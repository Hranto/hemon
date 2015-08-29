<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Projects */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="projects-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>
    
    <img id="general_prew" src="<?php if ($model->image) { echo Yii::$app->params['uploadUrl'] . 'images/' . $model->image; } ?>"  class="img-thumbnail" width="300px">

    <?= $form->field($model, 'image')->fileInput(['accept' => "image/*"]) ?>

    <?= $form->field($model, 'title_en')->textarea(['rows' => 1]) ?>

    <?= $form->field($model, 'title_ru')->textarea(['rows' => 1]) ?>

    <?= $form->field($model, 'title_am')->textarea(['rows' => 1]) ?>

    <?= $form->field($model, 'description_en')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description_ru')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description_am')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <?= $form->field($model, 'updated_date')->textInput() ?>

    <?= $form->field($model, 'start_date')->textInput() ?>

    <?= $form->field($model, 'end_date')->textInput() ?>
    <label class="control-label" for="projects-images">Images</label>
    <div id='second_prew'>
        <?php if(!empty($model->images)) {
            $images = json_decode($model->images);
            foreach ($images as $img) { ?>
                <div style="float:left; margin-bottom:20px; margin-right:20px">
                    <img alt="" src="<?php echo Yii::$app->params['uploadUrl'] . 'images/' . $img; ?>"  class="img-thumbnail" width="200px">
                    <input type="hidden" name="updated_images[]" value="<?php echo $img ?>">
                    <div class="btn remove btn-danger" >Remove</div>
                </div>
        <?php } 
           }
        ?>
    </div>     
    <div class="clear-block"></div>
    <?= $form->field($model, 'images[]')->fileInput(['multiple' => true, 'accept' => 'image/*'])->label(false)  ?>

    <div id="files_prew">
        <?php  if(!empty($model->attachment)) { 
            $attachments = json_decode($model->attachment); 
            foreach ($attachments as $attachment) { ?>
                <div>
                    <div class=""><a target="_blank" href="<?php echo Yii::$app->params['uploadUrl'] . 'files/' . $attachment; ?>"><?php echo $attachment; ?></a></div>
                    <input type="hidden" name="updated_files[]" value="<?php echo $attachment ?>">
                    <div class="btn remove">Remove</div>
                </div>
        <?php } 
           }
        ?>
    </div> 
    
    <?= $form->field($model, 'attachment[]')->fileInput(['multiple' => true])  ?>

    <?= $form->field($model, 'active')->radioList([1 => 'Active', 0 => 'Passive']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

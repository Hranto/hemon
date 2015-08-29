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
     
     <img id="general_prew" src="<?php if ($model->image) { echo Yii::$app->params['uploadUrl'] . 'images/' . $model->image; } ?>">

    <?= $form->field($model, 'image')->fileInput(['accept' => "image/*"]) ?>

    <?= $form->field($model, 'title_en')->textarea(['rows' => 1]) ?>

    <?= $form->field($model, 'title_ru')->textarea(['rows' => 1]) ?>

    <?= $form->field($model, 'title_am')->textarea(['rows' => 1]) ?>

    <?= $form->field($model, 'description_en')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description_ru')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description_am')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <?= $form->field($model, 'updated_date')->textInput() ?>

    <div id='second_prew'>
        <?php if(!empty($model->images)) {
            $images = json_decode($model->images);
            foreach ($images as $img) { ?>
                <div>
                    <img alt="" src="<?php echo Yii::$app->params['uploadUrl'] . 'images/' . $img; ?>" width='150px' height='100px'>
                    <input type="hidden" name="updated_images[]" value="<?php echo $img ?>">
                    <div class="btn remove" >Remove</div>
                </div>
        <?php } 
           }
        ?>
    </div>     

    <?= $form->field($model, 'images[]')->fileInput(['multiple' => true, 'accept' => 'image/*'])  ?>

    <div id="files_prew">
        <?php  if(!empty($model->attachment)) { 
            $attachments = json_decode($model->attachment); 
            foreach ($attachments as $attachment) { ?>
                <div>
                    <div class=""><?php echo Yii::$app->params['uploadUrl'] . 'files/' . $attachment; ?></div>
                    <input type="hidden" name="updated_files[]" value="<?php echo $attachment ?>">
                    <div class="btn remove" >Remove</div>
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
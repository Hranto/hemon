<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Team */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="team-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <img id="general_prew" src="<?php if ($model->image) { echo Yii::$app->params['uploadUrl'] . 'images/' . $model->image; } ?>"  class="img-thumbnail" width="300px">
    
    <?= $form->field($model, 'image')->fileInput(['accept' => "image/*"]) ?>

    <?= $form->field($model, 'name_en')->textarea(['rows' => 1]) ?>

    <?= $form->field($model, 'name_ru')->textarea(['rows' => 1]) ?>

    <?= $form->field($model, 'name_am')->textarea(['rows' => 1]) ?>

    <?= $form->field($model, 'sname_en')->textarea(['rows' => 1]) ?>

    <?= $form->field($model, 'sname_ru')->textarea(['rows' => 1]) ?>

    <?= $form->field($model, 'sname_am')->textarea(['rows' => 1]) ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <?= $form->field($model, 'updated_date')->textInput() ?>

    <?= $form->field($model, 'position_en')->textarea(['rows' => 1]) ?>

    <?= $form->field($model, 'position_ru')->textarea(['rows' => 1]) ?>

    <?= $form->field($model, 'position_am')->textarea(['rows' => 1]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

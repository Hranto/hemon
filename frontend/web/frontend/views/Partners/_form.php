<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Partners */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="partners-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_en')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'title_ru')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'title_am')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description_en')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description_ru')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description_am')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <?= $form->field($model, 'updated_date')->textInput() ?>

    <?= $form->field($model, 'projects_en')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'projects_ru')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'projects_am')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

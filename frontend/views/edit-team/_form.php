<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Team */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="team-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_en')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'name_ru')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'name_am')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'sname_en')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'sname_ru')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'sname_am')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <?= $form->field($model, 'updated_date')->textInput() ?>

    <?= $form->field($model, 'position_en')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'position_ru')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'position_am')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

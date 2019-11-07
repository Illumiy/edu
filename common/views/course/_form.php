<?php

use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Course */
/* @var $form yii\widgets\ActiveForm */


?>

<div class="course-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textarea(['rows' => 2]) ?>

    <?= $form->field($model, 'desc')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'image_text')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image_file')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rating')->textInput() ?>

    <?= $form->field($model, 'meta_keword')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'update_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'begin_at')->textInput() ?>

    <?= $form->field($model, 'end_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

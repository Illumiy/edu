<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\test_system\models\test\TestQuery */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="test-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'type') ?>

    <?= $form->field($model, 'begin_at') ?>

    <?php // echo $form->field($model, 'end_at') ?>

    <?php // echo $form->field($model, 'deadline_at') ?>

    <?php // echo $form->field($model, 'count_attempt') ?>

    <?php // echo $form->field($model, 'is_exam') ?>

    <?php // echo $form->field($model, 'is_draft') ?>

    <?php // echo $form->field($model, 'time_limit') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('test_system', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('test_system', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

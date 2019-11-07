<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datecontrol\DateControl;
use app\test_system\models\test\Test;

/* @var $this yii\web\View */
/* @var $model app\test_system\models\test\Test */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="test-form">

	<?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-12">
			<?= $form->field( $model, 'lecture_id' )->textInput( [ 'maxlength' => true ] ) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
			<?= $form->field( $model, 'title' )->textInput( [ 'maxlength' => true ] ) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
			<?= $form->field( $model, 'description' )->textarea( [ 'rows' => 6 ] ) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
			<?= $form->field( $model, 'type' )->textInput( [ 'maxlength' => true ] ) ?>
        </div>
        <div class="col-md-4">
			<?= $form->field( $model, 'count_attempt' )->textInput() ?>
        </div>
        <div class="col-md-4">
			<?= $form->field( $model, 'is_exam' )->textInput() ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
			<?= $form->field( $model, 'begin_at' )->widget( DateControl::classname(), [
				'type' => DateControl::FORMAT_DATETIME
			] ); ?>
        </div>
        <div class="col-md-4">
			<?= $form->field( $model, 'end_at' )->widget( DateControl::classname(), [
				'type' => DateControl::FORMAT_DATETIME
			] ); ?>
        </div>
        <div class="col-md-4">
			<?= $form->field( $model, 'deadline_at' )->widget( DateControl::classname(), [
				'type' => DateControl::FORMAT_DATETIME
			] ); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
	        <?= $form->field( $model, 'time_limit_hours' )->dropDownList( Test::listTime( 12 ) ) ?>
        </div>
        <div class="col-md-2">
	        <?= $form->field( $model, 'time_limit_minutes' )->dropDownList( Test::listTime( 60 ) ) ?>
        </div>
    </div>






    <div class="form-group">
		<?= Html::submitButton( Yii::t( 'test_system', 'Save' ), [ 'class' => 'btn btn-success' ] ) ?>
    </div>

	<?php ActiveForm::end(); ?>

</div>

<?php

use app\models\EducationalOrganization;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Group */
/* @var $form yii\widgets\ActiveForm */
/* @var $educationalOrganizationList EducationalOrganization::selectList() */
?>

<div class="group-form">

	<?php $form = ActiveForm::begin(); ?>

	<?= $form->field( $model, 'title' )->textInput( [ 'maxlength' => true ] ) ?>

	<?= $form->field( $model, 'year_begin' )->textInput() ?>

	<?= $form->field( $model, 'year_end' )->textInput() ?>

	<?= $form->field( $model, 'p_id' )->textInput() ?>

	<?= $form->field( $model, 'educational_organization_id' )->widget( Select2::classname(), [
		'data'          => $educationalOrganizationList,
		'options'       => [ 'placeholder' => Yii::t( 'app', 'Select a educational organization ...' ) ],
		'pluginOptions' => [
			'allowClear' => true
		],
	] ); ?>

    <div class="form-group">
		<?= Html::submitButton( Yii::t( 'app', 'Save' ), [ 'class' => 'btn btn-success' ] ) ?>
    </div>

	<?php ActiveForm::end(); ?>

</div>

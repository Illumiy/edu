<?php

use app\models\Course;
use kartik\markdown\MarkdownEditor;
use yii\console\Markdown;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Lecture */
/* @var $form yii\widgets\ActiveForm */

//$script = <<< JS
//	 console.log('fsdfsdf');
//           CKEDITOR.replace( 'editor' );
//JS;
//$this->registerJs($script,View::POS_READY);
$courseList = ArrayHelper::map(Course::coursesList(),'id','title');
?>

<div class="lecture-form">

	<?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-12">


			<?= $form->field( $model, 'title' )->textarea( [ 'rows' => 1 ] ) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">


			<?= $form->field( $model, 'course_id' )->widget(Select2::classname(), [
				 'data' => $courseList,
				'options' => [
					'placeholder' => Yii::t('app','Select a course'),
				],


			]); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6"><?= $form->field( $model, 'meta_keyword' )->textInput( [ 'maxlength' => true ] ) ?></div>
        <div class="col-md-6"><?= $form->field( $model, 'meta_description' )->textInput( [ 'maxlength' => true ] ) ?></div>
    </div>

        <div class="row">
            <div class="col-md-12">
				<?= MarkdownEditor::widget( [
					'model'     => $model,
					'attribute' => 'body',
				] ); ?>
            </div>
        </div>


        <div class="form-group">
			<?= Html::submitButton( Yii::t( 'app', 'Save' ), [ 'class' => 'btn btn-success' ] ) ?>
        </div>

		<?php ActiveForm::end(); ?>

    </div>

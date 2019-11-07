<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\LectureSerach */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="x_panel">
   <?php $form = ActiveForm::begin([
    'id' => 'login-form',
    'options' => ['class' => 'form-horizontal'],
    ]);
   echo $form->field($test, 'title');
   echo $form->field($test, 'type');
   echo $form->field($model, 'docFile')->widget(FileInput::classname(), [
       'options' => ['accept' => ['image/*','doc','pdf']],
   ]);
    ?>


    <p>
        <?= Html::submitButton('Далее', ['class' => 'btn btn-primary']) ?>
    </p>
    <?php ActiveForm::end() ?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>



</div>

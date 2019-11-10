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
   <?php 
   $form = ActiveForm::begin([
    'id' => 'login-form',
    'options' => ['class' => 'form-horizontal'],
    ]);
    echo $form->field($modeltest, 'id')->widget(Select2::classname(), [
        'data' => $datatest,
        'options' => ['placeholder' => 'Выберите тест для отправки работы'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
   echo $form->field($answer, 'title');
   echo $form->field($answer, 'description')->textInput();
   echo $form->field($model, 'docFile')->widget(FileInput::classname(), [
       'options' => ['accept' => ['image/*','doc','pdf']],
   ]);
    ?>


    <p>
        <?= Html::submitButton('Далее', ['class' => 'btn btn-primary']) ?>
    </p>
    <?php ActiveForm::end() ?>
</div>

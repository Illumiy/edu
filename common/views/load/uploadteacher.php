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

   echo $form->field($test, 'title');
   echo $form->field($test, 'description')->textInput();
   echo $form->field($test, 'time_limit');
   echo $form->field($test, 'count_attempt');
   echo $form->field($test, 'type')->widget(Select2::classname(), [
    'data' => [
        'Lab'=>'Лабораторная',
        'Practice'=>'Практическая',
        'Homework'=>'Домашняя'
    ],
    'options' => ['placeholder' => 'Выберите тип загружаемой работы'],
    'pluginOptions' => [
        'allowClear' => true
    ],
    ]);
    echo $form->field($test, 'is_exam')->widget(Select2::classname(), [
        'data' => [
            '0'=>'Не аттестующий',
            '1'=>'Аттестующий'
        ],
        'options' => ['placeholder' => 'Выберите тип аттестации'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    echo $form->field($test, 'is_draft')->widget(Select2::classname(), [
        'data' => [
            '0'=>'Не черновик',
            '1'=>'Черновик'
        ],
        'options' => ['placeholder' => 'Выберите тип черновика'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    
   echo $form->field($model, 'docFile')->widget(FileInput::classname(), [
       'options' => ['accept' => ['image/*','doc','pdf']],
   ]);
    ?>


    <p>
        <?= Html::submitButton('Далее', ['class' => 'btn btn-primary']) ?>
    </p>
    <?php ActiveForm::end() ?>
</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\LectureSerach */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title='Выбор учителя';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="x_panel">
   <?php $form = ActiveForm::begin([
    'id' => 'login-form',
    'options' => ['class' => 'form-horizontal'],
    ]);
    echo $form->field($model, 'id')->widget(Select2::classname(), [
        'data' => $data,
        'options' => ['placeholder' => 'Выберите учителя для отправки работы'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);

    ?>

    <p>
        <?= Html::submitButton('Далее', ['class' => 'btn btn-primary']) ?>
    </p>
    <?php ActiveForm::end() ?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>



</div>

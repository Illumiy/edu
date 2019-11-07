<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\grid\GridView;
use yii\helpers\Url;

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
    echo '<label class="control-label">Выберете тест</label>';
    echo Select2::widget([
        'name' => 'test',
        'data' => $data,
        'options' => [
            'placeholder' => 'Выберете тест',
            'required'=>'required'
        ],
    ]);

    ?>

    <p>
        <?= Html::submitButton('Далее', ['class' => 'btn btn-primary']) ?>
    </p>
    <?php ActiveForm::end() ?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>



</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\test_system\models\test\TestQuery */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('test_system', 'Tests');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="test-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('test_system', 'Create Test'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'description:ntext',
            'type',
            'begin_at',
            //'end_at',
            //'deadline_at',
            //'count_attempt',
            //'is_exam',
            //'is_draft',
            //'time_limit:datetime',
            //'created_at',
            //'updated_at',
            //'created_by',
            //'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

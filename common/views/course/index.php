<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\CourseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Courses');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Course'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title:ntext',
            'desc:ntext',
            'image_text',
            'image_file',
            //'rating',
            //'meta_keword',
            //'meta_description',
            //'created_at',
            //'update_at',
            //'created_by',
            //'begin_at',
            //'end_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

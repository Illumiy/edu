<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\LectureSerach */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Lectures');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lecture-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Lecture'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          //  'id',
            'title:ntext',
         //   'body:ntext',
          //  'meta_keyword',
       //     'meta_description',
             'created_at:datetime',
            //'updated_at',
             //'created_by',

            [
                    'class' => 'yii\grid\ActionColumn',
                    'buttons'=>[
	                    'create_test'=>function ($url, $model) {
		                    $url= Url::to(['/teacher/test/create','lecture_id'=>$model->id]);
		                    return Html::a('<span class="glyphicon glyphicon-plus"></span>', $url);
	                    },

                    ],
                    'template' => '{update}{view}{delete}{create_test}',
            ],
        ],
    ]); ?>


</div>

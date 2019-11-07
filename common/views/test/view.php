<?php

use kartik\markdown\Markdown;
use yii\helpers\Html;
use yii\helpers\VarDumper;
use yii\widgets\DetailView;
use app\test_system\models\test\Test;

/* @var $this yii\web\View */
/* @var $model app\test_system\models\test\Test */

$this->title                   = $model->title;
$this->params['breadcrumbs'][] = [ 'label' => Yii::t( 'test_system', 'Tests' ), 'url' => [ 'index' ] ];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register( $this );

$iconTest = Test::iconType($model->type);
?>
<div class="test-view">
    <div class="x_panel">
        <div class="x_title">
            <h1><?= Html::encode( $this->title ).' '.$iconTest?></h1>

            <div class="clearfix"></div>
        </div>

        <p>
			<?= Html::a( Yii::t( 'test_system', 'Update' ), [
				'update',
				'id' => $model->id
			], [ 'class' => 'btn btn-primary' ] ) ?>
			<?= Html::a( Yii::t( 'test_system', 'Delete' ), [ 'delete', 'id' => $model->id ], [
				'class' => 'btn btn-danger',
				'data'  => [
					'confirm' => Yii::t( 'test_system', 'Are you sure you want to delete this item?' ),
					'method'  => 'post',
				],
			] ) ?>
        </p>
        <?= Markdown::convert( $model->description ) ?>
               <?= DetailView::widget( [
			'model'      => $model,
			'attributes' => [
				//'id',
			//	'title',
				'description:ntext',
				'type',
				'begin_at:datetime',
				'end_at:datetime',
				'deadline_at',
				'count_attempt',
				'is_exam',
				'is_draft',
				'time_limit',
				'created_at',
//				'updated_at',
//				'created_by',
//				'updated_by',
			],
		] ) ?>

    </div>

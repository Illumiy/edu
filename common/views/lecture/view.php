<?php

use http\Url;
use kartik\markdown\Markdown;
use yii\helpers\Html;
use yii\helpers\VarDumper;

/* @var $this yii\web\View */
/* @var $model app\models\Lecture */

$this->title                   = $model->title;
$this->params['breadcrumbs'][] = [ 'label' => Yii::t( 'app', 'Lectures' ), 'url' => [ 'index' ] ];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register( $this );
?>
<div class="lecture-view">
    <div class="x_panel">
        <div class="x_title">
            <h1><?= Html::encode( $this->title ) ?></h1>

            <div class="clearfix"></div>
        </div>


        <ul id="w14" class="nav navbar-left panel_toolbox ">
            <li>
				<?= Html::a( '<i
                            class="fa fa-pencil fa-2x green"></i>', [
					'update',
					'id' => $model->id
				] ) ?>

            </li>
            <li>
				<?= Html::a( '<i
                            class="fa fa-plus fa-2x green"></i>', [
					'create'
				] ) ?>

            </li>
            <li>
				<?= Html::a( '<i
                        class="fa fa-trash fa-2x red"></i>', [ 'delete', 'id' => $model->id ], [
					'data' => [
						'confirm' => Yii::t( 'app', 'Are you sure you want to delete this item?' ),
						'method'  => 'post',
					],
				] ) ?>

            </li>

        </ul>

        <div class="x_content">
			<? // \Yii::t( 'app', 'author' ) ?>
			<? // \Yii::$app->user->identity->username ?>
			<?= Markdown::convert( $model->body ) ?>
        </div>
    </div>
    <div class="x_panel">
        <div class="x_title">
            <h2><?= Yii::t( 'app', 'Related tests' ) ?></h2>'

            <div class="clearfix"></div>

        </div>
		<?= Html::a(
			'<i class="fa fa-plus fa-2x green"></i>',
			\yii\helpers\Url::to( [ '/teacher/test/create', 'lecture_id' => $model->id ] ),
                [
                        'target' => '_blank'
                ]
		) ?>
        <div class="x_content">
            <ul class="list-group">
				<?php foreach ( $model->tests as $test ) : ?>

                    <li class="list-group-item">
						<?= Html::a(
							'<i class="fa fa-cloud-upload fa-2x"> '.$test->title.'</i>' ,
                            [ '/teacher/test/view', 'id' => $test->id ],
							[
								'target' => '_blank',
							]
						)
						?>
						<?= Html::a( '<i
                        class="fa fa-trash fa-2x red"></i>', [ '/teacher/test/delete', 'id' => $test->id ], [
							'data' => [
								'confirm' => Yii::t( 'app', 'Are you sure you want to delete this item?' ),
								'method'  => 'post',
							],
                            'class' => 'pull-right'
						] ) ?>
                    </li>
				<?php endforeach; ?>
            </ul>

        </div>
    </div>
</div>

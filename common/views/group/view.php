<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Group */

$this->title                   = $model->title;
$this->params['breadcrumbs'][] = [ 'label' => Yii::t( 'app', 'Groups' ), 'url' => [ 'index' ] ];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register( $this );
?>
<div class="group-view">

    <h1><?= Html::encode( $this->title ) ?></h1>

    <p>
		<?= Html::a( Yii::t( 'app', 'Update' ), [ 'update', 'id' => $model->id ], [ 'class' => 'btn btn-primary' ] ) ?>
		<?= Html::a( Yii::t( 'app', 'Delete' ), [ 'delete', 'id' => $model->id ], [
			'class' => 'btn btn-danger',
			'data'  => [
				'confirm' => Yii::t( 'app', 'Are you sure you want to delete this item?' ),
				'method'  => 'post',
			],
		] ) ?>
    </p>

	<?= DetailView::widget( [
		'model'      => $model,
		'attributes' => [
			'title',
			'year_begin',
			'year_end',
			[
				'attribute' => 'p_id',
				'value'     => $model->groups->title
			],
			[
				'attribute' => 'author_id',
				'value'     => function ( $model ) {
					$name = null;
					$name = $model->authorProfile->name ? $name : $name = $model->author->username;

					return Html::a( $name, [ '/user/profile/show', 'id' => $model->author->id ] );
				},
				'format'    => 'html'
			],
			[
				'attribute' => 'educational_organization_id',
				'value'     => function ( $model ) {
					return $model->educationalOrganization->title;
				},
			],
			[
				'label' => Yii::t( 'app', 'Full name of educational organization' ),
				'value' => function ( $model ) {
					return $model->educationalOrganization->full_name;
				},
			],
		],
	] ) ?>

</div>

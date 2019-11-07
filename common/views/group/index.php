<?php

use app\models\EducationalOrganization;
use app\models\Group;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\GroupSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $educationalOrganizationList EducationalOrganization::selectList() */

$this->title                   = Yii::t( 'app', 'Groups' );
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="group-index">

    <h1><?= Html::encode( $this->title ) ?></h1>

    <p>
		<?= Html::a( Yii::t( 'app', 'Create Group' ), [ 'create' ], [ 'class' => 'btn btn-success' ] ) ?>
    </p>

	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<?= GridView::widget( [
		'dataProvider' => $dataProvider,
		'filterModel'  => $searchModel,
		'columns'      => [
			[ 'class' => 'yii\grid\SerialColumn' ],

			//'id',
			'title',
			'year_begin',
			'year_end',
			[
				'attribute' => 'p_id',
				'value'     => function ( $model ) {
					return $model->groups->name;
				},
				'filter'    => ArrayHelper::map( Group::find()->all(), 'id', 'title' )
			],
			[
				'attribute' => 'educational_organization_id',
				'value'     => function ( $model ) {
					return $model->educationalOrganization->title;
				},
				'filter'    => Select2::widget( [
					'model' => $searchModel,
					'attribute' => 'educational_organization_id',
					'data' => $educationalOrganizationList,
					'theme' => Select2::THEME_BOOTSTRAP,
					'hideSearch' => true,
					'options' => [
						'placeholder' => Yii::t( 'app', 'Select a educational organization ...'),
					]

				] ),

			],
			//'author_id',

			[ 'class' => 'yii\grid\ActionColumn' ],
		],
	] ); ?>


</div>

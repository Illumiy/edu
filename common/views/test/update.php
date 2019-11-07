<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\test_system\models\test\Test */

$this->title = Yii::t('test_system', 'Update Test: {name}', [
    'name' => $model->title,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('test_system', 'Tests'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('test_system', 'Update');
?>
<div class="test-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

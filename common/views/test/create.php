<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\test_system\models\test\Test */

$this->title = Yii::t('test_system', 'Create Test');
$this->params['breadcrumbs'][] = ['label' => Yii::t('test_system', 'Tests'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="test-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

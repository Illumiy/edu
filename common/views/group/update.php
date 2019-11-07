<?php

use app\models\EducationalOrganization;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Group */
/* @var $educationalOrganizationList EducationalOrganization::selectList() */

$this->title = Yii::t('app', 'Update Group: {name}', [
    'name' => $model->title,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="group-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'educationalOrganizationList' => $educationalOrganizationList
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ReestrOperation */

$this->title = 'Update Reestr Operation: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Reestr Operations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="reestr-operation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

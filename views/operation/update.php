<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Operation */

$this->title = 'Редактирование Операции: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Реестр операций', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="operation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form-upd', [
        'model' => $model,
    ]) ?>

</div>

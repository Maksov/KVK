<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Operation */

$this->title = 'Создать Операцию';
$this->params['breadcrumbs'][] = ['label' => 'Реестр операций', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="operation-create">

    <h1><?= Html::encode($this->title) ?></h1>

     <?= $this->render('_form', [
        'operation' => $operation,
        'risk' =>$risk,
    ]) ?>

</div>

<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ReestrOperation */

$this->title = 'Добавление риска к операции';
$this->params['breadcrumbs'][] = ['label' => 'Операции-Риски', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reestr-operation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

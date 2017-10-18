<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Reestr */

$this->title = 'Редактирование классификатора нарушений: ' . $model->name_v;
$this->params['breadcrumbs'][] = ['label' => 'Классификатор нарушений', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->code_v, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="reestr-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

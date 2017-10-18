<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Karta */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Kartas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="karta-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'operation.name',
            'person',
            'organization.name',
            'period_operation',
            'person_control',
            'name_procedure',
            'event',
            'method',
            'kind',
            'period_control',
        ],
    ]) ?>

</div>

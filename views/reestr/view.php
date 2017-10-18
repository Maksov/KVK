<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Reestr */

$this->title = $model->name_v;
$this->params['breadcrumbs'][] = ['label' => 'Классификатор нарушений', 'url' => ['index']];
?>
<div class="reestr-view">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
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
            'code_v',
            'point_v',
            'name_v',
            'risk1',
            'risk2',
            'risk3',
            'risk4',
            'risk5',
             ],
    ]) ?>

</div>

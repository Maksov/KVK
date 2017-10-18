<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Karta */

$this->title = 'Создание объекта контроля';
$this->params['breadcrumbs'][] = ['label' => 'Объекты контроля', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="karta-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ReestrSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reestr-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'code_v') ?>

    <?= $form->field($model, 'point_v') ?>

    <?= $form->field($model, 'name_v') ?>

    <?= $form->field($model, 'risk1') ?>

    <?php // echo $form->field($model, 'risk2') ?>

    <?php // echo $form->field($model, 'risk3') ?>

    <?php // echo $form->field($model, 'risk4') ?>

    <?php // echo $form->field($model, 'risk5') ?>



    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Сбросить фильтр', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

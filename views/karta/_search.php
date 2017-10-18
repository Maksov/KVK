<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KartaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="karta-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_operation') ?>

    <?= $form->field($model, 'person') ?>

    <?= $form->field($model, 'id_organization') ?>

    <?= $form->field($model, 'period_operation') ?>

    <?php // echo $form->field($model, 'person_control') ?>

    <?php // echo $form->field($model, 'name_procedure') ?>

    <?php // echo $form->field($model, 'event') ?>

    <?php // echo $form->field($model, 'method') ?>

    <?php // echo $form->field($model, 'kind') ?>

    <?php // echo $form->field($model, 'period_control') ?>

    <?php // echo $form->field($model, 'date_create') ?>

    <?php // echo $form->field($model, 'date_edit') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

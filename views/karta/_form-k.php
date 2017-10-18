<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Karta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="karta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_operation')->textInput() ?>

    <?= $form->field($model, 'person')->textInput() ?>

    <?= $form->field($model, 'id_organization')->textInput() ?>

    <?= $form->field($model, 'period_operation')->textInput() ?>

    <?= $form->field($model, 'person_control')->textInput() ?>

    <?= $form->field($model, 'name_procedure')->textInput() ?>

    <?= $form->field($model, 'event')->textInput() ?>

    <?= $form->field($model, 'method')->textInput() ?>

    <?= $form->field($model, 'kind')->textInput() ?>

    <?= $form->field($model, 'period_control')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

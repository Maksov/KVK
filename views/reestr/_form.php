<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Reestr */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reestr-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'code_v')->textInput() ?>

    <?= $form->field($model, 'point_v')->textInput() ?>

    <?= $form->field($model, 'name_v')->textInput() ?>

    <?= $form->field($model, 'risk1')->textInput() ?>

    <?= $form->field($model, 'risk2')->textInput() ?>

    <?= $form->field($model, 'risk3')->textInput() ?>

    <?= $form->field($model, 'risk4')->textInput() ?>

    <?= $form->field($model, 'risk5')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\AutoComplete;
use unclead\multipleinput\TabularInput;

/* @var $this yii\web\View */
/* @var $model app\models\Operation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="operation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($modelOperation, 'name')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($modelOperation->isNewRecord ? 'Создать' : 'Сохранить', ['class' => $modelOperation->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

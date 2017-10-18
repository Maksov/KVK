<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Violation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="violation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_or')->textInput() ?>

    <?= $form->field($model, 'id_organization')->widget(Select2::className(), [
        'data' => ArrayHelper::map(\app\models\Organization::find()->all(),'id','sono'),
        'options' => ['placeholder' => 'Filter as you type ...'],
    ]) ?>


    <?= $form->field($model, 'weight')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

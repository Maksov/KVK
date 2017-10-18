<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\AutoComplete;
use unclead\multipleinput\TabularInput;


/* @var $this yii\web\View */
/* @var $model app\models\Operation */
/* @var $form yii\widgets\ActiveForm */
$dr = [
    'Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California', 'Colorado',
    'Connecticut', 'Delaware', 'Florida', 'Georgia', 'Hawaii',
    'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana',
    'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota',
    'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire',
    'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota',
    'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island',
    'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont',
    'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming'
];
?>

<div class="operation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($operation, 'name')->textInput() ?>

<?php
print_r($risk);
?>

    <?= TabularInput::widget([
        'models' => $risk,
        'form' => $form,
        'columns' => [
                [
                        'name'=>'id_reestr',
                ]
                ],])
    ?>

    <div class="form-group">
        <?= Html::submitButton($operation->isNewRecord ? 'Создать' : 'Сохранить', ['class' => $operation->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

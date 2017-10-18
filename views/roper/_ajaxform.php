<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\typeahead\Typeahead;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
$this->title = 'Добавление риска к операции';
$this->params['breadcrumbs'][] = ['label' => 'Операции-Риски', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;


/* @var $this yii\web\View */
/* @var $model app\models\ReestrOperation */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="reestr-operation-create">

    <h3><?= Html::encode($this->title) ?></h3>
    <div class="reestr-operation-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'id_reestr')->widget(Select2::className(), [
            'data' => ArrayHelper::map(\app\models\Reestr::find()->all(),'id','name_v'),
            'options' => ['placeholder' => 'Начните ввод для поиска ...'],
        ])->label('Возможный риск')?>

        <div class="form-group">
            <?= Html::submitButton('Добавить риск' , ['class' => 'btn btn-success']) ?>

        </div>
        <?php ActiveForm::end(); ?>

    </div>
</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\typeahead\Typeahead;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
$data = [
    ['id' => '123', 'name' => 'aaa'],
    ['id' => '124', 'name' => 'bbb'],
    ['id' => '345', 'name' => 'ccc'],
];


/* @var $this yii\web\View */
/* @var $model app\models\ReestrOperation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reestr-operation-form">

    <?php $form = ActiveForm::begin([
        'id'=>$model->formName(),
        'enableClientValidation'=>false,
        'enableAjaxValidation'=>true,
        'validationUrl'=>Url::toRoute('roper/validation'),
    ]); ?>

    <?= $form->field($model, 'id_operation')->widget(Select2::className(), [
        'data' => ArrayHelper::map(\app\models\Operation::find()->all(),'id','name'),
        'options' => ['placeholder' => 'Начните ввод для поиска...'],


    ]) ?>

    <?= $form->field($model, 'id_reestr')->widget(Select2::className(), [
        'data' => ArrayHelper::map(\app\models\Reestr::find()->all(),'id','name_v'),
        'options' => ['placeholder' => 'Начните ввод для поиска...'],
    ])?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

<?php $this->registerJs("
        $('form#{$model->formName()}').on('beforeSubmit',function(e)
         {
             var \$form = $(this);
             $.post(
             \$form.attr('action'),
             \$form.serialize()
             )
             .done(function(result){
             console.log(result);
             if(result == 1) {
             $(document).find('#risk-create').modal('hide');
             $.pjax.reload({container: '#risk-gridview'});
              }
             })
             return false;
         });
");
?>
</div>

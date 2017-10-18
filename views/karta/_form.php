<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Karta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="karta-form">

    <?php $form = ActiveForm::begin([
            'id'=>$model->formName(),
            'enableClientValidation'=>false,
            'enableAjaxValidation'=>true,
            'validationUrl'=>Url::toRoute('karta/validation'),

    ]); ?>

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
             $(document).find('#karta-create').modal('hide');
             $.pjax.reload({container: '#karta-gridview'});
              }
             })
             return false;
         });
");


    ?>

</div>

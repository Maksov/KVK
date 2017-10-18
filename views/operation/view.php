<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use kartik\form\ActiveForm;
use kartik\builder\Form;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Operation */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Реестр операций', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="operation-view">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a('Редактировать операцию', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить операцию', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить запись?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

     <?=   DetailView::widget([
        'model' => $model,
         'hAlign'=>'left',
        'attributes' => [
            [
                'group'=>true,
                'label'=>'Описание операции',
                'rowOptions'=>['class'=>'info']
            ],
            'name',
        ],
    ]) ?>
    <h3><?= Html::encode('Возможные риски') ?></h3>

    <p>
        <?php
        $this->registerJs("
    $('#btnRiskCreate').on('click',function() {
    $('#risk-create').find('.modal-body').load('/roper/create', {idoper: {$model->id}});
    })
    $('#btnRiskCreateAjax').on('click', )
    ");
        Modal::begin([
            'id' => 'risk-create',
            'header' => '<h4>'.$this->title .'</h4>',
            'bodyOptions'=> [
                'class' => 'modal-body',
                'padding'=>'5px',
                    ],
            'options'=>[
                    'tabindex' => false,
                    ],

            'toggleButton' => [
                'label' => 'Добавить риск',
                'id'=>'btnRiskCreate',
                'tag'=>'button',
                'class' => 'btn btn-success',
            ],
           // 'footer'=> '
           // <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
           // <button id="btnRiskCreateAjax" type="button" class="btn btn-primary">Добавить риск</button>
           // ',


        ]);

        Modal::end();?>

    </p>

    <?php
 //  print_r($dataProvider);

    Pjax::begin(['id'=>'risk-gridview']); ?>    <?= GridView::widget([
        'dataProvider' => $riskProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'code_v',
            'name_v',
        ],
    ]); ?>
    <?php Pjax::end(); ?></div>
<?php ?>

<h3><?= Html::encode('Карта операции') ?></h3>

<p>
    <?php $url=Url::to(['karta/create']);?>
   <?php
    $this->registerJs("
    $('#btnKartaCreate').on('click',function() {
    $('#karta-create').find('.modal-body').load('/karta/create', {idoper: {$model->id}});
    })
    ");
    Modal::begin([
        'id' => 'karta-create',
        'header' => '<h4>'.$this->title .'</h4>',
        'toggleButton' => [
            'label' => 'Создать объект контроля',
            'id'=>'btnKartaCreate',
            'tag'=>'button',
            'class' => 'btn btn-success',
        ],

    ]);

    ?>

    <?php Modal::end();?>

</p>
<?php Pjax::begin(['id'=>'karta-gridview']); ?>
<?= GridView::widget([
    'dataProvider' => $kartaProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'person',
        'period_operation',
        'name_procedure',
        [
                'class' => 'yii\grid\ActionColumn',
                'urlCreator' => function ($action, $model, $key, $index) {
                if ($action === 'view') {
                    $url = Url::to(['karta/view', 'id' => $model->id]);
                    return $url;
                }

                if ($action === 'update') {
                    $url =Url::to(['karta/update', 'id' => $model->id]);
                    return $url;
                }
                if ($action === 'delete') {
                    $url = Url::to(['karta/delete', 'id' => $model->id]);
                    return $url;
                }

            }

        ],
    ],
]); ?>
<?php Pjax::end(); ?></div>

</div>

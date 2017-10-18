<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\KartaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
use kartik\export\ExportMenu;
use kartik\grid\GridView;
use kartik\select2\Select2;
use yii\helpers\VarDumper;
use yii\bootstrap\Modal;

$this->title = 'Карта внутреннего контроля';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="karta-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php// Html::a('Построить карту внутреннего контроля', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<p>
    <?php
    $this->registerJs("
    $('#btnKartaCreate').on('click',function() {
    $('#karta-create').find('.modal-body').load('/karta/create');
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
    <?php
    $gridColumns = [
        [
            'label'=>'Наименование операции',
            'attribute'=>'id_operation',

            'group'=>true,  // enable grouping
            //'format'=>'raw',  // enable grouping

        ],
        'person',
        'period_operation',
        'person_control',
        'name_procedure',
        'event',
        'method',
        'kind',
        'period_control',

    ];

    $gridVision= [
        ['class' => '\kartik\grid\SerialColumn'],
        [
            'label'=>'Наименование операции',
            'attribute'=>'operation_id',
            'value'=>function ($model, $key, $index, $widget) {
                return $model->operation->name;
            },
            'group'=>true,  // enable grouping
            //'format'=>'raw',  // enable grouping
            'contentOptions' =>['style' => 'width:auto'],

        ],
        [
            'attribute'=>'person',
        ],
        'period_operation',
        'person_control',
        'name_procedure',
        ['class' => 'yii\grid\ActionColumn',
        'buttons'=> [
            'view'=> function($url) {
                return Html::a('<span class="glyphicon glyphicon-eye-open"></span>',$url, [
                    'id'=>'viewRow',
                    'title' => Yii::t('yii', 'View'),
                    'data-method' => 'post',
                    'data-pjax' => '0',

                ]);

            },
            'delete' => function ($url, $model, $key) {
                return Html::a('<span class="glyphicon glyphicon-trash"></span>', '#delete', [
                    'id'=>'deleteRow',
                    'title' => Yii::t('yii', 'Delete'),
                    'data-method' => 'post',
                    'data-pjax' => '0',

                ]);
            }
        ]


        ]
    ];

    $this->registerJs("
    $('#viewRow').click(function(){
    var data=$('#viewRow').attr('href');
    $(document).find('#karta-create').modal('show');
    $('#karta-create').find('.modal-body').load('/karta/view?id=9');
    return false;
    }
    );
    ");

    ?>
    <?php $grid = ExportMenu::widget([
    'dataProvider' => $dataProvider,
    'columns' => $gridColumns,
    'fontAwesome' => true,
    'enableFormatter'=>false,
    'target' => '_blank',
            'exportConfig' => [
                ExportMenu::FORMAT_TEXT => false,
                ExportMenu::FORMAT_PDF => false
            ]
    //'folder' => '@webroot/tmp', // this is default save folder on server
    ]);
echo $grid;
 ?>

<?php Pjax::begin(['id'=>'karta-gridview']); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
        'export'=>false,
        'columns' =>   $gridVision,
    ]); ?>
<?php Pjax::end(); ?></div>

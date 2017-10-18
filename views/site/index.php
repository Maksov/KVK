<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
$this->title = 'Классификатор нарушений';
?>

<div class="site-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary'=>'Показано {begin} - {end} из {totalCount} записей',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'sono',
            'violations.weight',
            //'name_v',
            //'risk1',
            // 'risk2',
            // 'risk3',
            // 'risk4',
            // 'risk5',
            // 'id_fk_operation',
        ],
    ]); ?>
    <?php Pjax::end(); ?></div>

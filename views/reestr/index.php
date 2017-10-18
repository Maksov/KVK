<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ReestrSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Классификатор нарушений';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reestr-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить запись', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'code_v',
            'point_v',
            'name_v',
            //'risk1',
            // 'risk2',
            // 'risk3',
            // 'risk4',
            // 'risk5',
            // 'id_fk_operation',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>

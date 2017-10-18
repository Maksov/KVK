<?php


use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\Reestr */

?>
<div class="site-view">

    <?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'sono',
            'name',
            [
             'label'=>'Удельный вес',
             'value'=>   function($model){
                 return $model->getViolations()->andFilterWhere(['id_reestr'=>1])->one()->weight;
             },
            ],
              ],
    ]); ?>
    <?php Pjax::end(); ?></div>

</div>

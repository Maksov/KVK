<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Violation */

$this->title = 'Create Violation';
$this->params['breadcrumbs'][] = ['label' => 'Violations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="violation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

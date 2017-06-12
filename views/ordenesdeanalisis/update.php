<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ordenesdeanalisis */

$this->title = 'Update Ordenesdeanalisis: ' . $model->idord;
$this->params['breadcrumbs'][] = ['label' => 'Ordenesdeanalises', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idord, 'url' => ['view', 'id' => $model->idord]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ordenesdeanalisis-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

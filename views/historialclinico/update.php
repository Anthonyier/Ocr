<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Historialclinico */

$this->title = 'Update Historialclinico: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Historialclinicos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="historialclinico-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

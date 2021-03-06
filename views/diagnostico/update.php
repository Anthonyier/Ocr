<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Diagnostico */

$this->title = 'Update Diagnostico: ' . $model->iddiag;
$this->params['breadcrumbs'][] = ['label' => 'Diagnosticos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->iddiag, 'url' => ['view', 'id' => $model->iddiag]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="diagnostico-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

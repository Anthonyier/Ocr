<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Informe */

$this->title = 'Update Informe: ' . $model->idinf;
$this->params['breadcrumbs'][] = ['label' => 'Informes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idinf, 'url' => ['view', 'id' => $model->idinf]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="informe-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

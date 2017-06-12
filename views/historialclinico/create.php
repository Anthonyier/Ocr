<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Historialclinico */

$this->title = 'Create Historialclinico';
$this->params['breadcrumbs'][] = ['label' => 'Historialclinicos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="historialclinico-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

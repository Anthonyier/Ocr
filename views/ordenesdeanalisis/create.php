<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Ordenesdeanalisis */

$this->title = 'Create Ordenesdeanalisis';
$this->params['breadcrumbs'][] = ['label' => 'Ordenesdeanalises', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ordenesdeanalisis-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

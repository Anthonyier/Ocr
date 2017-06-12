<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrdenesdeanalisisSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ordenesdeanalises';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ordenesdeanalisis-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ordenesdeanalisis', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Buscar Ordenesdeanalisis', ['buscar'], ['class' => 'btn btn-primary']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idord',
            'imagen',
            'idhist',
            'nombre',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

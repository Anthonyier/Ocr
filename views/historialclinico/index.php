<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HistorialclinicoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Historialclinicos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="historialclinico-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Historialclinico', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Buscar Historialclinico', ['buscar'], ['class' => 'btn btn-primary']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'imagen',
            'idcliente',
            'iddoctor',
            'nombre',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

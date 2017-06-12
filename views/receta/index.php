<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RecetaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Recetas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="receta-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Receta', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Buscar Receta', ['buscar'], ['class' => 'btn btn-primary']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idrec',
            'imagen',
            'idhist',
            'nombre',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

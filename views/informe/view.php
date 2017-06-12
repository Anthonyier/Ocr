<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Informe */

$this->title = $model->idinf;
$this->params['breadcrumbs'][] = ['label' => 'Informes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="informe-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idinf], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idinf], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idinf',
            'imagen',
            'idhist',
            'nombre',
        ],
    ]) ?>


    <?php
    use Google\Cloud\Vision\VisionClient;
    $diag=$model->imagen;
    $projectId ='gothic-well-169615';
    $path ='../web/'.$diag;
    // $path = 'C:\Users\anthony\Downloads\imprenta.jpg';
    $vision = new VisionClient([
        'projectId' => $projectId,
    ]);
    $image = $vision->image(file_get_contents($path), ['TEXT_DETECTION']);
    $result = $vision->annotate($image);
    print("Texts:\n");
    foreach ((array) $result->text() as $text) {
        print($text->description() . PHP_EOL);
    }
    ?>
</div>

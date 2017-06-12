<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Historialclinico */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="historialclinico-buscar">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' =>  'btn btn-primary']) ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>


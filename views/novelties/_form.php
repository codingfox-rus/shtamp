<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Novelties */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="novelties-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
        if ( !$model->isNewRecord && !empty($model->image) ) {
    ?>
            <div class="form-group">
                <?= Html::img($model->image, ['style' => 'width: 30%']) ?>
            </div>
    <?php
        }
    ?>

    <?= $form->field($model, 'file')->fileInput() ?>

    <?= $form->field($model, 'desc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'published')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

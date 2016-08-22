<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Files */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="files-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
        if ( !$model->isNewRecord && !empty($model->path) ) {
    ?>
            <div class="form-group">
                <?= Html::a(Yii::getAlias('@web') . $model->path, 'Скачать') ?>
            </div>
    <?php
        }
    ?>

    <?= $form->field($model, 'file')->fileInput() ?>

    <?= $form->field($model, 'desc')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

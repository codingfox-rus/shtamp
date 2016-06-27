<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Catalog */

$this->title = 'Обновить изображение в каталоге: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Изображение каталога', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="catalog-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

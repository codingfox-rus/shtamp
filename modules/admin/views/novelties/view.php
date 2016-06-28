<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Novelties */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Новинки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="novelties-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'image',
                'format' => 'raw',
                'value' => Html::img($model->image, ['style' => 'width: 50%'])
            ],
            'desc',
            [
                'attribute' => 'published',
                'format' => 'raw',
                'value' => $model->published == 1 ? 'Да' : 'Нет'
            ],
        ],
    ]) ?>

</div>

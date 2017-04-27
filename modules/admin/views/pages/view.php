<?php

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pages */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Страницы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pages-view">

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
                'attribute' => 'url',
                'format' => 'raw',
                'value' => Html::a(Yii::$app->request->hostInfo.'/'.$model->url, Yii::$app->request->hostInfo.'/'.$model->url, [
                    'target' => '_blank'
                ])
            ],
            'title',
            'keywords',
            'description:ntext',
            [
                'attribute' => 'content',
                'format' => 'raw',
                'value' => HtmlPurifier::process($model->content)
            ],
            [
                'attribute' => 'tags_',
                'value' => $model->viewTags()
            ]
        ],
    ]) ?>

</div>

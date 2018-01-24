<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Страницы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pages-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать страницу', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'url',
                'format' => 'raw',
                'value' => function($model){
                    $url = Yii::$app->request->hostInfo . "/" . $model->url;
                    return Html::a($url, $url);
                }
            ],
            'title',
            'description:ntext',
            [
                'attribute' => 'tags_',
                'value' => function($model){
                    return $model->viewTags();
                }
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
                'buttons' => [
                    'update' => function($url, $model, $key){
                        return '<p>'. Html::a('Редактировать', $url, [
                            'class' => 'btn btn-primary btn-xs'
                        ]);
                    },
                    'delete' => function($url, $model, $key){
                        return '<p>'. Html::a('Удалить', $url, [
                            'class' => 'btn btn-primary btn-xs',
                            'data' => [
                                'confirm' => 'Вы уверены?',
                                'method' => 'post'
                            ]
                        ]);
                    }
                ]
            ],
        ],
    ]); ?>

    <?php Pjax::end() ?>
</div>

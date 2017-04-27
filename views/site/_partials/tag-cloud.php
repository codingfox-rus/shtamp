<?php
/* @var $tags mixed */
use yii\helpers\Html;
?>

<?php
    foreach ($tags as $tag) {
?>
        <li>
            <?= Html::a($tag->name, ['search-by-tag', 'id' => $tag->id]) ?>
        </li>
<?php
    }
?>

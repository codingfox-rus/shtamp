<?php
/* @var $tag app\models\Tag */
/* @var $pages mixed */

use yii\helpers\Html;
$this->title = 'Результаты поиска по тэгу "' . $tag->name . '"';
?>

<h3><?= $this->title ?></h3>
<hr>

<?php
    if (isset($pages)) {
        foreach ($pages as $url => $title) {
            echo '<p>' . Html::a($title, '/' . $url) . '</p>';
        }
    } else {
        echo '<p>Ничего не найдено :(</p>';
    }
?>

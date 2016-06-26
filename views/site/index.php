<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

$this->title = Html::encode($page->title);
?>

<?= HtmlPurifier::process($page->content) ?>
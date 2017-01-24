<?php
/* @var $page mixed */
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use app\components\widgets\Spoiler;

$this->title = Html::encode($page->title);
?>

<?= HtmlPurifier::process($page->content, [
	'HTML.SafeIframe' => true,
	'URI.SafeIframeRegexp' => '%^(https?:)?//(www\.youtube(?:-nocookie)?\.com/embed/|player\.vimeo\.com/video/)%'
]) ?>

<?= Spoiler::widget([
	'title' => 'Изготовление ювелирного замка "Карабин"',
	'videoId' => 'UjzXn3wXSPQ',
	'hidden' => false
]) ?>

<?= Spoiler::widget([
	'title' => 'Изготовление ювелирной цепочки',
	'videoId' => 'n3kgoewN7HQ',
	'hidden' => true
]) ?>

<?= Spoiler::widget([
	'title' => 'Технология сборки ювелирной цепи',
	'videoId' => 'Aa6XSkvazSU',
	'hidden' => true
]) ?>

<?= Spoiler::widget([
	'title' => 'Изготовление ювелирного изделия "Браслет"',
	'videoId' => 'BFVCc3tHCZs',
	'hidden' => true
]) ?>

<?= Spoiler::widget([
	'title' => 'Комплект ювелирный штампов "Английский замок"',
	'videoId' => 'wcYX-YabPX8',
	'hidden' => true
]) ?>

<?= Spoiler::widget([
	'title' => 'Ювелирный штамп совмещенного действия "Иконка"',
	'videoId' => 'zetq3-EGlp4',
	'hidden' => true
]) ?>

<?= Spoiler::widget([
	'title' => 'Штамп ювелирный "Концевики для цепочек"',
	'videoId' => 'LdnXqnO41yI',
	'hidden' => true
]) ?>

<?= Spoiler::widget([
	'title' => 'Штамп - иконка',
	'videoId' => 'Q66fYtD4oD0',
	'hidden' => true
]) ?>

<?= Spoiler::widget([
	'title' => 'Изготовление ювелирного изделия "Элемент распятие"',
	'videoId' => 'wXcWczBgbcU',
	'hidden' => true
]) ?>

<?= Spoiler::widget([
	'title' => 'Пневматический пресс',
	'videoId' => '9e3G8b0RyhE',
	'hidden' => true
]) ?>

<?= Spoiler::widget([
	'title' => 'Гидравлический пресс',
	'videoId' => 'SqtrJpYbzZo',
	'hidden' => true
]) ?>

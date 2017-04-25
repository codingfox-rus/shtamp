<?php
/* @var $page mixed */

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

$this->title = Html::encode($page->title);
?>

<?= HtmlPurifier::process($page->content, [
    'HTML.SafeIframe' => true,
    'URI.SafeIframeRegexp' => '%^(https?:)?//(www\.youtube(?:-nocookie)?\.com/embed/|player\.vimeo\.com/video/)%'
]) ?>




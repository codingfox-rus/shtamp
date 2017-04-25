<?php
/* @var $page mixed */

use yii\helpers\HtmlPurifier;

$this->title = $page->title;
?>

<?php
    echo $page->content;
    /*HtmlPurifier::process($page->content, [
        'HTML.SafeIframe' => true,
        'URI.SafeIframeRegexp' => '%^(https?:)?//(www\.youtube(?:-nocookie)?\.com/embed/|player\.vimeo\.com/video/)%'
    ]);*/
?>




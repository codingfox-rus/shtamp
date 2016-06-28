<?php
use yii\helpers\Html;
$pageTitle = Html::encode($page->title);
$this->title = $pageTitle;
?>

<div class="gallery-img-wrapper clearfix">
    <ul>
    <?php
        if ( !empty($images) ) {
            foreach ($images as $img) {
                $imgPath = Html::encode($img->image);
    ?>
                <li>
                    <a href="<?= $imgPath ?>">
                        <img src="<?= $imgPath ?>" alt="<?= $img->desc ?>">
                    </a>
                </li>
    <?php
            }
        }
    ?>
    </ul>
</div>

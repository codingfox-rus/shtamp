<?php
use yii\helpers\Html;
$pageTitle = Html::encode($page->title);
$this->title = $pageTitle;
?>

<div class="gallery-img-wrapper clearfix">

    <ul class="all-chains">
    <?php
        if ( !empty($images) ) {
            foreach ($images as $img) {
                $imgIndex = 1;
                $imgPath = Html::encode($img->image);
    ?>
                <li>
                    <a href="<?= $imgPath ?>" data-lightbox="Image-<?= $imgIndex ?>">
                        <img src="<?= $imgPath ?>" alt="<?= $img->desc ?>">
                    </a>
                </li>
    <?php
                $imgIndex += 1;
            }
        }
    ?>
    </ul>
</div>

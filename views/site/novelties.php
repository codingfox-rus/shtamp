<?php
use yii\helpers\Html;
$pageTitle = Html::encode($page->title);
$this->title = $pageTitle;
?>

<?php
if ( !Yii::$app->user->isGuest ) {
    echo Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form']);
    echo Html::submitButton(
        'Выйти (' . Yii::$app->user->identity->username . ')',
        ['class' => 'btn btn-link']
    );
    echo Html::endForm();
}
?>
<div class="gallery-img-wrapper clearfix">
    <ul>
    <?php
        if (!empty($images)) {
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
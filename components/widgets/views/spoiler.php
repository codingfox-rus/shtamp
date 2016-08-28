<?php
use yii\helpers\Html;
?>

<div class="wspoiler">
    <div class="header">
        <i class="fa fa-plus <?= $hidden ? false : 'hidden' ?>" aria-hidden="true"></i>
        <i class="fa fa-minus <?= $hidden ? 'hidden' : false ?>" aria-hidden="true"></i>

        <a href="#" class="wsp-title"><?= Html::encode($title) ?></a>
    </div>
    <div class="wsp-content <?= $hidden ? 'hidden' : false ?>">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/<?= Html::encode($videoId) ?>" frameborder="0" allowfullscreen></iframe>
    </div>
</div>

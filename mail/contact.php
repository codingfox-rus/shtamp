<?php
/* @var $message array */
use yii\helpers\Html;
?>

<div>
    <p><strong>Имя</strong>: <?= $message['name'] ?></p>
    <p><strong>Email для связи</strong>: <?= $message['email'] ?></p>
    <p><strong>Сообщение</strong>: </p>
    <p><?= $message['message'] ?></p>
</div>


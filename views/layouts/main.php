<?php
use yii\helpers\Html;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="logo">
                    <a href="/"><i class="fa fa-cogs fa-3x"></i></a><br>
                    <span>СпецТехОснастка</span>
                    <p>Ювелирные штампы и инструменты</p>
                </div>
            </div>
            <div class="col-md-8">
                <div class="header-content clearfix">
                    <div class="top-menu-wrapper clearfix">
                        <ul class="top-menu">
                            <li><a href="">Главная</a></li>
                            <li><a href="">Каталог</a></li>
                            <li><a href="">Технологии</a></li>
                            <li><a href="">Оплата и доставка</a></li>
                            <li><a href="">Контакты</a></li>
                            <li><a href="">Новинки</a></li>
                        </ul>
                    </div>
                    <a href="http://www.youtube.com/channel/UCXCXObdaAxDywwo1GNGw9qA" class="go-to-youtube-channel" target="_blank">
                        <img src="/img/YouTube-logo.png" alt="Канал YouTube">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="sidebar">
                <ul class="left-menu">
                    <li><a href="">Изготовление ювелирных цепочек</a></li>
                    <li><a href="">Основные преимущества листовой штамповки</a></li>
                    <li><a href="">Штампы</a>
                        <ul>
                            <li><a href="">Штамп ручной шаговый "Звено цепи"</a></li>
                            <li><a href="">Комплект штампов ювелирная швенза</a></li>
                            <li><a href="">Штамп концевик для ювелирной цепи</a></li>
                            <li><a href="">Штамп ручной вырубной "пуссета"</a></li>
                            <li><a href="">Штамп совмещенного действия элемент "подвеска"</a></li>
                            <li><a href="">Штамп чеканочный ювелирный "иконка"</a></li>
                            <li><a href="">Штамп ювелирный вырубной "крест"</a></li>
                            <li><a href="">Штамп рельефной формовки "кольцо"</a></li>
                            <li><a href="">Штамп ручной вырубной "полумесяц"</a></li>
                            <li><a href="">Штамп полуавтоматический шаговый "звено цепи"</a></li>
                            <li><a href="">Комплект штампов вырубный ручных "Колодка для медали"</a></li>
                            <li><a href="">Штамп вырубной ручной "бухтированное ювелирное кольцо"</a></li>
                            <li><a href="">Штамп для изготовления замковой части ювелирной булавки</a></li>
                            <li><a href="">Замок ювелирной цепи "Краб"</a></li>
                            <li><a href="">Замок ювелирной цепи "Карабин"</a></li>
                        </ul>
                    </li>
                    <li><a href="">Прессы</a>
                        <ul>
                            <li><a href="">Пресс винтовой ручной</a></li>
                            <li><a href="">Пресс электрогидравлический ПЭгМ-8/40</a></li>
                            <li><a href="">Пресс гидравлический ПГМ (ю) 100-16</a></li>
                            <li><a href="">Пресс пневматический ППЮ-100</a></li>
                            <li><a href="">Пресс эксцентировый ручной</a></li>
                        </ul>
                    </li>
                    <li><a href="">Приспособление для изготовления панцирной ювелирной цепи</a></li>
                    <li><a href="">Опока литейная цельнометаллическая перфорированная</a></li>
                    <li><a href="">Сменный валик к ювелирным вальцам</a></li>
                    <li><a href="">Цанга машиностроительная</a></li>
                    <li><a href="">Прочая продукция</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-8">
            <div class="main-content">
                <?= $content ?>
            </div>
        </div>
    </div>
</div>

<div class="footer">
    <p>&copy; <span>Copyright</span> <?php echo date('Y'); ?> | СпецТехОснастка</p>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
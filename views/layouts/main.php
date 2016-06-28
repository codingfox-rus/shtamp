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
                            <li><a href="/">Главная</a></li>
                            <li><a href="/catalog">Каталог</a></li>
                            <li><a href="/technologies">Технологии</a></li>
                            <li><a href="/payment-and-delivery">Оплата и доставка</a></li>
                            <li><a href="/contact">Контакты</a></li>
                            <li><a href="/novelties">Новинки</a></li>
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
                    <li><a href="/izgotovlenie-yuvelirnyh-tsepochek">Изготовление ювелирных цепочек</a></li>
                    <li><a href="/osnovnye-preimushhestva-listovoj-shtam">Основные преимущества листовой штамповки</a></li>
                    <li><a href="#">Штампы</a>
                        <ul>
                            <li><a href="/shtamp-ruchnoj-shagovyj-zveno-tsepi">Штамп ручной шаговый "Звено цепи"</a></li>
                            <li><a href="/komplekt-shtampov-yuvelirnaya-shvenza">Комплект штампов ювелирная швенза</a></li>
                            <li><a href="/shtamp-kontsevik-dlya-yuvelirnoj-tsepi">Штамп концевик для ювелирной цепи</a></li>
                            <li><a href="/shtamp-ruchnoj-vyrubnoj-pusseta">Штамп ручной вырубной "пуссета"</a></li>
                            <li><a href="/shtamp-sovmeshhennogo-dejstviya-element">Штамп совмещенного действия элемент "подвеска"</a></li>
                            <li><a href="/shtamp-chekanochnyj-yuvelirnyj-ikonka">Штамп чеканочный ювелирный "иконка"</a></li>
                            <li><a href="/shtamp-yuvelirnyj-vyrubnoj-krest">Штамп ювелирный вырубной "крест"</a></li>
                            <li><a href="/shtamp-relefnoj-formovki-koltso">Штамп рельефной формовки "кольцо"</a></li>
                            <li><a href="/shtamp-ruchnoj-vyrubnoj-polumesyats">Штамп ручной вырубной "полумесяц"</a></li>
                            <li><a href="/shtamp-poluavtomaticheskij-shagovyj-zv">Штамп полуавтоматический шаговый "звено цепи"</a></li>
                            <li><a href="/komplekt-shtampov-vyrubnyh-ruchnyh-kol">Комплект штампов вырубный ручных "Колодка для медали"</a></li>
                            <li><a href="/shtamp-vyrubnoj-ruchnoj-buhtirovannoe">Штамп вырубной ручной "бухтированное ювелирное кольцо"</a></li>
                            <li><a href="/shtamp-dlya-izgotovleniya-zamkovoj-chast">Штамп для изготовления замковой части ювелирной булавки</a></li>
                            <li><a href="/zamok-yuvelirnoj-tsepi-krab">Замок ювелирной цепи "Краб"</a></li>
                            <li><a href="/zamok-yuvelirnoj-tsepi-karabin">Замок ювелирной цепи "Карабин"</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Прессы</a>
                        <ul>
                            <li><a href="/press-vintovoj-ruchnoj">Пресс винтовой ручной</a></li>
                            <li><a href="/press-elektrogidravlicheskij-pegm-840">Пресс электрогидравлический ПЭгМ-8/40</a></li>
                            <li><a href="/press-gidravlicheskij-pgm-yu-100-16">Пресс гидравлический ПГМ (ю) 100-16</a></li>
                            <li><a href="/press-pnevmaticheskij-ppyu-100">Пресс пневматический ППЮ-100</a></li>
                            <li><a href="/press-ekstsentrikovyj-ruchnoj">Пресс эксцентировый ручной</a></li>
                        </ul>
                    </li>
                    <li><a href="/prisposoblenie-dlya-izgotovleniya-pan">Приспособление для изготовления панцирной ювелирной цепи</a></li>
                    <li><a href="/opoka-litejnaya-tselnometallicheskaya">Опока литейная цельнометаллическая перфорированная</a></li>
                    <li><a href="/smennyj-valik-k-yuvelirnym-valtsam">Сменный валик к ювелирным вальцам</a></li>
                    <li><a href="/tsanga-mashinostroitelnaya">Цанга машиностроительная</a></li>
                    <li><a href="/prochaya-produktsiya">Прочая продукция</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-8">
            <div class="content">
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
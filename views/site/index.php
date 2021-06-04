<?php

/* @var $this yii\web\View */
use Da\QrCode\QrCode;
$this->title = 'Вкладовка - новый способ владеть вещами';

?>
<div class="sl-wp container">
    <img src="images/logo2.jpg" alt="" class="logo2">
    <h1>Новый способ владеть вещами</h1>
    <div class="arrow bounce">
        <a class="fa fa-arrow-down fa-2x" href="#"></a>
    </div>
    <div class="row m-hide">
        <div class="col-xl-3 col-lg-6">
            <div class="block-in">
                <a href="<?= Yii::$app->urlManager->createUrl('lk/storage') ?>"><img src="images/1.jpg" alt=""></a>
                <h4>
                    <a href="<?= Yii::$app->urlManager->createUrl('lk/storage') ?>">
                        Храните <br>
                        свои вещи
                    </a>
                </h4>
                <p>
                    Мы тщательно упакуем, сфотографируем и сохраним Ваши вещи с осторожностью, чтобы Вы могли жить легче.
                </p>
                <a href="<?= Yii::$app->urlManager->createUrl('lk/storage') ?>">Заказать хранение</a>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="block-in">
                <a href="<?= Yii::$app->urlManager->createUrl('site/as-work') ?>"><img src="images/2.jpg" alt=""></a>
                <h4>
                    <a href="<?= Yii::$app->urlManager->createUrl('lk') ?>">
                        Зарабатывайте <br>
                        на своих вещах
                    </a>
                </h4>
                <p>
                    Сдайте свои вещи в аренду, получайте за это деньги, обналичьте или потратьте на Вкладовка
                </p>
                <a href="<?= Yii::$app->urlManager->createUrl('lk') ?>">Начать получать $</a>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="block-in">
                <a href="<?= Yii::$app->urlManager->createUrl('lk/rent') ?>">
                    <img src="images/3.jpg" alt="">
                </a>
                <h4>
                    <a href="<?= Yii::$app->urlManager->createUrl('lk/rent') ?>">
                        Арендуйте <br>
                        вещи
                    </a>
                </h4>
                <p>
                    Найдите интересующий Вас предмет, арендуйте и наслаждайтесь
                </p>
                <a href="<?= Yii::$app->urlManager->createUrl('lk/rent') ?>">Арендовать вещь</a>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="block-in">
                <a href="<?= Yii::$app->urlManager->createUrl('lk/pickup') ?>"><img src="images/4.jpg" alt=""></a>
                <h4>
                    <a href="<?= Yii::$app->urlManager->createUrl('lk/pickup') ?>">Сопутствующие <br>
                        услуги</a>
                </h4>
                <p>
                    Поможем в грузоперевозках и в упаковывании вещей при ремонте и переезде
                </p>
                <a href="<?= Yii::$app->urlManager->createUrl('lk/pickup') ?>">Заказать услугу</a>
            </div>
        </div>
    </div>
    <div class="owl-carousel owl-theme owl-top m-view">
        <div>
            <a href="<?= Yii::$app->urlManager->createUrl('lk/storage') ?>"><img src="images/1.jpg" alt=""></a>
            <h4>
                <a href="<?= Yii::$app->urlManager->createUrl('lk/storage') ?>">
                    Храните <br>
                    свои вещи
                </a>
            </h4>
            <p>
                Мы тщательно упакуем, сфотографируем и сохраним Ваши вещи с осторожностью, чтобы Вы могли жить легче.
            </p>
            <a href="<?= Yii::$app->urlManager->createUrl('lk/storage') ?>">Заказать хранение</a>
        </div>
        <div>
            <a href="<?= Yii::$app->urlManager->createUrl('lk') ?>"><img src="images/2.jpg" alt=""></a>
            <h4>
                <a href="<?= Yii::$app->urlManager->createUrl('lk') ?>">
                    Зарабатывайте <br>
                    на своих вещах
                </a>
            </h4>
            <p>
                Сдайте свои вещи в аренду, получайте за это деньги, обналичьте или потратьте на Вкладовка
            </p>
            <a href="<?= Yii::$app->urlManager->createUrl('lk') ?>">Начать получать $</a>
        </div>
        <div>
            <a href="<?= Yii::$app->urlManager->createUrl('lk/rent') ?>"><img src="images/3.jpg" alt=""></a>
            <h4>
                <a href="<?= Yii::$app->urlManager->createUrl('lk/rent') ?>">
                    Арендуйте <br>
                    вещи
                </a>
            </h4>
            <p>
                Найдите интересующий Вас предмет, арендуйте и наслаждайтесь
            </p>
            <a href="<?= Yii::$app->urlManager->createUrl('lk/rent') ?>">Арендовать вещь</a>
        </div>
        <div>
            <a href="<?= Yii::$app->urlManager->createUrl('lk/pickup') ?>"><img src="images/4.jpg" alt=""></a>
            <h4>
                <a href="<?= Yii::$app->urlManager->createUrl('lk/pickup') ?>">
                    Сопутствующие <br>
                    услуги
                </a>
            </h4>
            <p>
                Поможем в грузоперевозках и в упаковывании вещей при ремонте и переезде
            </p>
            <a href="<?= Yii::$app->urlManager->createUrl('lk/pickup') ?>">Заказать услугу</a>
        </div>
    </div>
</div>

<div class="sl2-wp" id="categories">
    <div class="container">
        <h2>
            Получите больше от своих вещей с помощью вкладовка
        </h2>
        <p class="info-sl2">
            Неограниченный доход от аренды и низкие ежемесячные <br>
            расходы на управление
        </p>
        <h3>
            Позиции по хранению.
        </h3>
        <div class="row m-hide">
            <div class="col-xl-3 col-lg-6">
                <div class="block-in">
                    <a href="<?= Yii::$app->urlManager->createUrl('lk/storage') ?>"><img src="images/5.png" alt=""></a>
                    <h4>
                        <a href="<?= Yii::$app->urlManager->createUrl('lk/storage') ?>">
                            СТАНДАРТНЫЙ <br>
                            ПУНКТ
                        </a>
                    </h4>
                    <p>
                        <a href="<?= Yii::$app->urlManager->createUrl('lk/storage') ?>">
                            От 23 руб. в месяц
                            Одежда, обувь, книги, сумки, игрушки, посуда, мелкая бытовая техника или другие предметы, которые поместились бы в вашей ручной клади.
                        </a>
                    </p>
                    <a href="<?= Yii::$app->urlManager->createUrl('lk/storage') ?>">Заказать услугу</a>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6">
                <div class="block-in">
                    <a href="<?= Yii::$app->urlManager->createUrl('lk/storage') ?>"><img src="images/6.png" alt=""></a>
                    <h4>
                        <a href="<?= Yii::$app->urlManager->createUrl('lk/storage') ?>">
                            БОЛЬШОЙ <br>
                            ПРЕДМЕТ
                        </a>
                    </h4>
                    <p>
                        <a href="<?= Yii::$app->urlManager->createUrl('lk/storage') ?>">
                            От 135 руб. в месяц
                            Велосипеды, гитары, лыжи, стулья, большие чемоданы, шины, коляски, телевизоры и т.п.
                        </a>
                    </p>
                    <a href="<?= Yii::$app->urlManager->createUrl('lk/storage') ?>">Заказать услугу</a>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6">
                <div class="block-in">
                    <a href="<?= Yii::$app->urlManager->createUrl('lk/storage') ?>"><img src="images/7.png" alt=""></a>
                    <h4>
                        <a href="<?= Yii::$app->urlManager->createUrl('lk/storage') ?>">
                            ЗАКРЫТЫЙ <br>
                            КОНТЕЙНЕР
                        </a>
                    </h4>
                    <p>
                        <a href="<?= Yii::$app->urlManager->createUrl('lk/storage') ?>">
                            От 295 руб. в месяц
                            Коробка с вещами, упакованный чемодан и т.д.
                        </a>
                    </p>
                    <a href="<?= Yii::$app->urlManager->createUrl('lk/storage') ?>">Заказать услугу</a>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6">
                <div class="block-in">
                    <a href="<?= Yii::$app->urlManager->createUrl('lk/storage') ?>"><img src="images/8.png" alt=""></a>
                    <h4>
                        <a href="<?= Yii::$app->urlManager->createUrl('lk/storage') ?>">
                            МЕБЕЛЬ<br />
                        </a>
                    </h4>
                    <p>
                        <a href="<?= Yii::$app->urlManager->createUrl('lk/storage') ?>">
                            При переезде и ремонте. От 200 руб. за 1куб.м/мес
                            Шкафы, столы, диваны, холодильник и т.п.
                        </a>
                    </p>
                    <a href="<?= Yii::$app->urlManager->createUrl('lk/storage') ?>">Заказать услугу</a>
                </div>
            </div>
        </div>
        <div class="owl-carousel owl-theme owl-top m-view">
            <div>
                <a href="<?= Yii::$app->urlManager->createUrl('lk/storage') ?>"><img src="images/5.png" alt=""></a>
                <h4>
                    <a href="<?= Yii::$app->urlManager->createUrl('lk/storage') ?>">
                        СТАНДАРТНЫЙ <br>
                        ПУНКТ
                    </a>
                </h4>
                <p>
                    <a href="<?= Yii::$app->urlManager->createUrl('lk/storage') ?>">
                        От 23 руб. в месяц
                        Одежда, обувь, книги, сумки, игрушки, посуда, мелкая бытовая техника или другие предметы, которые поместились бы в вашей ручной клади.
                    </a>
                </p>
                <a href="<?= Yii::$app->urlManager->createUrl('lk/storage') ?>">Заказать услугу</a>
            </div>
            <div>
                <a href="<?= Yii::$app->urlManager->createUrl('lk/storage') ?>"><img src="images/6.png" alt=""></a>
                <h4>
                    <a href="<?= Yii::$app->urlManager->createUrl('lk/storage') ?>">
                        БОЛЬШОЙ <br>
                        ПРЕДМЕТ
                    </a>
                </h4>
                <p>
                    <a href="<?= Yii::$app->urlManager->createUrl('lk/storage') ?>">
                        От 135 руб. в месяц
                        Велосипеды, гитары, лыжи, стулья, большие чемоданы, шины, коляски, телевизоры и т.п.
                    </a>
                </p>
                <a href="<?= Yii::$app->urlManager->createUrl('lk/storage') ?>">Заказать услугу</a>
            </div>
            <div>
                <a href="<?= Yii::$app->urlManager->createUrl('lk/storage') ?>"><img src="images/7.png" alt=""></a>
                <h4>
                    <a href="<?= Yii::$app->urlManager->createUrl('lk/storage') ?>">
                        ЗАКРЫТЫЙ <br>
                        КОНТЕЙНЕР
                    </a>
                </h4>
                <p>
                    <a href="<?= Yii::$app->urlManager->createUrl('lk/storage') ?>">
                        От 295 руб. в месяц
                        Коробка с вещами, упакованный чемодан и т.д.
                    </a>
                </p>
                <a href="<?= Yii::$app->urlManager->createUrl('lk/storage') ?>">Заказать услугу</a>
            </div>
            <div>
                <a href="<?= Yii::$app->urlManager->createUrl('lk/storage') ?>">
                    <img src="images/8.png" alt="">
                </a>
                <h4>
                    <a href="<?= Yii::$app->urlManager->createUrl('lk/storage') ?>">
                        МЕБЕЛЬ ПРИ ПЕРЕЕЗДЕ <br>
                        И РЕМОНТЕ
                    </a>
                </h4>
                <p>
                    <a href="<?= Yii::$app->urlManager->createUrl('lk/storage') ?>">
                        От 200 руб. за 1куб.м/мес
                        Шкафы, столы, диваны, холодильник и т.п.
                    </a>
                </p>
                <a href="<?= Yii::$app->urlManager->createUrl('lk/storage') ?>">Заказать услугу</a>
            </div>
        </div>

    </div>
</div>

<div class="middle-links">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <a href="<?= Yii::$app->urlManager->createUrl('site/faq#1') ?>">
                    Узнать из чего еще складывается <br>
                    цена за хранение
                </a>
            </div>
            <div class="col-md-6 bl">
                <a href="<?= Yii::$app->urlManager->createUrl(['lk/storage/index']) ?>">
                    Посчитать стоимость предполагаемого <br>
                    хранения
                </a>
            </div>
        </div>
    </div>
</div>

<div class="pikap-wp">
    <div class="container">
        <h2>
            Пикап всех вещей (отвоз/привоз, грузоперевозки,   грузчики, услуги консьержа) от 0руб.
        </h2>
        <ul>
            <li><a href="<?= Yii::$app->urlManager->createUrl('site/faq#2') ?>">Узнать от чего и как складывается стоимость по пикапу</a></li>
            <li><a href="#" class="quest">​Узнать, как получить бесплатный комплект услуг по пикапу</a></li>
        </ul>
        <?php if($trends) : ?>
        <div class="tac">
            <h3>
                Тенденции по аренде в
            </h3>
            <select name="" id="trend-select">
                <?php foreach($trends as $trend) : ?>
                <option value="<?= $trend->id ?>"><?= $trend->city ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="wp-owl-pl">
            <div class="bt-pl prev"><i class="fas fa-chevron-left"></i></div>
            <div class="bt-pl next"><i class="fas fa-chevron-right"></i></div>
            <div id="carousel-trend"></div>
            <!--<div class="owl-carousel owl-theme owl-pl owl-trend-items">
                <div>
                    <img src="images/i1.jpg" alt="">
                </div>
                <div>
                    <img src="images/i1.jpg" alt="">
                </div>
                <div>
                    <img src="images/i1.jpg" alt="">
                </div>
                <div>
                    <img src="images/i1.jpg" alt="">
                </div>
                <div>
                    <img src="images/i1.jpg" alt="">
                </div>
            </div>-->
        </div>
        <?php endif; ?>
    </div>
</div>

<div class="wp-search">
    <p>
        Арендовать интересующий меня предмет
    </p>
    <form action=".">
        <input type="text" id="search-thing">
        <button id="btn-search-thing">Поиск</button>
    </form>
</div>
<div id="search-results"></div>

<div class="sl-wp usl">
    <div class="container">
        <h4>Сопутствующие услуги​</h4>
        <div class="row">
            <div class="col-md-4 offset-md-2">
                <div class="block-in">
                    <a href="<?= Yii::$app->urlManager->createUrl('lk/pickup') ?>"><img src="images/11.jpg" alt=""></a>
                    <p>
                        <a href="<?= Yii::$app->urlManager->createUrl('lk/pickup') ?>">
                            Помощь в грузоперевозках <br>
                            Оптимальные предложения
                        </a>
                    </p>
                    <a href="<?= Yii::$app->urlManager->createUrl('lk/pickup') ?>">Заказать грузоперевозку</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="block-in">
                    <a href="#"><img src="images/002.1.jpg" alt=""></a>
                    <p>
                        <a href="#">
                            Упаковка для переезда <br>
                            Готовые решения
                        </a>
                    </p>
                    <a href="<?= Yii::$app->urlManager->createUrl('lk/rent') ?>">Арендовать/купить</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if($reviews) : ?>
<div class="rews-wp">
    <div class="container">
        <h3>Что говорят наши участники.</h3>

        <div class="owl-carousel owl-theme owl-pl">
            <?php foreach($reviews as $review) : ?>
            <div class="rew-user">
                <div class="user-avatar">
                    <img src="<?= Yii::getAlias('@user').'/'.$review->user->img ?>" alt="">
                </div>
                <div class="user-name">
                    <?= $review->user->fio ?>
                </div>
                <p>
                    <?= $review->content ?>
                </p>
                <div class="date-rew">
                    <?= $review->createdAt ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!--
        <div class="owl-carousel owl-theme owl-pl">
            <div class="rew-user">
                <div class="user-avatar">
                    <img src="images/u1.jpg" alt="">
                </div>
                <div class="user-name">
                    Lucy Baker
                </div>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis, temporibus. Quis sequi suscipit tempora repellat quidem sunt culpa aliquam, unde. Labore ipsam dignissimos saepe, minus, laborum quos pariatur repellat alias?
                </p>
                <div class="date-rew">
                    WEDNESDAY, MARCH 28, 2018
                </div>
            </div>
            <div class="rew-user">
                <div class="user-avatar">
                    <img src="images/u2.jpg" alt="">
                </div>
                <div class="user-name">
                    Josephine Robinson
                </div>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis, temporibus. Quis sequi suscipit tempora repellat quidem sunt culpa aliquam, unde. Labore ipsam dignissimos saepe, minus, laborum quos pariatur repellat alias?
                </p>
                <div class="date-rew">
                    WEDNESDAY, MARCH 28, 2018
                </div>
            </div>
        </div>
        -->
    </div>
</div>
<?php endif; ?>



<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\User;

AppAsset::register($this);
$controller = Yii::$app->controller->id;
$action = Yii::$app->controller->action->id;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <!-- css -->
    <?php $this->head() ?>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <![endif]-->
</head>
<body>
<?php $this->beginBody() ?>
<div class="main-wrapper">
    <div class="main-page-content">
        <div class="bars-m room-hid"><i class="fas fa-bars"></i><i class="fas fa-times"></i></div>

        <header class="room-header">
            <div class="container">
                <div class="logo room-hid">
                    <a href="/"><img src="/images/logo.jpg" alt=""></a>
                </div>
                <div class="m-nav room-hid">
                    <div class="cont-top">
                        <a href="tel:8-800-800-8888"><i class="fas fa-phone"></i> 8-800-800-8888</a> <br>
                        <a href="mail:vkladovka@yandex.ru"><i class="far fa-envelope"></i> vkladovka@yandex.ru</a>
                    </div>
                    <div class="rsp-top">
                        <i class="far fa-clock"></i> Время работы 8:00-20:00<br>
                        Ежедневно
                    </div>
                </div>
                <div class="wp-go room-bt-top">
                    <!-- <a href="#" class="main-bt" data-toggle="modal" data-target="#modalLogin">Войти</a>-->
                    <!--<div class="block-user">
                        <p class="hello-user">
                            Здравствуйте, Дмитрий!
                        </p>
                        <p class="header-links">
                            <a href="#">Профиль</a><a href="#">Выход</a>
                        </p>
                    </div>-->
                    <div class="welcome">
                        <span class="glyphicon glyphicon-user"></span>
                        <a href="<?= Yii::$app->urlManager->createUrl(['lk/profile']) ?>" class="user-name"> <?= User::findOne(Yii::$app->user->id)->fio ?></a>
                        <div class="logout">
                            <a href="<?= Yii::$app->urlManager->createUrl(['site/logout']) ?>">Выход</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <nav>
            <div class="container">
                <ul>
                    <li><a href="<?= Yii::$app->urlManager->createUrl('site/as-work') ?>">Как это работает</a></li>
                    <li><a href="<?= Yii::$app->urlManager->createUrl('site/for-ur-lic') ?>">Для юр. лиц</a></li>
                    <!--<li><a href="<?//= Yii::$app->urlManager->createUrl('site/for-ur-lic2') ?>">Для юр. лиц 2???</a></li>-->
                    <li><a href="#" class="quest">Новичок в Вкладовка?</a></li>
                </ul>
            </div>
        </nav>
        <div class="nav-m room-hid">
            <a href="#" class="quest">Новичок в Вкладовка?</a>
        </div>

        <!-- Modal Login -->
        <div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Войти</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="." class="form">
                            <label for="n1">Логин</label>
                            <input type="text" id="n1">
                            <label for="n2">Пароль</label>
                            <input type="text" id="n2">
                            <div class="row">
                                <div class="col-md-6 link-reg">
                                    <a href="<?= Yii::$app->urlManager->createUrl('site/registration') ?>">Регистрация</a>
                                </div>
                                <div class="col-md-6 tar">
                                    <button class="main-bt">Войти</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="container page-two room-pg">
            <?php if( Yii::$app->session->hasFlash('error') ): ?>
                <p class="bg-info" style="padding: 10px; border-radius: 5px; color: #fff"><?php echo Yii::$app->session->getFlash('error'); ?></p>
            <?php endif;?>
            <?php if( Yii::$app->session->hasFlash('success') ): ?>
                <p class="bg-info" style="padding: 10px; border-radius: 5px; color: #fff"><?php echo Yii::$app->session->getFlash('success'); ?></p>
            <?php endif;?>
            <div class="rm-ul room-nav-top">
                <?php if($controller == "default") { ?>
                <ul>
                    <li><a href="<?= Yii::$app->urlManager->createUrl(['lk/thing/return']) ?>" class="top-menu-btn select-thing">Вернуть <span>вещь</span></a></li>
                    <li><a href="<?= Yii::$app->urlManager->createUrl(['lk/thing/friend']) ?>" class="top-menu-btn select-thing">Передать <span>другу</span></a></li>
                    <li><a href="<?= Yii::$app->urlManager->createUrl(['lk/thing/rent']) ?>" class="top-menu-btn select-thing">Сдать <span>в аренду</span></a></li>
                    <li><a href="#" class="top-menu-btn trust-to-sell">Доверяю <span>продать</span></a></li>
                    <li><a href="<?= Yii::$app->urlManager->createUrl(['lk/thing/extend']) ?>" class="top-menu-btn select-thing">Продлить <span>хранение</span></a></li>
                </ul>
                <?php } ?>
                <?php if($controller == 'bank') { ?>
                    <ul class="my-bank-menu">
                        <li><a href="<?= Yii::$app->urlManager->createUrl(['lk/bank/partner']) ?>" class="top-menu-btn<?php if($action == 'partner') echo ' active' ?>">Партнерская программа</a></li>
                        <li><a href="<?= Yii::$app->urlManager->createUrl(['lk/bank/payments']) ?>" class="top-menu-btn<?php if($action == 'payments') echo ' active' ?>">Платежи</a></li>
                        <li><a href="<?= Yii::$app->urlManager->createUrl(['lk/bank/history']) ?>" class="top-menu-btn<?php if($action == 'history') echo ' active' ?>">История</a></li>
                        <li><a href="<?= Yii::$app->urlManager->createUrl(['lk']) ?>" class="top-menu-btn">Вернуться в Мой склад</a></li>
                    </ul>
                <?php } ?>

            </div>

            <div class="top-menu-button">
                <div class="menu__icon">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <ul class="top-menu-media">
                <!--<div class="my-balance">Мой баланс: <b>20.000 руб.</b></div>-->
                <li><a href="<?= Yii::$app->urlManager->createUrl('lk/bank') ?>">Мой банк</a></li>
                <li><a href="<?= Yii::$app->urlManager->createUrl('lk') ?>">Мой склад</a></li>
                <li><a href="<?= Yii::$app->urlManager->createUrl('lk/rent') ?>">Арендовать вещь</a></li>
                <li><a href="<?= Yii::$app->urlManager->createUrl('lk/storage') ?>">Заказать хранение</a></li>
                <li><a href="<?= Yii::$app->urlManager->createUrl('lk/pickup') ?>">Заказать грузоперевозку</a></li>
                <li><a href="<?= Yii::$app->urlManager->createUrl('lk/package') ?>" class="">Тара и упаковка</a></li>

                <div class="unvisible-block-user">
                    <p class="header-links">
                        <a href="<?= Yii::$app->urlManager->createUrl(['lk']) ?>">Профиль</a>
                        <a href="<?= Yii::$app->urlManager->createUrl(['site/logout', 'id' => $id]) ?>">Выход</a>
                    </p>
                </div>
            </ul>


            <div class="row">
                <div class="col-lg-3 sidebar">
                    <h3>
                        Личный кабинет
                    </h3>
                    <div class="top-menu">
                        <!--<div class="my-balance">Мой баланс: <b>20.000 руб.</b></div>-->
                        <ul>
                            <li><a href="<?= Yii::$app->urlManager->createUrl('lk/bank') ?>">Мой банк</a></li>
                            <li><a href="<?= Yii::$app->urlManager->createUrl('lk') ?>">Мой склад</a></li>
                            <li><a href="<?= Yii::$app->urlManager->createUrl('lk/rent') ?>">Арендовать вещь</a></li>
                            <li><a href="<?= Yii::$app->urlManager->createUrl('lk/storage') ?>">Заказать хранение</a></li>
                            <li><a href="<?= Yii::$app->urlManager->createUrl('lk/pickup') ?>">Заказать грузоперевозку</a></li>
                            <li><a href="<?= Yii::$app->urlManager->createUrl('lk/package') ?>" class="">Тара и упаковка</a></li>
                        </ul>
                    </div>

                </div>
                <div class="col-lg-9 wp-prs">
                    <div class="row">
                        <?= $content ?>
                    </div>
                </div>
            </div>

        </div>

        <!-- Modal Login -->
        <div class="modal fade" id="infoLn1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Подробная информация</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Если заказана услуга грузоперевозок и покупка тары и упаковки. В остальных случаях ,для полноценного пользования всеми возможностями сайта данные необходимы, поскольку будут заключаться онлайн- договора и проводиться денежные операции.
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="rm-ul bt-n room-nav-bottom">
                <ul>
                    <li><a href="<?= Yii::$app->urlManager->createUrl('lk/bank') ?>" class="">Мой банк</a></li>
                    <li><a href="<?= Yii::$app->urlManager->createUrl('lk/storage') ?>" class="">Заказать хранение</a></li>
                    <li><a href="<?= Yii::$app->urlManager->createUrl('lk/rent') ?>" class="">Арендовать вещь</a></li>
                    <li><a href="<?= Yii::$app->urlManager->createUrl('lk/pickup') ?>" class="">Заказать грузоперевозку</a></li>
                    <li><a href="<?= Yii::$app->urlManager->createUrl('lk/package') ?>" class="">Тара и упаковка</a></li>
                </ul>
            </div>
        </div>

    </div>
    <div class="page-footer footer-room">
        <footer class="container">
            <div class="row">
                <div class="col-md-4">
                    <p>
                        Служба поддержки <br>
                        Самовывоз и доставка <br>
                        С 8:00 до 20:00 <br>
                        Ежедневно
                    </p>
                </div>
                <div class="col-md-4">
                    <ul>
                        <li><a href="#" class="quest">Как с нами связаться</a></li>
                        <li><a href="#" class="quest">Пользовательское соглашение</a></li>
                        <li><a href="/faq.php#id50">Правила хранения</a></li>
                        <li><a href="#" class="quest">Правила аренды </a></li>
                        <li><a href="/faq.php">Часто задаваемые вопросы</a></li>
                        <li><a href="#" class="quest">Отзывы/оставить </a></li>
                        <li><a href="#" class="quest">Заказ на хранение</a></li>
                        <li><a href="#" class="quest">Для партнеров по регионам/франшиза</a></li>
                    </ul>
                </div>
                <div class="col-md-4 tar">
                    <a href="#" class="quest">Конфидециальность и безопасность</a>
                    <ul class="net">
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-odnoklassniki"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-whatsapp"></i></a></li>
                        <li><a href="#"><i class="fab fa-vk"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>
</div>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

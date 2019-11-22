<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

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
                    <div class="block-user">
                        <p class="hello-user">
                            Здравствуйте, Дмитрий!
                        </p>
                        <p class="header-links">
                            <a href="#">Профиль</a><a href="#">Выход</a>
                        </p>
                    </div>
                </div>
            </div>
        </header>
        <div class="main">
            <div class="container">
                <?= $content ?>
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
</div>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

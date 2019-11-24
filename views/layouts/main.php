<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\User;
use app\models\LoginForm;

AppAsset::register($this);
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
    <?php $this->registerCssFile('css/libs.min.css') ?>
    <?php $this->registerCssFile('css/bootstrap.min.css') ?>
    <?php $this->registerCssFile('css/jquery.fancybox.min.css') ?>
    <?php $this->registerCssFile('css/bootstrap-datetimepicker3.min.css') ?>
    <?php $this->registerCssFile('css/main.css') ?>

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
        <div class="bars-m"><i class="fas fa-bars"></i><i class="fas fa-times"></i></div>

        <header>
            <div class="container">
                <div class="logo">
                    <a href="/"><img src="/images/logo.jpg" alt=""></a>
                </div>
                <div class="m-nav">
                    <div class="cont-top">
                        <a href="tel:8-800-800-8888"><i class="fas fa-phone"></i> 8-800-800-8888</a> <br>
                        <a href="mail:vkladovka@yandex.ru"><i class="far fa-envelope"></i> vkladovka@yandex.ru</a>
                    </div>
                    <div class="rsp-top">
                        <i class="far fa-clock"></i> Время работы 8:00-20:00<br>
                        Ежедневно
                    </div>
                </div>
                <div class="wp-go">
                    <?php if(Yii::$app->user->isGuest) { ?>
                    <a href="#" class="main-bt" data-toggle="modal" data-target="#modalLogin">Войти</a>
                    <?php } else { ?>
                    <div class="welcome">
                        <span class="glyphicon glyphicon-user"></span>
                            <a href="<?= Yii::$app->urlManager->createUrl(['lk/profile']) ?>" class="user-name">
                                <?= User::findOne(Yii::$app->user->id)->fio ?>
                            </a>
                        <div class="logout">
                            <a href="<?= Yii::$app->urlManager->createUrl(['site/logout']) ?>">Выход</a>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </header>
        <nav>
            <div class="container">
                <ul>
                    <li><a href="<?= Yii::$app->urlManager->createUrl('site/as-work') ?>">Как это работает</a></li>
                    <li><a href="<?= Yii::$app->urlManager->createUrl('site/for-ur-lic') ?>">Для юр. лиц</a></li>
                    <li><a href="<?= Yii::$app->urlManager->createUrl('lk/profile') ?>" class="hidden-lg hidden-md">Профиль</a></li>
                    <li><a href="<?= Yii::$app->urlManager->createUrl('site/logout') ?>" class="hidden-lg hidden-md">Выход</a></li>
                    <!--<li><a href="<?//= Yii::$app->urlManager->createUrl('site/for-ur-lic2') ?>">Для юр. лиц 2???</a></li>-->
                    <li><a href="#" class="quest">Новичок в Вкладовка?</a></li>
                </ul>
            </div>
        </nav>
        <div class="nav-m">
            <a href="#">Новичок в Вкладовка?</a>
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
                        <div class="site-login">
                            <?= \app\widgets\login\LoginWidget::widget()?>
                        <!--
                        <form action="." class="form">
                            <label for="n1">Логин</label>
                            <input type="text" id="n1">
                            <label for="n2">Пароль</label>
                            <input type="text" id="n2">
                            <div class="row">
                                <div class="col-md-6 link-reg">
                                    <a href="<?//= Yii::$app->urlManager->createUrl('site/registration') ?>">Регистрация</a>
                                </div>
                                <div class="col-md-6 tar">
                                    <button class="main-bt">Войти</button>
                                </div>
                            </div>
                        </form>
                        -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Reg -->
        <!-- <div class="modal fade" id="modalReg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
           <div class="modal-dialog" role="document">
              <div class="modal-content">
                 <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLabel">Регистрация</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                   </button>
                 </div>
                 <div class="modal-body">
                    <form action="." class="form">
                       <label for="n1">Логин</label>
                       <input type="text" id="n1">
                       <label for="n3">E-mail</label>
                       <input type="text" id="n3">
                       <label for="n2">Пароль</label>
                       <input type="text" id="n2">
                       <div class="row">
                          <div class="col-md-6 link-reg">
                             <a href="#">Войти</a>
                          </div>
                          <div class="col-md-6 tar">
                             <button class="main-bt">Продолжить</button>
                          </div>
                       </div>
                    </form>
                 </div>
              </div>
           </div>
        </div> -->

<!-- Alert Flash -->
        <?php if( Yii::$app->session->hasFlash('success') ): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo Yii::$app->session->getFlash('success'); ?>
            </div>
        <?php endif;?>
        <?php if( Yii::$app->session->hasFlash('error') ): ?>
            <div class="alert alert-error alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo Yii::$app->session->getFlash('error'); ?>
            </div>
        <?php endif;?>


        <?= $content ?>
        <?= $this->render('_chat') ?>
    </div>
        <div class="page-footer">
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
                            <li><a href="<?= Yii::$app->urlManager->createUrl('site/faq#id50') ?>">Правила хранения</a></li>
                            <li><a href="#" class="quest">Правила аренды </a></li>
                            <li><a href="<?= Yii::$app->urlManager->createUrl('site/faq') ?>">Часто задаваемые вопросы</a></li>
                            <li><a href="#" class="quest">Отзывы/оставить </a></li>
                            <li><a href="<?= Yii::$app->urlManager->createUrl(['lk/order-storage', 'id' => $id]) ?>">Заказ на хранение</a></li>
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

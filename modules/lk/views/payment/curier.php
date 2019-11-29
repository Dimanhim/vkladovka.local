<?php

/* @var $this yii\web\View */

use yii\web\View;
use yii\helpers\Url;
use kartik\datetime\DateTimePicker;

$this->title = 'Оплата с баланса личного кабинета';
?>
<!-- Хлебные крошки -->
<ul class="bread-crumps">
    <li><a href="<?= Yii::$app->urlManager->createUrl(['site/index']) ?>">Главная</a></li>
    <li><a href="<?= Yii::$app->urlManager->createUrl(['lk/index']) ?>"> / Личный кабинет</a></li>
    <li><a href="<?= Yii::$app->urlManager->createUrl(['lk/my-stock']) ?>"> / Мои вещи</a></li>
    <li> / Продлить хранение "Вещь такая то"</li>
</ul>
<!-- Хлебные крошки -->

<div class="col-md-12">
    <h2 class="tac">Отдайте оплату курьеру! (текст сюда нужен)</h2>
</div>
<div>
    <p>Ваш текущий баланс: <b> 2341 руб.</b></p>
</div>






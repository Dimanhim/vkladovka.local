<?php

/* @var $this yii\web\View */

use yii\web\View;

$this->title = 'Мой банк';
?>

<!-- Хлебные крошки -->
<ul class="bread-crumps">
    <li><a href="<?= Yii::$app->urlManager->createUrl(['site/index']) ?>">Главная</a></li>
    <li><a href="<?= Yii::$app->urlManager->createUrl(['lk/index']) ?>"> / Личный кабинет</a></li>
    <li> / Мой банк</li>
</ul>
<!-- Хлебные крошки -->

<div class="col-md-12">
    <h2 class="tac">Мой банк</h2>
</div>

<div class="clearfix"></div>

<table class="table">
    <tr>
        <td>Баланс: </td>
        <td>2187 руб.</td>
        <td>
            <p><a href="<?= Yii::$app->urlManager->createUrl(['lk/bank-money-off']) ?>">Вывести</a></p>
            <p><a href="<?= Yii::$app->urlManager->createUrl(['lk/bank-money-on']) ?>">Пополнить</a></p>
        </td>
    </tr>
    <tr>
        <td>Бонусный баланс: </td>
        <td>488 руб.</td>
        <td>
            <p><a href="<?= Yii::$app->urlManager->createUrl(['lk/bank-pay-rent-tara']) ?>">Оплатить аренду тары</a></p>
            <p><a href="<?= Yii::$app->urlManager->createUrl(['lk/bank-pay-storage']) ?>">Оплатить хранение</a></p>
        </td>
    </tr>
</table>



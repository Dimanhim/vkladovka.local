<?php

/* @var $this yii\web\View */

use yii\web\View;

$this->title = 'Партнерская программа';
?>

<!-- Хлебные крошки -->
<ul class="bread-crumps">
    <li><a href="<?= Yii::$app->urlManager->createUrl(['site/index']) ?>">Главная</a></li>
    <li><a href="<?= Yii::$app->urlManager->createUrl(['lk/index']) ?>"> / Личный кабинет</a></li>
    <li><a href="<?= Yii::$app->urlManager->createUrl(['lk/bank']) ?>"> / Мой банк</a></li>
    <li> / Партнерская программа</li>
</ul>
<!-- Хлебные крошки -->

<div class="col-md-12">
    <h2 class="tac">Партнерская программа</h2>
</div>

<div class="clearfix"></div>

<table class="table">
    <tr>
        <td>Ваш персональный код: </td>
        <td>fb6LRI753hGf</td>
    </tr>
    <tr>
        <td>Ввести код партнера для получения привилегий и бонусов: </td>
        <td><input type="text" class="form-control"></td>
    </tr>
    <tr>
        <td>Получить код через партнера (без оплаты вступления в партнерскую программу): </td>
        <td><textarea type="text" class="form-control" placeholder="здесь я не понял что должно быть и как это работает"></textarea></td>
    </tr>
</table>




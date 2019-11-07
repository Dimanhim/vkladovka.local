<?php

/* @var $this yii\web\View */

use yii\web\View;
use yii\helpers\Url;

$this->title = 'Вещь такая то';
?>

<!-- Хлебные крошки -->
<ul class="bread-crumps">
    <li><a href="<?= Yii::$app->urlManager->createUrl(['site/index']) ?>">Главная</a></li>
    <li><a href="<?= Yii::$app->urlManager->createUrl(['lk/index']) ?>"> / Личный кабинет</a></li>
    <li><a href="<?= Yii::$app->urlManager->createUrl(['lk/my-stock']) ?>"> / Мои вещи</a></li>
    <li> / Вещь такая то</li>
</ul>
<!-- Хлебные крошки -->

<div class="col-md-12">
    <h2 class="tac">Вещь такая-то</h2>
</div>

<div class="clearfix"></div>
<div class="col-md-12">
    <!--<div class="main-img">
        <div class="item-single-thing">
            <img src="/img/item-1.jpg" alt="" />
            <div class="back">
                <ul>
                    <li><a href="<?//= Yii::$app->urlManager->createUrl(['lk/thing']) ?>" target="_blanc">Вернуть вещь</a></li>
                    <li><a href="<?//= Yii::$app->urlManager->createUrl(['lk/thing']) ?>" target="_blanc">Передать другу</a></li>
                    <li><a href="<?//= Yii::$app->urlManager->createUrl(['lk/thing']) ?>" target="_blanc">Сдать в аренду</a></li>
                    <li><a href="<?//= Yii::$app->urlManager->createUrl(['lk/thing']) ?>" target="_blanc">Продлить хранение</a></li>
                    <li><a href="<?//= Yii::$app->urlManager->createUrl(['lk/thing']) ?>" target="_blanc">Доверяю продать</a></li>
                </ul>
            </div>
        </div>
    </div>-->
    <div>
        <a href="<?= Yii::$app->urlManager->createUrl(['lk/my-stock']) ?>">Вернуться на склад</a>
    </div>
    <div class="thing-actions">
        <table class="table">
            <tr>
                <td>
                    Название:
                </td>
                <td>
                    Вещь такая-то
                </td>
            </tr>
            <tr>
                <td>
                    Фото:
                </td>
                <td class="thing-photo">
                    <img src="/img/item-1.jpg" alt="" />
                </td>
            </tr>
        </table>
    </div>
</div>



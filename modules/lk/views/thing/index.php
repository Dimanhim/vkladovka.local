<?php

/* @var $this yii\web\View */

use yii\web\View;
use yii\helpers\Url;

$this->title = $model->name;
?>


<!-- -------------------------Хлебные крошки -->
<ul class="bread-crumps">
    <li><a href="<?= Yii::$app->urlManager->createUrl(['site/index']) ?>">Главная</a></li>
    <li><a href="<?= Yii::$app->urlManager->createUrl(['lk']) ?>"> / Личный кабинет</a></li>
    <li> / <?= $model->name ?></li>
</ul>
<!-- Хлебные крошки -->



<div class="col-md-12">
    <h2 class="tac"><?= $model->name ?></h2>
</div>

<div class="clearfix"></div>
<div class="col-md-12">
    <div>
        <a href="<?= Yii::$app->urlManager->createUrl(['lk']) ?>">Вернуться на склад</a>
    </div>
    <div class="main-img">
        <div class="item-single-thing">
            <img src="<?= Yii::getAlias('@thing').'/'.$model->img ?>" alt="" />
            <div class="back">
                <ul>
                    <li><a href="<?= Yii::$app->urlManager->createUrl(['lk/thing/return']) ?>" data-things="0">Вернуть вещь</a></li>
                    <li><a href="<?= Yii::$app->urlManager->createUrl(['lk/thing/friend']) ?>" data-things="0">Передать другу</a></li>
                    <li><a href="<?= Yii::$app->urlManager->createUrl(['lk/thing/rent']) ?>" data-things="0">Сдать в аренду</a></li>
                    <li><a href="<?= Yii::$app->urlManager->createUrl(['lk/thing/extend']) ?>" class="my-thing-extend">Продлить хранение</a></li>
                    <li><a href="#" class="top-menu-btn trust-to-sell" data-things="0">Доверяю продать</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="thing-actions">
        <table class="table">
            <tr>
                <td>
                    Название:
                </td>
                <td>
                    <?= $model->name ?>
                </td>
            </tr>
            <tr>
                <td>
                    Описание:
                </td>
                <td>
                    <?= $model->description ?>
                </td>
            </tr>
            <tr>
                <td>
                    Категория:
                </td>
                <td>
                    <?= $model->category->name ?>
                </td>
            </tr>
        </table>
    </div>
</div>



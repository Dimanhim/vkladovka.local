<?php

/* @var $this yii\web\View */

use yii\web\View;

$this->title = 'Моя вещь такая то';
?>
<div class="col-md-12">
    <h2 class="tac">Моя вещь такая то</h2>
</div>

<div class="clearfix"></div>
<div class="col-md-12">
    <div class="main-img">
        <div class="item-thing">
            <img src="/img/item-1.jpg" alt="" />
            <div class="back">
                <ul>
                    <li><a href="#">Вернуть вещь</a></li>
                    <li><a href="#">Передать другу</a></li>
                    <li><a href="#">Сдать в аренду</a></li>
                    <li><a href="#">Продлить хранение</a></li>
                    <li><a href="#">Доверяю продать</a></li>
                </ul>
            </div>
        </div>

    </div>


    <!-- ------------------------------ ГАЛЕРЕЯ
    <div class="main-img">
        <a class="gal" href="/img/item-1.jpg"><img src="/img/item-1.jpg" alt="" /></a>
    </div>
    <div class="row">
        <div class="col-md-2">
            <a class="gal" href="/img/item-1.jpg"><img src="/img/item-1.jpg" alt="" /></a>
        </div>
        <div class="col-md-2">
            <a class="gal" href="/img/item-2.jpg"><img src="/img/item-2.jpg" alt="" /></a>
        </div>
        <div class="col-md-2">
            <a class="gal" href="/img/item-3.jpg"><img src="/img/item-3.jpg" alt="" /></a>
        </div>
        <div class="col-md-2">
            <a class="gal" href="/img/item-4.jpg"><img src="/img/item-4.jpg" alt="" /></a>
        </div>
        <div class="col-md-2">
            <a class="gal" href="/img/item-5.jpg"><img src="/img/item-5.jpg" alt="" /></a>
        </div>
        <div class="col-md-2">
            <a class="gal" href="/img/item-1.jpg"><img src="/img/item-1.jpg" alt="" /></a>
        </div>
    </div>
    -->
    <div class="setting-pr">
        <ul>
            <li><a href="<?= Yii::$app->urlManager->createUrl(['lk/thing-back']) ?>">Вернуть</a></li>
            <li class="active"><a href="<?= Yii::$app->urlManager->createUrl(['lk/thing-friend']) ?>">Передать другу</a></li>
            <li><a href="<?= Yii::$app->urlManager->createUrl(['lk/thing-rent']) ?>">Сдать в аренду</a></li>
            <li><a href="<?= Yii::$app->urlManager->createUrl(['lk/thing-sale']) ?>">Доверяю продать</a></li>
        </ul>
    </div>

</div>


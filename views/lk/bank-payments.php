<?php

/* @var $this yii\web\View */

use yii\web\View;

$this->title = 'Платежи';
?>

<!-- Хлебные крошки -->
<ul class="bread-crumps">
    <li><a href="<?= Yii::$app->urlManager->createUrl(['site/index']) ?>">Главная</a></li>
    <li><a href="<?= Yii::$app->urlManager->createUrl(['lk/index']) ?>"> / Личный кабинет</a></li>
    <li><a href="<?= Yii::$app->urlManager->createUrl(['lk/bank']) ?>"> / Мой банк</a></li>
    <li> / Платежи</li>
</ul>
<!-- Хлебные крошки -->

<div class="col-md-12">
    <h2 class="tac">Платежи</h2>
</div>

    <div class="col-md-6 col-xs-6">
        <div>
            <a href="#">Оплатить хранение</a>
        </div>
        <div>
            <a href="#">Оплатить доставку</a>
        </div>
        <div>
            <a href="#">Оплатить грузоперевозку</a>
        </div>
        <div>
            <a href="#">Оплатить аренду</a>
        </div>
    </div>
    <div class="col-md-6 col-xs-6">
        <div class="payments-description">
            <p>
                Вам достаточно внести деньги на свой счет в личном кабинете с пометкой за что. Деньги автоматически спишутся                    за указанную услугу.
            </p>
        </div>
    </div>







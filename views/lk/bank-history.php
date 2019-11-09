<?php

/* @var $this yii\web\View */

use yii\web\View;

$this->title = 'История';
?>

<!-- Хлебные крошки -->
<ul class="bread-crumps">
    <li><a href="<?= Yii::$app->urlManager->createUrl(['site/index']) ?>">Главная</a></li>
    <li><a href="<?= Yii::$app->urlManager->createUrl(['lk/index']) ?>"> / Личный кабинет</a></li>
    <li><a href="<?= Yii::$app->urlManager->createUrl(['lk/bank']) ?>"> / Мой банк</a></li>
    <li> / История</li>
</ul>
<!-- Хлебные крошки -->

<div class="col-md-12">
    <h2 class="tac">История</h2>
</div>

<table class="table">
    <tr>
        <th>Дата</th>
        <th>Операция</th>
        <th>Сумма</th>
    </tr>
    <tr>
        <td><?= date('d-m-Y') ?></td>
        <td>Пополнение баланса</td>
        <td class="balance-plus">+3000 руб.</td>
    </tr>
    <tr>
        <td><?= date('d-m-Y') ?></td>
        <td>Оплата грузоперевозки</td>
        <td class="balance-minus">-3000 руб.</td>
    </tr>
    <tr>
        <td><?= date('d-m-Y') ?></td>
        <td>Оплата хранения</td>
        <td class="balance-minus">-3000 руб.</td>
    </tr>
    <tr>
        <td><?= date('d-m-Y') ?></td>
        <td>Оплата доставки</td>
        <td class="balance-minus">-3000 руб.</td>
    </tr>
    <tr>
        <td><?= date('d-m-Y') ?></td>
        <td>Оплата аренды</td>
        <td class="balance-minus">-3000 руб.</td>
    </tr>
</table>








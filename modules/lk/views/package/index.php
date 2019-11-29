<?php

/* @var $this yii\web\View */

use yii\web\View;
use yii\helpers\Url;
use kartik\datetime\DateTimePicker;

$this->title = 'Тара и упаковка';
?>

<!-- ----------------Хлебные крошки -->
<ul class="bread-crumps">
    <li><a href="<?= Yii::$app->urlManager->createUrl(['site/index']) ?>">Главная</a></li>
    <li><a href="<?= Yii::$app->urlManager->createUrl(['lk']) ?>"> / Личный кабинет</a></li>
    <li> / Тара и упаковка</li>
</ul>
<!-- Хлебные крошки -->

<div class="col-md-12">
    <h2 class="tac">Заказать тару (упаковку)</h2>
</div>

<div class="clearfix"></div>
<div class="col-md-12">
    <div>
        <a href="<?= Yii::$app->urlManager->createUrl(['lk']) ?>">Вернуться на склад</a>
    </div>
    <div class="thing-actions">
        <h3>Выберите нужное:</h3>
        <ul class="package-list">
            <li><a href="<?= Yii::$app->urlManager->createUrl(['lk/package/tara']) ?>" class="btn btn-primary">Тара</a></li>
            <li><a href="<?= Yii::$app->urlManager->createUrl(['lk/package/package']) ?>" class="btn btn-primary">Упаковка</a></li>
            <li><a href="<?= Yii::$app->urlManager->createUrl(['lk/package/other']) ?>" class="btn btn-primary">Прочие расходники</a></li>
        </ul>
    </div>
</div>



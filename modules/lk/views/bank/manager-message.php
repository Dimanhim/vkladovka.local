<?php

/* @var $this yii\web\View */

use yii\web\View;
use yii\helpers\Url;
use kartik\datetime\DateTimePicker;

$this->title = 'Заявка принята в работу';
?>
<!-- Хлебные крошки -->
<ul class="bread-crumps">
    <li><a href="<?= Yii::$app->urlManager->createUrl(['site/index']) ?>">Главная</a></li>
    <li><a href="<?= Yii::$app->urlManager->createUrl(['lk/index']) ?>"> / Личный кабинет</a></li>
    <li> / Обработка заявки</li>
</ul>
<!-- Хлебные крошки -->

<div class="col-md-12">
    <h2 class="tac">Обработка заявки менеджером</h2>
</div>

<div class="clearfix"></div>
<div class="col-md-12">
    <div>
        <a href="<?= Yii::$app->urlManager->createUrl(['lk/my-stock']) ?>">Вернуться на склад</a>
    </div>
    <div>
        <p>
            Ваша заявка принята в работу. Менеджер в кратчайшие сроки рассчитает стоимость услуги и перезвонит вам.<br />Спасибо за обращение!
        </p>
    </div>
</div>




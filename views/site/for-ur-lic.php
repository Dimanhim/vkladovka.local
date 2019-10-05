<?php

/* @var $this yii\web\View */

use yii\web\View;

$this->title = 'Для юридических лиц';
?>
<div class="container page-two for-page">
    <h2 class="tac">Для Юридических лиц</h2>

    <div class="sub-info-for">
        <p>
            Вкладовка предлагает по специальным ценам помощь в хранении мебели и оборудования при переезде/или ремонте офиса. Наш специалист выйдет на место и бесплатно рассчитает стоимость перевозки и хранения.
        </p>
        <ul>
            <li><a href="#" class="quest">Рассчитать примерную стоимость услуги самостоятельно</a></li>
            <li><a href="#" class="quest">Заказать выезд специалиста</a></li>
            <li><a href="<?= Yii::$app->urlManager->createUrl('site/order-service') ?>">Заказать услугу</a></li>
        </ul>
        <p>
            Вкладовка предлагает ответственное хранение опломбированных и застрахованных  архивных документов предприятия.
        </p>
        <ul>
            <li><a href="#" class="quest">Рассчитать примерную стоимость услуги самостоятельно</a></li>
            <li><a href="<?= Yii::$app->urlManager->createUrl('site/order-service') ?>">Заказать услугу</a></li>
        </ul>
        <p>
            Вкладовка предлагает воспользоваться по привлекательным ценам площадями для временного хранения вещей интернет-магазинов.
        </p>
        <ul>
            <li><a href="<?= Yii::$app->urlManager->createUrl('site/order-service') ?>">Заказать услугу</a></li>
        </ul>
        <p>
            Вкладовка предлагает услугу курьера по срочной передаче ценных вещей.
        </p>
        <ul>
            <li><a href="<?= Yii::$app->urlManager->createUrl('site/order-service') ?>">Заказать услугу</a></li>
        </ul>
    </div>
</div>

<!-- Modal Login -->
<div class="modal fade" id="infoLn1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Подробная информация</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Если заказана услуга грузоперевозок и покупка тары и упаковки. В остальных случаях ,для полноценного пользования всеми возможностями сайта данные необходимы, поскольку будут заключаться онлайн- договора и проводиться денежные операции.
            </div>
        </div>
    </div>
</div>
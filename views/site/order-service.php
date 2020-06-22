<?php

/* @var $this yii\web\View */

use yii\web\View;

$this->title = 'Заказать услугу';
?>
<div class="container page-two">
    <h2 class="tac">Заказать услугу</h2>

    <div class="sub-info-for">
        <p>
            Вы можете заказать услугу , зарегистрировавшись на сайте, после чего у Вас появляется свой личный кабинет на сайте, где Вы можете отслеживать сданные на хранение вещи. Пожалуйста, ознакомьтесь с пользовательским соглашением и типовыми договорами. Нажимая кнопку «зарегистрироваться» Вы соглашаетесь с их условиями. При заполнении данных о вещах , информация автоматически переносится в договор , по кол-ву, ассортименту, сроках, стоимости ,условиях и пр. Перед нажатием кнопки «заказать» для вашего удобства это информация предварительно выходит на экране , а после сделки , при приезде консьержа привозятся бумажные копии договора, одна из копий которых остается у Вас. Вся архивная документация пломбируются в обязательном порядке. При необходимости, любая сданная вещь может быть застрахована.
        </p>
        <ul>
            <li><a href="#" class="quest">Пользовательское соглашение</a></li>
            <li><a href="#" class="quest">Договор хранения</a></li>
            <li><a href="<?= Yii::$app->urlManager->createUrl(['lk/storage/index']) ?>">Рассчитать стоимость предполагаемого хранения</a></li>
        </ul>
        <form action="" class="order form-main">
            <div class="input-wp">
                <label for="n1">Название *</label>
                <input type="text" id="n1" class="form-control">
                <sub>Вы можете зарегистрироваться как частное лицо, с сохранением всех привилегий,если не хотите, чтобы фирма афишировалась</sub>
            </div>
            <div class="input-wp">
                <label for="n1">ИНН</label>
                <input type="text" id="n1" class="form-control">
            </div>
            <div class="input-wp">
                <label for="n1">Логин</label>
                <input type="text" id="n1" class="form-control">
            </div>
            <div class="input-wp">
                <label for="n1">Пароль</label>
                <input type="text" id="n1" class="form-control">
            </div>
            <div class="input-wp">
                <label for="n1">ОГРН</label>
                <input type="text" id="n1" class="form-control">
            </div>
            <div class="input-wp">
                <label for="n1">Юридический адрес</label>
                <input type="text" id="n1" class="form-control">
            </div>
            <div class="input-wp">
                <label for="n1">Телефон, e-mail:</label>
                <input type="text" id="n1" class="form-control">
            </div>
            <div class="input-wp">
                <label for="n1">Расчетный счет в банке</label>
                <input type="text" id="n1" class="form-control">
            </div>
            <div class="input-wp">
                <label for="n1">Директор Ф.И.О, действующий на основании</label>
                <input type="text" id="n1" class="form-control">
            </div>
            <div class="select-wp">
                <select name="" id="" class="form-control">
                    <option value="">Вызвать специалиста по оценке переезда</option>
                    <option value="">Заказать услугу по хранению при переезде и ремонте</option>
                    <option value="">Заказать услугу по хранению документации</option>
                </select>
            </div>
            <div class="check-form">
                <label for="n51"><input type="checkbox" id="n51" class="form-control" checked> Ознакомлен и согласен с <a href="#" class="quest">пользовательским соглашением</a></label>
            </div>
            <div class="check-form">
                <label for="n51"><input type="checkbox" id="n51" class="form-control" checked> <a href="#" class="quest">Согласен на обработку персональных данных</a></label>
            </div>
            <button class="main-bt">Заказать</button>
        </form>
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

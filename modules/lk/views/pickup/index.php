<?php

/* @var $this yii\web\View */

use yii\web\View;
use yii\helpers\Url;
use kartik\datetime\DateTimePicker;

$this->title = 'Заказать грузоперевозку';
?>
<?= $this->render('_payment', [
    'message' => 'Заказать грузоперевозку'
]) ?>

<!-- -------------------------Хлебные крошки -->
<ul class="bread-crumps">
    <li><a href="<?= Yii::$app->urlManager->createUrl(['site/index']) ?>">Главная</a></li>
    <li><a href="<?= Yii::$app->urlManager->createUrl(['lk']) ?>"> / Личный кабинет</a></li>
    <li> / Заказать грузоперевозку</li>
</ul>
<!-- Хлебные крошки -->

<div class="col-md-12">
    <h2 class="tac">Заказать грузоперевозку (пикап)</h2>
</div>

<div class="clearfix"></div>
<div class="col-md-12">
    <div>
        <a href="<?= Yii::$app->urlManager->createUrl(['lk']) ?>">Вернуться на склад</a>
    </div>
    <div class="thing-actions">
        <table class="table">
            <form action="">
                <tr>
                    <td>
                        Описание (в общих словах):
                    </td>
                    <td>
                        <textarea name="1" id="" cols="30" rows="4" class="form-control"></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <a href="#" class="pickup-description">Посмотреть пример описания вещей</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        Когда удобно забрать:
                    </td>
                    <td>
                        <?= DateTimePicker::widget([
                            'name' => 'check_issue_date',
                            'value' => date('d-m-Y H:i'),
                            'options' => ['placeholder' => 'Выберете дату ...'],
                            'pluginOptions' => [
                                'format' => 'dd-mm-yyyy h:i',
                                'todayHighlight' => true
                            ]
                        ]); ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Адрес:
                    </td>
                    <td>
                        <textarea name="2" id="" cols="30" rows="4" class="form-control"></textarea>
                    </td>
                </tr>
                <?php if(Yii::$app->user->isGuest) { ?>
                <tr>
                    <td>
                        Контакты:
                    </td>
                    <td>
                        <input name="2" class="form-control phone" placeholder="Телефон" /><br />
                        <input name="2" class="form-control" placeholder="E-mail" />
                    </td>
                </tr>
                <?php } ?>
                <tr>
                    <td>
                        <input type="checkbox" name="3" /> Нужны грузчики <br />
                        <input type="checkbox" name="5" /> Есть лифт
                    </td>
                    <td class="bold">
                        <h4>Общие расценки:</h4>
                        <ul>
                            <li>Грузовой автомобиль: 550 руб/час</li>
                            <li>Грузчики- 550 руб/час</li>
                            <li>При отсутствии лифта – 150руб-этаж, начиная со 2-го</li>
                        </ul>
                        <p>Итоговая сумма за грузоперевозку(пикап) определяется по факту потраченного времени и условий по выгрузки.</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="4" /> Согласен
                    </td>
                    <td>
                        <!-- Поменять на button -->
                        <a href="<?= Yii::$app->urlManager->createUrl(['lk/manager', 'id' => $id]) ?>" class="btn btn-primary" name="order">Заказать грузоперевозку</a>
                    </td>
                </tr>
            </form>
        </table>
    </div>
</div>



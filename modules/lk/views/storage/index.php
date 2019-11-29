<?php

/* @var $this yii\web\View */

use yii\web\View;
use yii\helpers\Url;
use kartik\datetime\DateTimePicker;

$this->title = 'Заказать хранение';
?>
<?= $this->render('_payment', [
    'message' => 'Заказать хранение'
]) ?>
<!-- -------------------Хлебные крошки -->
<ul class="bread-crumps">
    <li><a href="<?= Yii::$app->urlManager->createUrl(['site/index']) ?>">Главная</a></li>
    <li><a href="<?= Yii::$app->urlManager->createUrl(['lk']) ?>"> / Личный кабинет</a></li>
    <li> / Заказать хранение</li>
</ul>
<!-- Хлебные крошки -->

<div class="col-md-12">
    <h2 class="tac">Заказать хранение</h2>
</div>

<div class="clearfix"></div>
<div class="col-md-12">
    <div>
        <a href="<?= Yii::$app->urlManager->createUrl(['lk']) ?>">Вернуться на склад</a>
    </div>
    <div class="thing-actions">
        <table class="table">

            <?= $this->render('_item') ?>

            <tr class="size">
                <td>
                    Добавить вещь <a href="#" class="add-thing"><span class="glyphicon glyphicon-plus"></span></a>
                </td>
                <td>
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
            <tr class="size">
                <td>
                    На какой срок:
                </td>
                <td>
                    <input type="text" class="form-control" placeholder="дней..." />
                </td>
            </tr>
            <tr class="size">
                <td>
                    Примерная стоимость вывоза и  обратной доставки:
                </td>
                <td>
                    <input type="text" class="form-control" placeholder="рублей" />
                </td>
            </tr>
            <tr class="size">
                <td>
                    Стоимость хранения:<br /> <input type="text" class="form-control size-item" placeholder="" disabled value="1564 руб." />
                </td>
                <td>
                    Итого к оплате:<br /> <input type="text" class="form-control size-item" placeholder="" disabled value="2296 руб." />
                </td>
            </tr>
            <tr>
                <td>
                    Согласен <input type="checkbox" />
                </td>
                <td>
                    Оплата
                    <div>
                        <input type="radio" name="name" id="" value="" checked /> Картой
                    </div>
                    <div>
                        <input type="radio" name="name" id="" value="" /> Наличными или картой курьеру
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button class="btn btn-primary modal-btn">Заказать хранение</button>
                </td>
            </tr>
        </table>
    </div>
</div>




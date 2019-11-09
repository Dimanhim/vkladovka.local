<?php

/* @var $this yii\web\View */

use yii\web\View;
use yii\helpers\Url;
use kartik\datetime\DateTimePicker;

$this->title = 'Вернуть "вещь такая то"';
?>
<div class="modal fade" id="tariffs-return" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Тарифы по срочной доставке</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ol>
                    <li>Доставка(забор вещи) осуществляется с 8 до 20часов. Доставка  за рамками данного времени по желанию заказчика +50% к тарифу, включая срочный тариф.</li>
                    <li>Тариф по срочной доставке за каждую вещь( кроме мебели):
                        <ul>
                            <li>-в течении дня- 200руб</li>
                            <li>- в течении 2-3 часов- 400 руб.</li>
                            <li>- течении 2-3 часов 350 руб за каждую вещь, если их 2 и более.</li>
                            <li>- в течении 1 часа- 800 руб.</li>
                        </ul>
                    </li>
                    <li>Доставка мебели в течении дня+ 50% к обычному тарифу.</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Хлебные крошки -->
<ul class="bread-crumps">
    <li><a href="<?= Yii::$app->urlManager->createUrl(['site/index']) ?>">Главная</a></li>
    <li><a href="<?= Yii::$app->urlManager->createUrl(['lk/index']) ?>"> / Личный кабинет</a></li>
    <li><a href="<?= Yii::$app->urlManager->createUrl(['lk/my-stock']) ?>"> / Мои вещи</a></li>
    <li> / Вернуть "Вещь такая то"</li>
</ul>
<!-- Хлебные крошки -->

<div class="col-md-12">
    <h2 class="tac">Вернуть "Вещь такая-то"</h2>
</div>

<div class="clearfix"></div>
<div class="col-md-12">
    <div>
        <a href="<?= Yii::$app->urlManager->createUrl(['lk/my-stock']) ?>">Вернуться на склад</a>
    </div>
    <div class="thing-actions">
        <table class="table">
            <tr>
                <td>
                    Название:
                </td>
                <td>
                    Вещь такая-то
                </td>
            </tr>
            <tr>
                <td>
                    Фото:
                </td>
                <td class="thing-photo">
                    <img src="/img/item-1.jpg" alt="" />
                </td>
            </tr>
            <tr>
                <td>
                    Вернуть в течение:
                </td>
                <td>
                    <select name="" id="select-date" class="form-control">
                        <option value="">Выбрать...</option>
                        <option value="">1 часа</option>
                        <option value="">2-3 часов</option>
                        <option value="">в течение дня</option>
                        <option value="10">в другой день</option>
                    </select>
                    <p style="font-style: italic">Время доставки ежедневно с 8 до 20ч. За рамками это времени тариф+50%.</p>
                </td>
            </tr>
            <tr class="select-date">
                <td>
                    Вернуть в течение:
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
            <tr class="select-date">
                <td colspan="2">
                    <a href="#" class="tariffs-return">Посмотреть тарифы по срочной доставке</a>
                </td>
            </tr>
            <tr>
                <td>
                    По адресу:
                </td>
                <td>
                    <textarea name="" id="" cols="30" rows="4" class="form-control">Здесь по умолчанию будет адрес, указанный в договоре, можно менять</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Цена за срочную доставку:
                </td>
                <td>
                    <input type="text" name="price" class="form-control" placeholder="рублей" />
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button class="btn btn-primary">Вернуть вещь</button>
                </td>
            </tr>
        </table>
    </div>
</div>


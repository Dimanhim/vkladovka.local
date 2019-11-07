<?php

/* @var $this yii\web\View */

use yii\web\View;
use yii\helpers\Url;
use kartik\datetime\DateTimePicker;

$this->title = 'Вернуть "вещь такая то"';
?>

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
    <!--<div class="main-img">
        <div class="item-single-thing">
            <img src="/img/item-1.jpg" alt="" />
            <div class="back">
                <ul>
                    <li><a href="<?//= Yii::$app->urlManager->createUrl(['lk/thing']) ?>" target="_blanc">Вернуть вещь</a></li>
                    <li><a href="<?//= Yii::$app->urlManager->createUrl(['lk/thing']) ?>" target="_blanc">Передать другу</a></li>
                    <li><a href="<?//= Yii::$app->urlManager->createUrl(['lk/thing']) ?>" target="_blanc">Сдать в аренду</a></li>
                    <li><a href="<?//= Yii::$app->urlManager->createUrl(['lk/thing']) ?>" target="_blanc">Продлить хранение</a></li>
                    <li><a href="<?//= Yii::$app->urlManager->createUrl(['lk/thing']) ?>" target="_blanc">Доверяю продать</a></li>
                </ul>
            </div>
        </div>
    </div>-->
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


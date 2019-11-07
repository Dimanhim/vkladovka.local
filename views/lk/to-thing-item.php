<?php

/* @var $this yii\web\View */

use yii\web\View;
use yii\helpers\Url;

$this->title = 'Сдать в аренду "вещь такая то"';
?>

<!-- Хлебные крошки -->
<ul class="bread-crumps">
    <li><a href="<?= Yii::$app->urlManager->createUrl(['site/index']) ?>">Главная</a></li>
    <li><a href="<?= Yii::$app->urlManager->createUrl(['lk/index']) ?>"> / Личный кабинет</a></li>
    <li><a href="<?= Yii::$app->urlManager->createUrl(['lk/to-thing-rent']) ?>"> / Арендовать вещь</a></li>
    <li><a href="<?= Yii::$app->urlManager->createUrl(['lk/to-things']) ?>"> / Категория "Рюкзаки"</a></li>
    <li> / Арендовать вещь "Такая то"</li>
</ul>
<!-- Хлебные крошки -->

<div class="col-md-12">
    <h2 class="tac">Арендовать "Вещь такая-то"</h2>
</div>

<div class="clearfix"></div>
<div class="col-md-12">
    <div>
        <a href="<?= Yii::$app->urlManager->createUrl(['lk/my-stock']) ?>">Вернуться на склад</a>
    </div>
    <div class="thing-actions">
        <table class="table">
            <tr class="adress-textarea">
                <td>
                    Адрес доставки:<br />

                </td>
                <td>
                    <textarea name="" id="" cols="30" rows="4" class="form-control">вбивается текст, есть ли какие то особенности по вещи, материал, потертости, пр.)</textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    Заберу сам <input type="checkbox" name="" class="hide-textarea" />
                </td>
            </tr>
            <tr class="adress-textarea">
                <td>
                    Время доставки:<br />

                </td>
                <td>
                    <input class="form-control" />
                </td>
            </tr>
            <tr>
                <td>
                    На какой срок:<br />
                </td>
                <td>
                    <input class="form-control" placeholder="Введите срок доставки (дней)" />
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    Необходимо внести депозит или <a href="#">застраховать вещь</a>
                </td>
            </tr>
            <tr>

                <td>
                    <input class="form-control" placeholder="сумма в рублях" />
                </td>
                <td>
                    Депозит
                </td>
            </tr>
            <tr>

                <td>
                    <input class="form-control" />
                </td>
                <td>
                    Аренда, включая доставку
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button class="btn btn-primary">Арендовать вещь</button>
                </td>
            </tr>
        </table>
    </div>

</div>



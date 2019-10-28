<?php

/* @var $this yii\web\View */

use yii\web\View;
use yii\helpers\Url;

$this->title = 'Сдать в аренду "вещь такая то"';
?>
<div class="col-md-12">
    <h2 class="tac">Сдать в аренду "Вещь такая-то"</h2>
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
                    Категория:
                </td>
                <td>
                    <select name="" class="form-control">
                        <option value="">Категория 1</option>
                        <option value="">Категория 2</option>
                        <option value="">Категория 3</option>
                        <option value="">Категория 4</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    Описание:
                </td>
                <td>
                    <textarea name="" id="" cols="30" rows="4" class="form-control">вбивается текст, есть ли какие то особенности по вещи, материал, потертости, пр.)</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Особые условия:
                </td>
                <td>
                    <textarea name="" id="" cols="30" rows="4" class="form-control">ограничения по аренде, залог за вещь/страховка, минимальное кол-во дней</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Цена в день аренды:
                </td>
                <td>
                    <input type="text" name="price" class="form-control" placeholder="рублей" />
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button class="btn btn-primary">Сдать в аренду</button>
                </td>
            </tr>
        </table>
    </div>


    <!-- ------------------------------ ГАЛЕРЕЯ
    <div class="main-img">
        <a class="gal" href="/img/item-1.jpg"><img src="/img/item-1.jpg" alt="" /></a>
    </div>
    <div class="row">
        <div class="col-md-2">
            <a class="gal" href="/img/item-1.jpg"><img src="/img/item-1.jpg" alt="" /></a>
        </div>
        <div class="col-md-2">
            <a class="gal" href="/img/item-2.jpg"><img src="/img/item-2.jpg" alt="" /></a>
        </div>
        <div class="col-md-2">
            <a class="gal" href="/img/item-3.jpg"><img src="/img/item-3.jpg" alt="" /></a>
        </div>
        <div class="col-md-2">
            <a class="gal" href="/img/item-4.jpg"><img src="/img/item-4.jpg" alt="" /></a>
        </div>
        <div class="col-md-2">
            <a class="gal" href="/img/item-5.jpg"><img src="/img/item-5.jpg" alt="" /></a>
        </div>
        <div class="col-md-2">
            <a class="gal" href="/img/item-1.jpg"><img src="/img/item-1.jpg" alt="" /></a>
        </div>
    </div>
    -->
</div>


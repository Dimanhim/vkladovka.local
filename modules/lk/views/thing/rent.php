<?php

/* @var $this yii\web\View */

use yii\web\View;
use yii\helpers\Url;

if(count($model) > 1) $many = true;
else $many = false;

if($many) $this->title = 'Сдать в аренду '.count($model).' вещи(ей)';
else $this->title = 'Сдать в аренду '.$model[0]->name;
?>

<!-- ----------------------------Хлебные крошки -->
<ul class="bread-crumps">
    <li><a href="<?= Yii::$app->urlManager->createUrl(['site/index']) ?>">Главная</a></li>
    <li><a href="<?= Yii::$app->urlManager->createUrl(['lk']) ?>"> / Личный кабинет</a></li>
    <?php if($many) : ?>
        <li> / Сдать в аренду <?= count($model) ?> вещи(ей)</li>
    <?php else : ?>
        <li> / Сдать в аренду <?= $model[0]->name ?></li>
    <?php endif; ?>
</ul>
<!-- Хлебные крошки -->

<div class="col-md-12">
    <?php if($many) : ?>
        <h2 class="tac">Сдать в аренду <?= count($model) ?> вещи(ей)</h2>
    <?php else : ?>
        <h2 class="tac">Сдать в аренду <?= $model[0]->name ?></h2>
    <?php endif; ?>
</div>

<div class="clearfix"></div>
<div class="col-md-12">
    <div>
        <a href="<?= Yii::$app->urlManager->createUrl(['lk']) ?>">Вернуться на склад</a>
    </div>
    <div class="thing-actions">
        <table class="table">
            <tr>
                <td>
                    Название:
                </td>
                <td>
                    <?php foreach($model as $v) : ?>
                        <a href="<?= Yii::$app->urlManager->createUrl(['lk/thing', 'id' => $v->id]) ?>" class="thing-item-link" data-thing-item="<?= $v->id ?>"><?= $v->name ?> <?= $v->id ?></a><br />
                    <?php endforeach; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Фото:
                </td>
                <td class="thing-photo">
                    <?php foreach($model as $v) : ?>
                        <a href="<?= Yii::$app->urlManager->createUrl(['lk/thing', 'id' => $v->id]) ?>" class="thing-item-img" data-thing-item="<?= $v->id ?>">
                            <img src="<?= Yii::getAlias('@thing').'/'.$v->img ?>" alt="" />
                        </a>,
                    <?php endforeach; ?>
                </td>
            </tr>
            <!--
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
            -->
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
                    <textarea name="" id="" cols="30" rows="4" class="form-control">ограничения по аренде, залог за вещь, минимальное кол-во дней</textarea>
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
</div>


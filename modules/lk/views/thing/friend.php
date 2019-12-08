<?php

/* @var $this yii\web\View */

use kartik\datetime\DateTimePicker;
use yii\web\View;
use yii\helpers\Url;

if(count($model) > 1) $many = true;
else $many = false;

if($many) $this->title = 'Передать другу '.count($model).' вещи(ей)';
else $this->title = 'Передать другу '.$model[0]->name;
?>

<!-- ----------------------------Хлебные крошки -->
<ul class="bread-crumps">
    <li><a href="<?= Yii::$app->urlManager->createUrl(['site/index']) ?>">Главная</a></li>
    <li><a href="<?= Yii::$app->urlManager->createUrl(['lk']) ?>"> / Личный кабинет</a></li>
    <?php if($many) : ?>
        <li> / Передать другу <?= count($model) ?> вещи(ей)</li>
    <?php else : ?>
        <li> / Передать другу <?= $model[0]->name ?></li>
    <?php endif; ?>
</ul>
<!-- Хлебные крошки -->

<div class="col-md-12">
    <?php if($many) : ?>
        <h2 class="tac">Передать другу <?= count($model) ?> вещи(ей)</h2>
    <?php else : ?>
        <h2 class="tac">Передать другу <?= $model[0]->name ?></h2>
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
            <tr>
                <td>
                    Передать в течение:
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
                <td>Имя получателя:</td>
                <td>
                    <input type="text" name="name" class="form-control" placeholder="Имя получателя" />
                </td>
            </tr>
            <tr>
                <td>Контактный телефон:</td>
                <td>
                    <input type="text" name="phone" class="phone form-control" />
                </td>
            </tr>
            <tr>
                <td>Особые пожелания:</td>
                <td>
                    <textarea name="" id="" cols="30" rows="4" class="form-control">Особые пожелания</textarea>
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
                    Цена за доставку:
                </td>
                <td>
                    <input type="text" name="price" class="form-control" placeholder="рублей" />
                </td>
            </tr>
            <tr>
                <td>
                    Упаковать:
                </td>
                <td>
                    <select name="" id="select-date" class="form-control">
                        <option value="">Выбрать...</option>
                        <option value="">В красивую упаковку</option>
                        <option value="">В обычную упаковку</option>
                        <option value="">Не упаковывать</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button class="btn btn-primary">Передать другу вещь</button>
                </td>
            </tr>
        </table>
    </div>
</div>


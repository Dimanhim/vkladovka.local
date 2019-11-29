<?php

/* @var $this yii\web\View */

use yii\web\View;
use yii\helpers\Url;
use kartik\datetime\DateTimePicker;

$this->title = 'Вернуть "вещь такая то"';
$items = 5;
?>

<!-- --------------------------Хлебные крошки -->
<ul class="bread-crumps">
    <li><a href="<?= Yii::$app->urlManager->createUrl(['site/index']) ?>">Главная</a></li>
    <li><a href="<?= Yii::$app->urlManager->createUrl(['lk']) ?>"> / Личный кабинет</a></li>
    <li> / Вернуть "Вещь такая то"</li>
</ul>
<!-- Хлебные крошки -->

<div class="col-md-12">
    <h2 class="tac">Вернуть "Вещь такая-то"</h2>
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
                <?php if($_GET['all']) { ?>
                <td>
                    <?php for($i = 1; $i < $items + 1; $i++) { ?>
                    <a href="<?= Yii::$app->urlManager->createUrl(['lk/thing']) ?>" class="thing-item-link" data-thing-item="<?= $i ?>">Вещь такая-то <?= $i ?></a><br />
                    <?php } ?>
                </td>
                <?php } else { ?>
                <td>
                    <a href="<?= Yii::$app->urlManager->createUrl(['lk/thing']) ?>" class="thing-item-link">Вещь такая-то</a>
                </td>
                <?php } ?>
            </tr>
            <tr>
                <td>
                    Фото:
                </td>
                <?php if($_GET['all']) { ?>
                <td class="thing-photo">
                    <?php for($i = 1; $i < $items + 1; $i++) { ?>
                    <a href="<?= Yii::$app->urlManager->createUrl(['lk/thing']) ?>" class="thing-item-img" data-thing-item="<?= $i ?>">
                        <img src="/img/item-<?= $i ?>.jpg" alt="" />
                    </a>,
                    <?php } ?>
                </td>
                <?php } else { ?>
                    <td class="thing-photo">
                        <img src="/img/item-1.jpg" alt="" />
                    </td>
                <?php } ?>
            </tr>
            <tr>
                <td>
                    Вернуть в течение:
                </td>
                <td>
                    <select name="" id="select-date" class="form-control">
                        <option value="">Выбрать...</option>
                        <option value="1">1 часа (800 руб.)</option>
                        <option value="2">2-3 часов (от 350 руб. за каждую вещь)</option>
                        <option value="3">в течение дня (200 руб.)</option>
                        <option value="10">в другой день</option>
                    </select>
                    <p style="font-style: italic">Время доставки ежедневно с 8 до 20ч. За рамками это времени тариф+50%.</p>
                </td>
            </tr>
            <tr class="return-tr">
                <td colspan="4">
                    <div class="description-block">
                        Стоимость возврата "в другой день" расчитывается индивидуально.<br />
                        Для точного расчета стоимости свяжитесь с Вашим менеджером <br />
                        <a href="#" class="btn btn-success call-to-operator">Заказать обратный звонок</a>
                    </div>
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
                    Цена за срочную доставку: <span class="danger-span">(будет выводиться для НЕ МЕБЕЛИ)</span>
                </td>
                <td>
                    <input id="return-price" type="text" name="price" class="form-control" placeholder="Выберете в течение какого срока вернуть" disabled />
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <div class="description-block">
                        <span class="danger-span">Блок будет выводиться только для мебели</span>
                        Стоимость срочного возврата мебельной продукции расчитывается индивидуально.<br />
                        Для точного расчета стоимости свяжитесь с Вашим менеджером <br />
                        <a href="#" class="btn btn-success call-to-operator">Заказать обратный звонок</a>
                    </div>
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


<?php

/* @var $this yii\web\View */

use yii\web\View;
use yii\helpers\Url;
use kartik\datetime\DateTimePicker;

$this->title = 'Продлить хранение "вещь такая то"';
?>
<div class="col-md-12">
    <h2 class="tac">Продлить хранение "Вещь такая-то"</h2>
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
            <tr class="select-date-extend">
                <td>
                    Продлить до:
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
                    Стоимость хранения:
                </td>
                <td>
                    <input type="text" name="price" class="form-control" placeholder="рублей" />
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button class="btn btn-primary">Продлить хранение</button>
                </td>
            </tr>
        </table>
    </div>
</div>



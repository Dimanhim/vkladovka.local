<?php

/* @var $this yii\web\View */

use yii\web\View;
use yii\helpers\Url;
use kartik\datetime\DateTimePicker;

if(count($model) > 1) $many = true;
else $many = false;

if($many) $this->title = 'Вернуть '.count($model).' вещи(ей)';
else $this->title = 'Вернуть '.$model[0]->name;

$furniture = false;
foreach($model as $v) {
    if($v->cat == 8) {
        $furniture = true;
        break;
    }
}
$none_furniture = false;
foreach($model as $v) {
    if($v->cat != 8) {
        $none_furniture = true;
        break;
    }
}

?>
<!-- --------------------------Хлебные крошки -->
<ul class="bread-crumps">
    <li><a href="<?= Yii::$app->urlManager->createUrl(['site/index']) ?>">Главная</a></li>
    <li><a href="<?= Yii::$app->urlManager->createUrl(['lk']) ?>"> / Личный кабинет</a></li>
    <?php if($many) : ?>
        <li> / Вернуть <?= count($model) ?> вещи(ей)</li>
    <?php else : ?>
        <li> / Вернуть <?= $model[0]->name ?></li>
    <?php endif; ?>

</ul>
<!-- Хлебные крошки -->

<div class="col-md-12">
    <?php if($many) : ?>
        <h2 class="tac">Вернуть <?= count($model) ?> вещи(ей)</h2>
    <?php else : ?>
        <h2 class="tac">Вернуть <?= $model[0]->name ?></h2>
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
                    <a href="<?= Yii::$app->urlManager->createUrl(['lk/thing', 'id' => $v->id]) ?>" class="thing-item-link" data-thing-item="<?= $v->id ?>"><?= $v->name ?><?= $v->id ?></a><br />
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
            <?php if($none_furniture) : ?>
            <tr>
                <td>
                    Цена за срочную доставку: <span class="danger-span"></span>
                </td>
                <td>
                    <input id="return-price" type="text" name="price" class="form-control" placeholder="Выберете в течение какого срока вернуть" disabled />
                </td>
            </tr>
            <?php endif; ?>
            <?php if($furniture) : ?>
            <tr>
                <td colspan="4">
                    <div class="description-block">
                        Стоимость срочного возврата мебельной продукции расчитывается индивидуально.<br />
                        Для точного расчета стоимости свяжитесь с Вашим менеджером <br />
                        <a href="#" class="btn btn-success call-to-operator">Заказать обратный звонок</a>
                    </div>
                </td>
            </tr>
            <?php endif; ?>
            <tr>
                <td colspan="2">
                    <button class="btn btn-primary">Вернуть вещь</button>
                </td>
            </tr>
        </table>
    </div>
</div>


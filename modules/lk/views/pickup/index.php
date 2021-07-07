<?php

/* @var $this yii\web\View */

use yii\web\View;
use yii\helpers\Url;
use kartik\datetime\DateTimePicker;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = 'Заказать грузоперевозку';
?>
<?= $this->render('_payment', [
    'message' => 'Заказать грузоперевозку'
]) ?>

<!-- -------------------------Хлебные крошки -->
<ul class="bread-crumps">
    <li><a href="<?= Yii::$app->urlManager->createUrl(['site/index']) ?>">Главная</a></li>
    <li><a href="<?= Yii::$app->urlManager->createUrl(['lk']) ?>"> / Личный кабинет</a></li>
    <li> / Заказать грузоперевозку</li>
</ul>
<!-- Хлебные крошки -->

<div class="col-md-12">
    <h2 class="tac">Заказать грузоперевозку (пикап)</h2>
</div>

<div class="clearfix"></div>
<div class="col-md-12">
    <div>
        <a href="<?= Yii::$app->urlManager->createUrl(['lk']) ?>">Вернуться на склад</a>
    </div>

    <div class="thing-actions">
        <?php $form = ActiveForm::begin(['id' => 'form-pickup']) ?>
        <?= $form->field($model, 'description')->textarea(['cols' => 30, 'rows' => 4]) ?>
        <div class="form-group">
            <a href="#" class="pickup-description">Посмотреть пример описания вещей</a>
        </div>
        <?= $model->attributeLabels()['date_time'] ?>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'pickup_date')->textInput(['placeholder' => 'Выберете дату ...', 'data-type' => 'date', 'class' => 'form-control date-picker']) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'pickup_time')->textInput(['placeholder' => 'Выберете время ...', 'data-type' => 'date', 'class' => 'form-control select-time']) ?>
            </div>
        </div>


        <?= $form->field($model, 'address')->textarea(['cols' => 30, 'rows' => 4]) ?>
        <?php if(Yii::$app->user->isGuest) { ?>
            <?= $form->field($model, 'phone')->textInput(['placeholder' => "Телефон", 'class' => 'form-control phone']) ?><br />
            <?= $form->field($model, 'email')->textInput(['placeholder' => "E-mail", 'type' => 'email']) ?>
        <?php } ?>
        <div class="form-group">
            <h4>Общие расценки:</h4>
            <ul>
                <li>Грузовой автомобиль: 550 руб/час</li>
                <li>Грузчики- 550 руб/час</li>
                <li>При отсутствии лифта – 150руб-этаж, начиная со 2-го</li>
            </ul>
            <p>Итоговая сумма за грузоперевозку(пикап) определяется по факту потраченного времени и условий по выгрузки.</p>
        </div>
        <?= $form->field($model, 'movers')->checkbox() ?><br />
        <?= $form->field($model, 'lift')->checkbox() ?>
        <?= $form->field($model, 'agree')->checkbox() ?>
        <?= Html::submitButton('Заказать грузоперевозку', ['class' => "btn btn-primary"]) ?>
        <?php ActiveForm::end() ?>
    </div>

</div>



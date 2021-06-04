<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\User;

$this->title = 'Редактирование профиля';
?>
<!-- -------------------Хлебные крошки -->
<ul class="bread-crumps">
    <li><a href="<?= Yii::$app->urlManager->createUrl(['site/index']) ?>">Главная</a></li>
    <li><a href="<?= Yii::$app->urlManager->createUrl(['lk']) ?>"> / Личный кабинет</a></li>
    <li><a href="<?= Yii::$app->urlManager->createUrl(['lk/profile']) ?>"> / Профиль</a></li>
    <li> / <?= $model->fio ?></li>
</ul>
<!-- Хлебные крошки -->

<div class="col-md-12">
    <h2 class="tac">Редактирование профиля - <?= $model->fio ?></h2>
</div>

<div class="clearfix"></div>
<div class="col-md-12">
    <?php $form = ActiveForm::begin(['fieldConfig' => ['options' => ['tag' => false]], 'options' => ['class' => 'form send-dat']]) ?>
    <?= $form->field($edit, 'fio')->textInput(['value' => $model->fio]) ?>
    <?= $form->field($edit, 'passport')->textarea(['value' => $model->passport]) ?>
    <?= $form->field($edit, 'address')->textarea(['value' => $model->address]) ?>
    <?= $form->field($edit, 'phone')->textInput(['value' => $model->phone, 'class' => 'phone']) ?>
    <?= $form->field($edit, 'email')->textInput(['value' => $model->email, 'disabled' => true]) ?>
    <?= $form->field($edit, 'file')->fileInput() ?>
    <?= Html::submitButton("<b>Обновить</b>", ['class' => "btn btn-success"]) ?>
    <?php ActiveForm::end() ?>
</div>




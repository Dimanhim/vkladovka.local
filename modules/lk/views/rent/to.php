<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\web\View;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
$title = $cat ? $cat->name : 'Результаты поиска';
$this->title = $title.' || арендовать вещь';
?>

<!-- ----------------Хлебные крошки -->
<ul class="bread-crumps">
    <li><a href="<?= Yii::$app->urlManager->createUrl(['site/index']) ?>">Главная</a></li>
    <li><a href="<?= Yii::$app->urlManager->createUrl(['lk']) ?>"> / Личный кабинет</a></li>
    <li><a href="<?= Yii::$app->urlManager->createUrl(['lk/rent']) ?>"> / Арендовать вещь</a></li>
    <li> / Вещь такая то</li>
</ul>
<!-- Хлебные крошки -->


<div class="col-md-12">
    <h2 class="tac"><?= $title ?></h2>
</div>
<div>
    <a href="<?= Yii::$app->urlManager->createUrl(['lk/rent']) ?>">Вернуться к выбору категорий вещей</a>
</div>
<div class="col-md-12">
    <h3 class="tac">Выберете вещь</h3>
</div>

<div class="clearfix"></div>
<div class="col-md-12">

    <div class="search-category">
        <div class="row">
            <div class="col-md-6">
                <?php $form = ActiveForm::begin(['id' => 'form-reserve-1', 'options' => ['class' => 'search-form']]) ?>
                <span class="search-form-icon">
                    <i class="fa fa-lg fa-search"></i>
                </span>
                <?= $form->field($formModel, 'request', ['template' => "{input}"])->textInput(['placeholder' => "Введите название вещи"]) ?>
                <?= Html::submitButton('Поиск', ['class' => "btn btn-success search-form-submit"]) ?>
                <?php ActiveForm::end() ?>
            </div>
        </div>
    </div>
    <div class="thing-actions">
        <div class="row">
            <?php if($model) : ?>
            <?php foreach($model as $value) : ?>
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="cat-item">
                        <div class="cat-img">
                            <a href="/admin/things/<?= $value->img ?>" class="gallery">
                                <img src="/admin/things/<?= $value->img ?>" alt="">
                            </a>
                            <a href="<?= Yii::$app->urlManager->createUrl(['lk/rent/thing', 'id' => $value->id]) ?>"><?= $value->name ?></a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php else : ?>
                <div class="col-md-4 col-sm-4 col-xs-4">
                    В данной категории вещей не найдено
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>





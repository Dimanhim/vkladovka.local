<?php

/* @var $this yii\web\View */

use yii\web\View;
use yii\helpers\Url;

$this->title = 'Рюкзаки || арендовать вещь';
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
    <h2 class="tac"><?= $cat->name ?></h2>
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
            <div class="col-md-4">
                <input type="text" class="form-control" placeholder="Поиск по категории">
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





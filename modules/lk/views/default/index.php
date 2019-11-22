<?php

/* @var $this yii\web\View */

use yii\web\View;

$this->title = 'Мой склад';
?>

<!-- ---------------------------Хлебные крошки -->
<ul class="bread-crumps">
    <li><a href="<?= Yii::$app->urlManager->createUrl(['site/index']) ?>">Главная</a></li>
    <li><a href="<?= Yii::$app->urlManager->createUrl(['lk']) ?>"> / Личный кабинет</a></li>
    <li> / Мои вещи</li>
</ul>
<!-- Хлебные крошки -->

    <div class="col-md-12">
        <h2 class="tac" style="margin-bottom: 10px;">Мои вещи</h2>
    </div>
    <div class="col-md-12 error">
        <p>Пожалуйста, выберете хотя бы одну вещь!</p>
    </div>
    <div class="clearfix"></div>
<?php for ($i = 1; $i < 8; $i++) { ?>
    <div class="product-one col-4 product-one">
        <div class="">
            <div class="item-thing">
                <div class="item-img">
                    <img src="/img/item-<?= $i ?>.jpg" alt=""/>
                </div>
                <div class="description">
                    <a href="<?= Yii::$app->urlManager->createUrl(['lk/thing']) ?>">Вещь такая-то</a>
                </div>
                <div class="checkbox">
                    <input type="checkbox" />
                </div>
                <div class="back"></div>
            </div>
        </div>
    </div>
<?php } ?>


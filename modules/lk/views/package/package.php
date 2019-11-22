<?php

/* @var $this yii\web\View */

use yii\web\View;
use yii\helpers\Url;
use kartik\datetime\DateTimePicker;

$this->title = 'Упаковка';
?>

<!-- ----------------Хлебные крошки -->
<ul class="bread-crumps">
    <li><a href="<?= Yii::$app->urlManager->createUrl(['site/index']) ?>">Главная</a></li>
    <li><a href="<?= Yii::$app->urlManager->createUrl(['lk']) ?>"> / Личный кабинет</a></li>
    <li><a href="<?= Yii::$app->urlManager->createUrl(['lk/package']) ?>"> / Тара и упаковка</a></li>
    <li> / Упаковка </li>
</ul>
<!-- Хлебные крошки -->

<div class="col-md-12">
    <h2 class="tac">Выбрать упаковку</h2>
</div>

<div class="clearfix"></div>
<div class="col-md-12">
    <div>
        <a href="<?= Yii::$app->urlManager->createUrl(['lk']) ?>">Вернуться на склад</a>
    </div>
    <div class="thing-actions">
        <div class="row">
            <?php for($i = 1; $i < 9; $i++) { ?>
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="cat-item">
                        <div class="cat-img">
                            <a href="/img/package-2.jpg" class="gallery">
                                <img src="/img/package-2.jpg" alt="">
                            </a>
                            <a href="<?= Yii::$app->urlManager->createUrl(['lk/package/item']) ?>">Оберточная лента</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>




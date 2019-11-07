<?php

/* @var $this yii\web\View */

use yii\web\View;
use yii\helpers\Url;

$this->title = 'Арендовать вещь';
?>

<!-- Хлебные крошки -->
<ul class="bread-crumps">
    <li><a href="<?= Yii::$app->urlManager->createUrl(['site/index']) ?>">Главная</a></li>
    <li><a href="<?= Yii::$app->urlManager->createUrl(['lk/index']) ?>"> / Личный кабинет</a></li>
    <li> / Арендовать вещь</li>
</ul>
<!-- Хлебные крошки -->

<div class="col-md-12">
    <h2 class="tac">Арендовать вещь</h2>
</div>
<div>
    <a href="<?= Yii::$app->urlManager->createUrl(['lk/my-stock']) ?>">Вернуться на склад</a>
</div>
<div class="col-md-12">
    <h3 class="tac">Выберете категорию</h3>
</div>

<div class="clearfix"></div>
<div class="col-md-12">

    <div class="search-category">
        <div class="row">
            <div class="col-md-4">
                <input type="text" class="form-control" placeholder="Поиск по категориям">
            </div>
        </div>
    </div>
    <div class="thing-actions">
        <div class="row">
            <?php for($i = 1; $i < 7; $i++) { ?>
            <div class="col-md-4 col-sm-4 col-xs-4">
                <div class="cat-item">
                    <div class="cat-img">
                        <a href="<?= Yii::$app->urlManager->createUrl(['lk/to-things']) ?>">
                            <img src="/img/item-<?= $i ?>.jpg" alt="">
                            <span>Рюкзаки</span>
                        </a>

                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>




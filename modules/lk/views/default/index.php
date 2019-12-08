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
<?php if($model) : ?>
    <div class="col-md-12 error">
        <p>Пожалуйста, выберете хотя бы одну вещь!</p>
    </div>
    <div class="clearfix"></div>
<?php foreach($model as $v) : ?>
    <div class="product-one col-4 product-one">
        <div class="">
            <div class="item-thing">
                <div class="item-img">
                    <img src="<?= Yii::getAlias('@thing').'/'.$v->img ?>" alt=""/>
                </div>
                <div class="description">
                    <a href="<?= Yii::$app->urlManager->createUrl(['lk/thing', 'id' => $v->id]) ?>"><?= $v->name ?></a>
                </div>
                <div class="checkbox" data-thing="<?= $v->id ?>">
                    <input type="checkbox" />
                </div>
                <div class="back"></div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<?php else : ?>
    <div class="col-md-12">
        <p>
            У Вас пока что нет вещей в системе
        </p>
    </div>
<?php endif; ?>


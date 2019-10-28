<?php

/* @var $this yii\web\View */

use yii\web\View;

$this->title = 'Мой склад';
?>
    <div class="col-md-12">
        <h2 class="tac">Мои вещи</h2>
    </div>

    <div class="clearfix"></div>
<?php for ($i = 0; $i < 7; $i++) { ?>
    <div class="product-one col-4">
        <div class="">
            <div class="item-thing">
                <div class="item-img">
                    <img src="/img/item-1.jpg" alt=""/>
                </div>
                <div class="description">
                    <a href="<?= Yii::$app->urlManager->createUrl(['lk/thing-rent']) ?>">Lorem ipsum dolor sit amet,
                        consectetur adipisicing elit.</a>
                </div>
                <div class="checkbox">
                    <input type="checkbox"<?php // if($i == 0) echo ' checked' ?> />
                </div>
                <div class="back"></div>
                <div class="back-menu">
                    <ul class="small-item">
                        <li><a href="<?= Yii::$app->urlManager->createUrl(['lk/thing-rent']) ?>">Просмотр</a></li>
                        <li><a href="#">Вернуть вещь</a></li>
                        <li><a href="#">Передать другу</a></li>
                        <li><a href="#">Сдать в аренду</a></li>
                        <li><a href="#">Продлить хранение</a></li>
                        <li><a href="#">Доверяю продать</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
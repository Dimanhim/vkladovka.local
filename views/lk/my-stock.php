<?php

/* @var $this yii\web\View */

use yii\web\View;

$this->title = 'Мой склад';
?>
<div class="col-md-12">
    <h2 class="tac">Мой склад</h2>
</div>

<div class="clearfix"></div>
<?php for($i = 0; $i < 7; $i++) { ?>
<div class="product-one col-4">
    <div class="">
        <div class="item-thing">
            <img src="/img/item-1.jpg" alt="" />
            <div class="back">
                <ul class="small-item">
                    <li><a href="<?= Yii::$app->urlManager->createUrl(['lk/thing']) ?>">Просмотр</a></li>
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
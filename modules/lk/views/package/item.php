<?php

/* @var $this yii\web\View */

use yii\web\View;
use yii\helpers\Url;
use kartik\datetime\DateTimePicker;

$this->title = 'Тара - Картонная коробка';

?>
<?=
$this->render('_payment', [
    'message' => 'Купить "картонная коробка"',
])
?>

<!-- ----------------Хлебные крошки -->
<ul class="bread-crumps">
    <li><a href="<?= Yii::$app->urlManager->createUrl(['site/index']) ?>">Главная</a></li>
    <li><a href="<?= Yii::$app->urlManager->createUrl(['lk']) ?>"> / Личный кабинет</a></li>
    <li><a href="<?= Yii::$app->urlManager->createUrl(['lk/package']) ?>"> / Тара и упаковка</a></li>
    <li><a href="<?= Yii::$app->urlManager->createUrl(['lk/package/package']) ?>"> / Упаковка</a></li>
    <li> / Картонная коробка </li>
</ul>
<!-- Хлебные крошки -->

<div class="clearfix"></div>
<div class="col-md-12">
    <div>
        <a href="<?= Yii::$app->urlManager->createUrl(['lk']) ?>">Вернуться на склад</a>
    </div>
    <div class="main-img">
        <div class="item-single-thing">
            <img src="/img/package-1.jpg" alt="" />
        </div>
    </div>
    <div class="thing-actions">
        <table class="table">
            <tr>
                <td>
                    Картонная коробка
                </td>
                <td colspan="2">
                    10х10х10см
                </td>
            </tr>
            <tr>
                <td>
                    <a href="#" class="modal-btn">Взять в аренду</a>
                </td>
                <td>
                    5руб./в день
                </td>
                <td>
                    при хранении в «Вкладовка»  предоставляется подарок
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    В аренду не сдается
                </td>
            </tr>
            <tr>
                <td>
                    <a href="#" class="modal-btn">Купить</a>
                </td>
                <td colspan="2">
                    20 руб.
                </td>
            </tr>
            <tr>
                <td>
                    <a href="#" class="modal-btn">Доставка</a>
                </td>
                <td>
                    150 руб.
                </td>
                <td>
                    Для бесплатной доставки сумма заказа не менее 1000руб?
                </td>
            </tr>
        </table>
    </div>
</div>












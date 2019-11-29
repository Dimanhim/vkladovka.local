<?php

/* @var $this yii\web\View */

use yii\web\View;
use yii\helpers\Url;
use kartik\datetime\DateTimePicker;

$this->title = 'Продлить хранение "вещь такая то"';
$items = 5;
?>
<?= $this->render('_payment', [
        'message' => 'Продлить хранение "вещь такая-то"'
]) ?>
<!-- Хлебные крошки -->
<ul class="bread-crumps">
    <li><a href="<?= Yii::$app->urlManager->createUrl(['site/index']) ?>">Главная</a></li>
    <li><a href="<?= Yii::$app->urlManager->createUrl(['lk/index']) ?>"> / Личный кабинет</a></li>
    <li><a href="<?= Yii::$app->urlManager->createUrl(['lk/my-stock']) ?>"> / Мои вещи</a></li>
    <li><a href="<?= Yii::$app->urlManager->createUrl(['lk/my-thing']) ?>"> / Вещь такая-то</a></li>
    <li> / Продлить хранение "Вещь такая то"</li>
</ul>
<!-- Хлебные крошки -->

<div class="col-md-12">
    <h2 class="tac">Продлить хранение "Вещь такая-то"</h2>
</div>

<div class="clearfix"></div>
<div class="col-md-12">
    <div>
        <a href="<?= Yii::$app->urlManager->createUrl(['lk/my-stock']) ?>">Вернуться на склад</a>
    </div>
    <div class="thing-actions">
        <table class="table">
            <tr>
                <td>
                    Название:
                </td>
                <?php if($_GET['all']) { ?>
                    <td>
                        <?php for($i = 1; $i < $items + 1; $i++) { ?>
                            <a href="<?= Yii::$app->urlManager->createUrl(['lk/thing']) ?>" class="thing-item-link" data-thing-item="<?= $i ?>">Вещь такая-то <?= $i ?></a><br />
                        <?php } ?>
                    </td>
                <?php } else { ?>
                    <td>
                        <a href="<?= Yii::$app->urlManager->createUrl(['lk/thing']) ?>">Вещь такая-то</a>
                    </td>
                <?php } ?>
            </tr>
            <tr>
                <td>
                    Фото:
                </td>
                <?php if($_GET['all']) { ?>
                    <td class="thing-photo">
                        <?php for($i = 1; $i < $items + 1; $i++) { ?>
                            <a href="<?= Yii::$app->urlManager->createUrl(['lk/thing']) ?>" class="thing-item-img" data-thing-item="<?= $i ?>">
                                <img src="/img/item-<?= $i ?>.jpg" alt="" />
                            </a>,
                        <?php } ?>
                    </td>
                <?php } else { ?>
                    <td class="thing-photo">
                        <img src="/img/item-1.jpg" alt="" />
                    </td>
                <?php } ?>
            </tr>
            <tr class="select-date-extend">
                <td>
                    Продлить до:
                </td>
                <td>
                    <?= DateTimePicker::widget([
                        'name' => 'check_issue_date',
                        'value' => date('d-m-Y H:i'),
                        'options' => ['placeholder' => 'Выберете дату ...'],
                        'pluginOptions' => [
                            'format' => 'dd-mm-yyyy h:i',
                            'todayHighlight' => true
                        ]
                    ]); ?>
                </td>
            </tr>
            <tr>
                <td>
                    Стоимость хранения:
                </td>
                <td>
                    <input type="text" name="price" class="form-control" placeholder="384 руб." disabled />
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button class="btn btn-primary modal-btn">Продлить хранение</button>
                </td>
            </tr>
        </table>
    </div>
</div>



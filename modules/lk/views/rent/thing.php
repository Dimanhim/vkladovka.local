<?php

/* @var $this yii\web\View */

use yii\web\View;
use yii\helpers\Url;

$this->title = 'Сдать в аренду "'.$model->name.'"';
?>
<?= $this->render('_payment', [
    'message' => 'Сдать в аренду "'.$model->name.'"'
]) ?>

<!-- ------------------Хлебные крошки -->
<ul class="bread-crumps">
    <li><a href="<?= Yii::$app->urlManager->createUrl(['site/index']) ?>">Главная</a></li>
    <li><a href="<?= Yii::$app->urlManager->createUrl(['lk']) ?>"> / Личный кабинет</a></li>
    <li><a href="<?= Yii::$app->urlManager->createUrl(['lk/rent']) ?>"> / Арендовать вещь</a></li>
    <li><a href="<?= Yii::$app->urlManager->createUrl(['lk/rent/to', 'id' => $model->categoryParent->id]) ?>"> / Категория <?= $model->categoryParent->name ?></a></li>
    <li> / Арендовать вещь "<?= $model->name ?>"</li>
</ul>
<!-- Хлебные крошки -->

<div class="col-md-12">
    <h2 class="tac">Арендовать "<?= $model->name ?>"</h2>
</div>

<div class="clearfix"></div>
<div class="col-md-12">
    <div>
        <a href="<?= Yii::$app->urlManager->createUrl(['lk']) ?>">Вернуться на склад</a>
    </div>
    <?php if($model->is_rent) : ?>
    <div class="thing-actions">
        <table class="table">
            <tr class="adress-textarea">
                <td>
                    Адрес доставки:<br />
                </td>
                <td>
                    <textarea name="" id="" cols="30" rows="4" class="form-control" placeholder=""></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    Заберу сам <input type="checkbox" name="" class="hide-textarea" />
                </td>
            </tr>
            <tr class="adress-textarea">
                <td>
                    Время доставки:<br />
                </td>
                <td>
                    <input class="form-control" />
                </td>
            </tr>
            <tr>
                <td>
                    На какой срок (в днях):<br />
                </td>
                <td>
                    <input class="form-control" placeholder="" />
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    Необходимо внести депозит <!--или <a href="#">застраховать вещь</a>-->
                </td>
            </tr>
            <tr>
                <td>
                    <input class="form-control" placeholder="сумма в рублях" />
                </td>
                <td>
                    Депозит
                </td>
            </tr>
            <tr>
                <td>
                    <input class="form-control" />
                </td>
                <td>
                    Аренда, включая доставку
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button class="btn btn-primary modal-btn">Арендовать вещь</button>
                </td>
            </tr>
        </table>
    </div>
    <?php else : ?>
        <div class="description-block">
            Вы не можете арендовать эту вещь, так как собственник запретил аренду
        </div>
    <?php endif; ?>
</div>




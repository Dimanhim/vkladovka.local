<?php

/* @var $this yii\web\View */

use yii\web\View;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

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
    <?php $form = ActiveForm::begin(['id' => 'form-rent-thing', 'fieldConfig' => ['options' => ['tag' => false]], 'options' => ['class' => 'thing-actions']]) ?>
        <table class="table">
            <tr class="adress-textarea">
                <td>
                    Адрес доставки:<br />
                </td>
                <td>
                    <?= $form->field($rent, 'address', ['template' => '{input}'])->textarea(['cols' => 30, 'rows' => 4, ]) ?>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <?= $form->field($rent, 'take_myself')->checkbox(['labelOptions' => ['style' => 'font-weight: normal']]) ?>
                    <!--<input type="checkbox" name="" class="hide-textarea" />-->
                </td>
            </tr>
            <tr class="adress-textarea">
                <td>
                    Время доставки:<br />
                </td>
                <td>
                    <?= $form->field($rent, 'delivery_time', ['template' => '{input}'])->textInput(['class' => 'form-control select-time']) ?>
                </td>
            </tr>
            <tr>
                <td>
                    На какой срок (в днях):<br />
                </td>
                <td>
                    <?= $form->field($rent, 'term', ['template' => '{input}'])->textInput() ?>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    Необходимо внести депозит <!--или <a href="#">застраховать вещь</a>-->
                </td>
            </tr>
            <tr>
                <td>
                    Депозит
                </td>
                <td>
                    <div class="td-desc" style="display: block;">
                        <?= $model->deposit ?> руб.
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    Аренда, включая доставку
                </td>
                <td>
                    <?= $form->field($rent, 'price', ['template' => '{input}'])->textInput(['readonly' => true, 'value' => $model->findRent->price, 'data-price' => $model->findRent->price]) ?>
                </td>
            </tr>
            <tr>
                <td>
                    Описание
                </td>
                <td colspan="2">
                    <div class="td-desc" style="display: block;">
                        <?= $thing_rent->description ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    Особые условия
                </td>
                <td colspan="2">
                    <div class="td-desc" style="display: block;">
                        <?= $thing_rent->special_conditions ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <?= Html::submitButton('Арендовать вещь', ['class' => "btn btn-primary modal-btn"]) ?>
                </td>
            </tr>
        </table>
    <?php ActiveForm::end() ?>
    <?php else : ?>
        <div class="description-block">
            Вы не можете арендовать эту вещь, так как собственник запретил аренду
        </div>
    <?php endif; ?>
</div>




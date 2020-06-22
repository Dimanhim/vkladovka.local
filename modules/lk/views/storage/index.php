<?php

/* @var $this yii\web\View */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\web\View;
use yii\helpers\Url;
use kartik\datetime\DateTimePicker;

$this->title = 'Заказать хранение';
?>
<?= $this->render('_payment', [
    'message' => 'Заказать хранение'
]) ?>
<?php print_r($_POST); ?>
<!-- -------------------Хлебные крошки -->
<ul class="bread-crumps">
    <li><a href="<?= Yii::$app->urlManager->createUrl(['site/index']) ?>">Главная</a></li>
    <li><a href="<?= Yii::$app->urlManager->createUrl(['lk']) ?>"> / Личный кабинет</a></li>
    <li> / Заказать хранение</li>
</ul>
<!-- Хлебные крошки -->

<div class="col-md-12">
    <h2 class="tac">Заказать хранение</h2>
</div>
<div class="clearfix"></div>
<div class="col-md-12">
    <div>
        <a href="<?= Yii::$app->urlManager->createUrl(['lk']) ?>">Вернуться на склад</a>
    </div>
    <div class="thing-actions">
        <table class="table">
            <?php $form = ActiveForm::begin(['id' => 'storage-form', 'fieldConfig' => ['options' => ['tag' => false]]]) ?>
            <?= $this->render('_item', ['item' => 0, 'cats' => $cats]) ?>

            <tr class="size">
                <td>
                    Добавить вещь <a href="#" class="add-thing"><span class="glyphicon glyphicon-plus"></span></a>
                </td>
                <td>
                </td>
            </tr>
            <tr>
                <td>
                    <?= $model->getAttributeLabel('date'); ?>
                </td>
                <td>
                    <?= $form->field($model, 'date', ['template' => '{input}'])->widget(DateTimePicker::classname(), [
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
            <tr class="size">
                <td>
                    <?= $model->getAttributeLabel('term'); ?>
                </td>
                <td>
                    <?= $form->field($model, 'term', ['template' => '{input}'])->textInput(['placeholder' => 'дней...']) ?>
                </td>
            </tr>
            <tr class="size">
                <td>
                    Примерная стоимость вывоза и  обратной доставки:
                </td>
                <td>
                    <!--<input type="text" class="form-control" placeholder="рублей" disabled />-->
                </td>
            </tr>
            <tr class="size">
                <td>
                    <?= $form->field($model, 'price_storage', ['template' => "{label}<br />{input}{error}"])->textInput(['class' => 'form-control size-item', 'value' => '1564']) ?>
                </td>
                <td>
                    <?= $form->field($model, 'price_total', ['template' => "{label}<br />{input}{error}"])->textInput(['class' => 'form-control size-item', 'value' => '2296']) ?>
                </td>
            </tr>
            <tr>
                <td>
                    Согласен
                    <?= $form->field($model, 'agree')->checkbox([
                            'template' => '{input}{error}'
                    ])?>
                </td>
                <td>
                    Оплата
                    <div>
                        <?= $form->field($model, 'payment_method')->radio([
                            'template' => '{input}'
                        ])?>
                         Картой
                    </div>
                    <div>
                        <?= $form->field($model, 'payment_method')->radio([
                            'template' => '{input}'
                        ])?>
                         Наличными или картой курьеру
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <?= Html::submitButton('Заказать хранение', ['class' => "btn btn-primary modal-btn storage-btn"]) ?>
                </td>
            </tr>
            <?php ActiveForm::end() ?>
        </table>
    </div>
</div>




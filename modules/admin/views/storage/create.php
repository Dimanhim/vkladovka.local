<?php

/* @var $this yii\web\View */

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\web\View;
use yii\helpers\Url;
use kartik\datetime\DateTimePicker;
use yii\helpers\ArrayHelper;
use app\models\User;

$this->title = 'Заказать хранение';
?>
<div class="clearfix"></div>
<div class="col-md-12">
    <div class="thing-actions">
        <?php $form = ActiveForm::begin(['id' => 'form-storage']) ?>
        <table class="table">
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
                    <?= $form->field($model, 'date', ['template' => '{input}'])->textInput(['placeholder' => 'Выберете дату ...', 'data-type' => 'date', 'class' => 'form-control date-picker']) ?>
            </tr>
            <tr class="size">
                <td>
                    <?= $model->getAttributeLabel('term'); ?>
                </td>
                <td>
                    <?= $form->field($model, 'term', ['template' => '{input}'])->textInput(['placeholder' => 'дней...', 'data-type' => 'term']) ?>
                </td>
            </tr>
            <tr class="size">
                <td>
                    Примерная стоимость вывоза и  обратной доставки:
                </td>
                <td>

                </td>
            </tr>
            <tr class="size">
                <td>
                    <?= $form->field($model, 'price_storage', ['template' => "{label}<br />{input}{error}"])->textInput(['class' => 'form-control size-item', 'readonly' => true]) ?>
                    <?= $form->field($model, 'price_pickup', ['template' => "{label}<br />{input}{error}"])->textInput(['class' => 'form-control size-item', 'readonly' => true]) ?>
                </td>
                <td>
                    <?= $form->field($model, 'price_total', ['template' => "{label}<br />{input}{error}"])->textInput(['class' => 'form-control size-item', 'readonly' => true]) ?>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <p style="margin-bottom: 10px;">Оплата</p>
                    <?= $form->field($model, 'payment_method')->radioList(
                        ['Картой', 'Наличными или картой курьеру'],
                        [
                            'item' => function ($index, $label, $name, $checked, $value) {
                                $id = 'my-'. $index;
                                return
                                    Html::beginTag('div') .
                                    Html::radio($name, $checked, ['value' => $value, 'id' => $id]) .
                                    Html::label($label, $id) .
                                    Html::endTag('div');
                            },
                        ]
                    )->label(false) ?>
                </td>
            </tr>
            <tr>
                <td>Пользователь</td>
                <td>
                    <?= $form->field($model, 'user_id', ['template' => "{input}{error}"])->dropDownList(ArrayHelper::map(User::find()->all(), 'id', 'fio'), ['prompt' => '--Выбрать--', 'required' => true]) ?>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <?= Html::submitButton('Заказать хранение', ['class' => "btn btn-primary modal-btn storage-btn"]) ?>
                </td>
            </tr>
        </table>
        <?php ActiveForm::end() ?>
    </div>
</div>
&nbsp;<br>
<style>
    .content-wrapper {
        background: #fff;
    }
</style>





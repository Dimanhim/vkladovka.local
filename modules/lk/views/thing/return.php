<?php

/* @var $this yii\web\View */

use yii\web\View;
use yii\helpers\Url;
use kartik\datetime\DateTimePicker;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

if(count($model) > 1) $many = true;
else $many = false;

if($many) $this->title = 'Вернуть '.count($model).' вещи(ей)';
else $this->title = 'Вернуть '.$model[0]->name;

$furniture = false;
foreach($model as $v) {
    if($v->cat == 8) {
        $furniture = true;
        break;
    }
}
$none_furniture = false;
foreach($model as $v) {
    if($v->cat != 8) {
        $none_furniture = true;
        break;
    }
}

?>
<!-- --------------------------Хлебные крошки -->
<ul class="bread-crumps">
    <li><a href="<?= Yii::$app->urlManager->createUrl(['site/index']) ?>">Главная</a></li>
    <li><a href="<?= Yii::$app->urlManager->createUrl(['lk']) ?>"> / Личный кабинет</a></li>
    <?php if($many) : ?>
        <li> / Вернуть <?= count($model) ?> вещи(ей)</li>
    <?php else : ?>
        <li> / Вернуть <?= $model[0]->name ?></li>
    <?php endif; ?>

</ul>
<!-- Хлебные крошки -->

<div class="col-md-12">
    <?php if($many) : ?>
        <h2 class="tac">Вернуть <?= count($model) ?> вещи(ей)</h2>
    <?php else : ?>
        <h2 class="tac">Вернуть <?= $model[0]->name ?></h2>
    <?php endif; ?>
</div>

<div class="clearfix"></div>
<div class="col-md-12">
    <div>
        <a href="<?= Yii::$app->urlManager->createUrl(['lk']) ?>">Вернуться на склад</a>
    </div>


    <?php $form = ActiveForm::begin(['id' => 'form-return-thing', 'options' => ['class' => 'thing-actions']]) ?>
        <table class="table">
            <tr>
                <td>
                    Название:
                </td>
                <td>
                    <?php foreach($model as $v) : ?>
                    <a href="<?= Yii::$app->urlManager->createUrl(['lk/thing', 'id' => $v->id]) ?>" class="thing-item-link" data-thing-item="<?= $v->id ?>"><?= $v->name ?><?= $v->id ?></a><br />
                    <?= $form->field($model_form, "things_ids[]", ['template' => '{input}'])->hiddenInput(['value' => $v->id]) ?>
                    <?php endforeach; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Фото:
                </td>
                <td class="thing-photo">
                    <?php foreach($model as $v) : ?>
                    <a href="<?= Yii::$app->urlManager->createUrl(['lk/thing', 'id' => $v->id]) ?>" class="thing-item-img" data-thing-item="<?= $v->id ?>">
                        <img src="<?= Yii::getAlias('@thing').'/'.$v->img ?>" alt="" />
                    </a>,
                    <?php endforeach; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Вернуть в течение*:
                </td>
                <td>
                    <?= $form->field($model_form, 'return_value', ['template' => '{input}'])->dropDownList($model_form->returnValuesArray, ['prompt' => '--Выбрать--', 'id' => 'select-date', 'required' => true]) ?>
                    <p style="font-style: italic">Время доставки ежедневно с 8 до 20ч. За рамками это времени тариф+50%.</p>
                </td>
            </tr>
            <tr class="return-tr">
                <td colspan="4">
                    <div class="description-block">
                        Стоимость возврата "в другой день" расчитывается индивидуально.<br />
                        Для точного расчета стоимости свяжитесь с Вашим менеджером <br />
                        <a href="#" class="btn btn-success call-to-operator">Заказать обратный звонок</a>
                    </div>
                </td>
            </tr>
            <tr class="select-date">
                <td>
                    Вернуть в течение:
                </td>
                <td>
                    <?= $form->field($model_form, 'return_time', ['template' => '{input}'])->widget(DateTimePicker::className(), [
                        'name' => 'check_issue_date',
                        'value' => date('d-m-Y H:i'),
                        'options' => ['placeholder' => 'Выберете дату ...'],
                        'pluginOptions' => [
                            'format' => 'dd-mm-yyyy h:i',
                            'todayHighlight' => true
                        ]
                    ]) ?>
                </td>
            </tr>
            <tr class="select-date">
                <td colspan="2">
                    <a href="#" class="tariffs-return">Посмотреть тарифы по срочной доставке</a>
                </td>
            </tr>
            <tr>
                <td>
                    По адресу*:
                </td>
                <td>
                    <?= $form->field($model_form, 'address', ['template' => "{input}"])->textarea(['cols' => 30, 'rows' => 4, 'required' => true]) ?>
                </td>
            </tr>
            <?php if($none_furniture) : ?>
            <tr>
                <td>
                    Цена за срочную доставку: <span class="danger-span"></span>
                </td>
                <td>
                    <?= $form->field($model_form, 'price', ['template' => '{input}'])->textInput(['placeholder' => 'Выберете в течение какого срока вернуть', 'id' => 'return-price', 'readonly' => true]) ?>
                </td>
            </tr>
            <?php endif; ?>
            <?php if($furniture) : ?>
            <tr>
                <td colspan="4">
                    <div class="description-block">
                        Стоимость срочного возврата мебельной продукции расчитывается индивидуально.<br />
                        Для точного расчета стоимости свяжитесь с Вашим менеджером <br />
                        <a href="#" class="btn btn-success call-to-operator">Заказать обратный звонок</a>
                    </div>
                </td>
            </tr>
            <?php endif; ?>
            <tr>
                <td colspan="2">
                    <?= Html::submitButton('Вернуть вещь', ['class' => "btn btn-primary"]) ?>
                </td>
            </tr>
        </table>
    <?php ActiveForm::end() ?>
</div>


<?php

/* @var $this yii\web\View */

use yii\web\View;
use yii\helpers\Url;
use kartik\datetime\DateTimePicker;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = $model->typeName.' - '.$model->name;

?>
<?=
$this->render('_payment', [
    'message' => 'Купить "'.$model->name.'"',
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
            <img src="<?= Yii::getAlias('@package_view').'/'.$model->img ?>" alt="" />
        </div>
    </div>
    <div class="thing-actions">
        <table class="table">
            <tr>
                <td>
                    <span id="package-name"><?= $model->name ?></span>
                </td>
                <td colspan="3">
                    <span id="package-size"><?= $model->size ?></span>
                </td>
            </tr>
            <?php if($model->isRent) : ?>
            <tr>
                <td>
                    <a href="#" class="modal-btn modal-package-order" data-message="Взять в аренду" data-type="1">Взять в аренду</a>
                </td>
                <td>
                    <span id="package-price-rent"><?= $model->price_rent ?></span> руб./в день
                </td>
                <td>
                    <div class="select-quan">
                        <a href="#" class="btn-plus"><span class="glyphicon glyphicon-plus"></span></a>
                        <input id="package-count-rent" type="text" class="quan-input" value="0" />
                        <a href="#" class="btn-minus"><span class="glyphicon glyphicon-minus"></span></a>
                    </div>
                </td>
                <td>
                    при хранении в «Вкладовка»  предоставляется подарок
                </td>
            </tr>
            <?php endif; ?>
            <?php if(!$model->isRent) : ?>
            <tr>
                <td colspan="4">
                    <span class="warning">В аренду не сдается</span>
                </td>
            </tr>
            <?php endif; ?>
            <tr>
                <td>
                    <a href="#" class="modal-btn modal-package-order" data-message="Купить" data-type="2">Купить</a>
                </td>
                <td>
                    <span id="package-price-sale"><?= $model->price_sale ?></span> руб.
                </td>
                <td colspan="2">
                    <div class="select-quan">
                        <a href="#" class="btn-plus"><span class="glyphicon glyphicon-plus"></span></a>
                        <input id="package-count-sale" type="text" class="quan-input" value="0" />
                        <a href="#" class="btn-minus"><span class="glyphicon glyphicon-minus"></span></a>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="#" class="modal-btn modal-package-order" data-message="Заказать доставку">Доставка</a>
                </td>
                <td colspan="2">
                    <span id="package-price-delivery"><?= $model->price_delivery ?></span> руб.
                </td>
                <td>
                    Для бесплатной доставки сумма заказа не менее 1000руб?
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <div class="description-block">
                        При аренде тара принимается обратно чистая и  в целостном виде
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <div class="description-block">
                        При хранении в "Вкладовка" аренда тары предоставляется бесплатно
                    </div>
                </td>
            </tr>
        </table>
    </div>
</div>
<div class="modal fade" id="package-order" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="full-message"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php $form = ActiveForm::begin(['id' => 'form-package-order', 'fieldConfig' => ['options' => ['tag' => false]]]) ?>
                <table class="table table-striped">
                    <?php if(Yii::$app->user->isGuest) : ?>
                    <tr>
                        <td>
                            Номер телефона
                        </td>
                        <td>
                            <?= $form->field($order, 'phone', ['template' => '{input}{error}'])->textInput(['placeholder' => "Телефон", 'class' => 'form-control phone']) ?>
                        </td>
                    </tr>
                    <?php endif; ?>
                    <tr>
                        <td>
                            Количество
                        </td>
                        <td>
                            <div class="select-quan">
                                <a href="#" class="btn-plus"><span class="glyphicon glyphicon-plus"></span></a>
                                <?= $form->field($order, 'qty', ['template' => '{input}'])->textInput(['class' => 'quan-input', 'value' => 0]) ?>
                                <a href="#" class="btn-minus"><span class="glyphicon glyphicon-minus"></span></a>
                            </div>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            Итоговая цена
                        </td>
                        <td>
                            <?= $form->field($order, 'total_price', ['template' => '{input}'])->textInput(['readOnly' => true, 'data-rent' => 0, 'data-sale' => 0]) ?>
                        </td>
                    </tr>
                </table>
                <?= $form->field($order, 'package_id', ['template' => '{input}'])->hiddenInput(['value' => $model->id]) ?>
                <?= $form->field($order, 'type', ['template' => '{input}'])->hiddenInput() ?>
                <?= Html::submitButton('Заказать', ['class' => "btn btn-success"]) ?>
                <?php ActiveForm::end() ?>
            </div>
        </div>
    </div>
</div>












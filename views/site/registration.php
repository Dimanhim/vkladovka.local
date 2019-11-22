<?php

/* @var $this yii\web\View */

use yii\web\View;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Регистрация';
?>
<div class="container page-reg page-two">
    <h2>Регистрация</h2>
    <ul>
        <li><a href="#" class="fb-link"><i class="fab fa-facebook-f"></i></a></li>
        <li><a href="#" class="ok-link"><i class="fab fa-odnoklassniki"></i></a></li>
        <li><a href="#" class="tw-link"><i class="fab fa-twitter"></i></a></li>
        <li><a href="#" class="vk-link"><i class="fab fa-vk"></i></a></li>
    </ul>
    <?php $form = ActiveForm::begin(['fieldConfig' => ['options' => ['tag' => false]], 'options' => ['class' => 'form-reg']]) ?>
    <?= $form->field($model, 'fio')->textInput(["required" => true]) ?>
    <?= $form->field($model, 'passport')->textarea(['placeholder' => "Паспорт серия номер, кем и когда выдан", "required" => true]) ?>
    <?= $form->field($model, 'address')->textarea(['placeholder' => "ОБЛАСТЬ (КРАЙ), г. ГОРОД, ул. УЛИЦА, 111", "required" => true]) ?>
    <?= $form->field($model, 'phone')->textInput(['placeholder' => "+7(999)999-9999", 'class' => 'form-control phone', "required" => true]) ?>
    <?= $form->field($model, 'email')->textInput(['placeholder' => "mail@mail.ru", "required" => true]) ?>
    <?= $form->field($model, 'password')->passwordInput(['placeholder' => "********", "required" => true]) ?>
    <?= $form->field($model, 'password_2')->passwordInput(['placeholder' => "********", "required" => true]) ?>
    <a href="#" data-toggle="modal" data-target="#infoLn1" class="quest">В каких случаях можно не указывать свои личные данные-Фамилию и паспортные данные</a>
    <div class="check-form">
        <label for="n50"><input type="checkbox" id="n50" class="form-control" checked> Согласен и ознакомлен с <a href="#" class="quest">пользовательским соглашением</a></label>
    </div>
    <div class="check-form">
        <label for="n51"><input type="checkbox" id="n51" class="form-control" checked> <a href="#" class="quest">Согласен на обработку персональных данных</a></label>
    </div>
    <?= Html::submitButton('Зарегистрироваться', ['class' => "btn main-bt"]) ?>
    <?php ActiveForm::end() ?>
</div>

<!-- Modal Login -->
<div class="modal fade" id="infoLn1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Подробная информация</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                При заказе покупки тары и упаковки. В остальных случаях, для полноценного пользования всеми возможностями сайта данные необходимы, поскольку будут заключаться онлайн- договора и проводиться денежные операции.
            </div>
        </div>
    </div>
</div>
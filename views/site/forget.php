<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use app\models\LoginForm;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\User;
use yii\web\View;

$this->title = 'Восстановление пароля';
?>
<div class="site-login">
    <div class="container">
        <h1><?= Html::encode($this->title) ?></h1>
        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'layout' => 'horizontal',
            'fieldConfig' => [
                'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                'labelOptions' => ['class' => 'col-lg-1 control-label'],
            ],
        ]); ?>

        <?= $form->field($model, 'email')->textInput(['autofocus' => true, 'placeholder' => 'Введите свой E-mail']) ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= $form->field($model, 'password_2')->passwordInput() ?>

        <div class="form-group">
            <div class="col-lg-12">
                <?= Html::submitButton('Изменить пароль', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-12">
                <a href="<?= Yii::$app->urlManager->createUrl('site/registration') ?>">Регистрация</a>
            </div>
        </div>

        <?php ActiveForm::end(); ?>



    </div>

</div>


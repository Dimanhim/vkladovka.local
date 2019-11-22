<?php 
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use yii\helpers\Url;
?>
    <h1>Войдите в систему</h1>
    <?php $form = \yii\widgets\ActiveForm::begin()?>
    <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>
    <?= $form->field($model, 'password')->passwordInput() ?>
    <?= $form->field($model, 'rememberMe')->checkbox([
        'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
    ]) ?>
    <div class="form-group">
        <div class="col-lg-5">
            <?= Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>
        <div class="col-lg-4">
            <a href="<?= Yii::$app->urlManager->createUrl('site/forget') ?>">Забыли пароль?</a>
        </div>
        <div class="col-lg-3">
            <a href="<?= Yii::$app->urlManager->createUrl('site/registration') ?>">Регистрация</a>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

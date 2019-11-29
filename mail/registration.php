<?php
use yii\helpers\Html;

/* @var $this \yii\web\View view component instance */
/* @var $message \yii\mail\MessageInterface the message being composed */
/* @var $content string main view render result */
?>
<?php $this->beginPage() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=<?= Yii::$app->charset ?>" />
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<h2>Уважаемый(ая), <?= $name ?></h2>
<h3>Поздравляем! Вы успешно зарегистрировались на сайте <b>вКладовка</b>!</h3>
<p></p>
<p>Ваши данные для входа в систему:</p>
<p>E-mail - <?= $email ?></p>
<p>Пароль - <?= $password ?></p>
<p></p>
<p></p>
<p>Пожалуйста, сохраните данное письмо, чтобы данные для входа не потерялись!</p>
<p>С уважением!</p>
<p>Команда "вКладовка"!</p>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>


<?php

/* @var $this yii\web\View */

use yii\web\View;
use yii\helpers\Url;
$this->title = $user->fio;
?>


<!-- -------------------------Хлебные крошки -->
<ul class="bread-crumps">
    <li><a href="<?= Yii::$app->urlManager->createUrl(['site/index']) ?>">Главная</a></li>
    <li><a href="<?= Yii::$app->urlManager->createUrl(['lk/index']) ?>"> / Личный кабинет</a></li>
    <li> / Профиль пользователя "<?= $user->fio ?>"</li>
</ul>
<!-- Хлебные крошки -->

<div class="col-md-12">
    <h2 class="tac">Профиль пользователя - <?= $user->fio ?></h2>
    <table class="table">
        <tr>
            <td>Фамилия, имя, отчество</td>
            <td><?= $user->fio ?></td>
        </tr>
        <tr>
            <td>Паспорт</td>
            <td><?= $user->passport ?></td>
        </tr>
        <tr>
            <td>Проживание (по паспорту)</td>
            <td><?= $user->address ?></td>
        </tr>
        <tr>
            <td>Номер телефона</td>
            <td><?= $user->phone ?></td>
        </tr>
        <tr>
            <td>Адрес электронной почты</td>
            <td><?= $user->email ?></td>
        </tr>
        <tr>
            <td colspan="2"><a href="<?= Yii::$app->urlManager->createUrl(['lk/profile/edit']) ?>" class="btn btn-success">Редактировать</a></td>
        </tr>
    </table>
</div>

<div class="clearfix"></div>
<div class="col-md-12">

</div>




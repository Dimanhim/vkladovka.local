<?php

/* @var $this yii\web\View */

use yii\web\View;

$this->title = $model->fio;
?>
<div class="admin-default-index">
    <div class="admin-block">
        <a href="<?= Yii::$app->urlManager->createUrl(['admin/users']) ?>">>>Вернуться к списку пользователей>></a>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <tr class="info">
                        <td>ФИО</td>
                        <td><?= $model->fio ?></td>
                    </tr>
                    <tr class="info">
                        <td>Паспорт</td>
                        <td><?= $model->passport ?></td>
                    </tr>
                    <tr class="info">
                        <td>Номер телефона</td>
                        <td><?= $model->phone ?></td>
                    </tr>
                    <tr class="info">
                        <td>E-mail</td>
                        <td><?= $model->email ?></td>
                    </tr>
                    <tr class="info">
                        <td>Адрес</td>
                        <td><?= $model->address ?></td>
                    </tr>
                    <tr class="info">
                        <td>Адрес</td>
                        <td><?= ($model->role == 'admin') ? 'Администратор' : 'Пользователь' ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>


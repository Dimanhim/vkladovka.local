<?php

/* @var $this yii\web\View */

use yii\web\View;

$this->title = 'Пользователи';
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <tr class="info">
                    <th>ФИО</th>
                    <th>E-mail</th>
                    <th>Телефон</th>
                    <th>Права</th>
                </tr>
                <?php foreach ($model as $v) : ?>
                    <tr class="info">
                        <td>
                            <a href="<?= Yii::$app->urlManager->createUrl(['admin/users/view', 'id' => $v->id]) ?>"><?= $v->fio ?></a>
                        </td>
                        <td><?= $v->email ?></td>
                        <td><?= $v->phone ?></td>
                        <td><?= ($v->role == 'admin') ? 'Администратор' : 'Пользователь' ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>



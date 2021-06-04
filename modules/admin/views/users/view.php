<?php

/* @var $this yii\web\View */

use yii\web\View;
use app\models\User;

$this->title = $model->fio;
?>
<div class="admin-default-index">
    <div class="admin-block">
        <a href="<?= Yii::$app->urlManager->createUrl(['admin/users']) ?>">>>Вернуться к списку пользователей>></a>
    </div>
    <div class="container">
        <p class="balance">
            Баланс: <span>252 руб.</span>
        </p>
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
                        <td>Роль</td>
                        <td><?= ($model->role == 'admin') ? 'Администратор' : 'Пользователь' ?></td>
                    </tr>
                    <tr class="info">
                        <td>QR код</td>
                        <td>
                            <?php if($qr_code = User::qrCode()) : ?>
                                <img src="<?= $qr_code ?>" alt="">
                            <?php endif; ?>
                        </td>
                    </tr>

                </table>
            </div>
        </div>
    </div>
    <div class="container">
        <ul class="user-items">
            <li>
                <a href="#" class="btn btn-default show-item" data-type="things">
                    <span>Показать</span> вещи
                </a>
                <a href="#" class="btn btn-default show-item" data-type="reviews">
                    <span>Показать</span> отзывы
                </a>
            </li>
        </ul>
    </div>
    <?= $this->render('_info', ['things' => $things, 'reviews' => $reviews]) ?>
</div>


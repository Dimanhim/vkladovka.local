<?php

/* @var $this yii\web\View */

use yii\web\View;
use yii\helpers\Html;

$this->title = $model->name;
?>
<div class="admin-default-index">
    <div class="admin-block">
        <a href="<?= Yii::$app->urlManager->createUrl(['admin/thing']) ?>">>>Вернуться к списку вещей>></a>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="item-img">
                    <img src="<?= Yii::getAlias('@thing').'/'.$model->img ?>" alt=""/>
                </div>
            </div>
            <div class="col-md-12">
                <table class="table">
                    <tr class="info">
                        <td>Название</td>
                        <td><?= $model->name ?></td>
                    </tr>
                    <tr class="info">
                        <td>Штрих-код</td>
                        <td><?= $model->barcode ?></td>
                    </tr>
                    <tr class="info">
                        <td>Описание</td>
                        <td><?= $model->description ?></td>
                    </tr>
                    <tr class="info">
                        <td>Категория</td>
                        <td><?= $model->category->name ?></td>
                    </tr>
                    <tr class="info">
                        <td>Подкатегория</td>
                        <td><?= $model->categoryParent->name ?></td>
                    </tr>
                    <tr class="info">
                        <td>Пользователь</td>
                        <td><?= $model->users->fio ?></td>
                    </tr>
                    <tr class="info">
                        <td>QR код</td>
                        <td>
                            <a href="<?= $model->getQrCode(true) ?>" download>
                                <?= $model->qr_code ? Html::img($model->getQrCode(true), ['alt' => 'sdf'])  : '' ?>
                            </a>
                        </td>
                    </tr>
                    <tr class="info">
                        <td><?= $model->attributeLabels()['is_rent'] ?></td>
                        <td>
                            <a href="<?= $model->getQrCode(true) ?>" download>
                                <?= $model->is_rent ? 'Да' : 'Нет' ?>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <a href="<?= Yii::$app->urlManager->createUrl(['admin/thing/edit', 'id' => $model->id]) ?>" class="btn btn-success">Редактировать</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>


</div>


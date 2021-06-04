<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\web\View;

$this->title = 'Список вещей';
?>
<div class="container-fluid admin-block">
    <a href="<?= Yii::$app->urlManager->createUrl(['admin/thing/add']) ?>" class="btn btn-success">Добавить вещь</a>
</div>
<div class="container">
    <div class="row">
        <?php $count = 0 ?>
        <?php foreach($model as $v) { ?>
            <div class="col-md-3">
                <div class="item">
                    <div class="item-img">
                        <?php $alias = Yii::getAlias('@thing').'/'.$v->img ?>
                        <div class="block-item-img" style="background-image: url(<?= $alias ?>)">

                        </div>
                        <div class="back">
                            <ul>
                                <li><a href="<?= Yii::$app->urlManager->createUrl(['admin/thing/view', 'id' => $v->id]) ?>">Просмотр</a></li>
                                <li><a href="<?= Yii::$app->urlManager->createUrl(['admin/thing/edit', 'id' => $v->id]) ?>">Редактировать</a></li>
                                <li><a href="<?= $v->getQrCode(true) ?>" download="" target="_blank">Распечатать QR-код</a></li>
                                <li><a href="<?= Yii::$app->urlManager->createUrl(['admin/thing/delete', 'id' => $v->id]) ?>" class="link-delete">Удалить</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="item-desc">
                        <a href="<?= Yii::$app->urlManager->createUrl(['admin/thing/view', 'id' => $v->id]) ?>"><?= $v->name ?></a>
                    </div>
                </div>
            </div>
            <?php $count++ ?>
            <?php if($count%4 == 0) :?>
            <div class="clearfix"></div>
            <?php endif; ?>
        <?php } ?>
    </div>
</div>



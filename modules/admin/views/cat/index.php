<?php

/* @var $this yii\web\View */

use yii\web\View;

$this->title = 'Категории вещей';
?>
<div class="container-fluid admin-block">
    <a href="<?= Yii::$app->urlManager->createUrl(['admin/cat/add']) ?>" class="btn btn-success">Добавить категорию</a>
</div>
<div class="container">
    <div class="row">
        <?php $count = 0 ?>
        <?php foreach($model as $v) { ?>
            <div class="col-md-3">
                <div class="item">
                    <div class="item-img">
                        <?php $alias = Yii::getAlias('@cat').'/'.$v->img ?>
                        <div class="block-item-img" style="background-image: url(<?= $alias ?>)">

                        </div>
                        <div class="back">
                            <ul>
                                <li><a href="<?= Yii::$app->urlManager->createUrl(['admin/cat/inner', 'id' => $v->id]) ?>">Просмотр подкатегорий</a></li>
                                <li><a href="<?= Yii::$app->urlManager->createUrl(['admin/cat/view', 'id' => $v->id]) ?>">Просмотр</a></li>
                                <li><a href="<?= Yii::$app->urlManager->createUrl(['admin/cat/edit', 'id' => $v->id]) ?>">Редактировать</a></li>
                                <li><a href="<?= Yii::$app->urlManager->createUrl(['admin/cat/delete', 'id' => $v->id]) ?>" class="link-delete">Удалить</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="item-desc">
                        <a href="<?= Yii::$app->urlManager->createUrl(['admin/cat/inner', 'id' => $v->id]) ?>"><?= $v->name ?></a>
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



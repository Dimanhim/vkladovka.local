<?php

/* @var $this yii\web\View */

use yii\web\View;

$this->title = 'Подкатегории вещей';
?>
<div class="container-fluid admin-block">
    <a href="<?= Yii::$app->urlManager->createUrl(['admin/cat/add', 'parent' => $parent]) ?>" class="btn btn-success">Добавить подкатегорию</a>
</div>
<div class="container">
    <a href="<?= Yii::$app->urlManager->createUrl(['admin/cat/index']) ?>" class="btn btn-default" style="margin: 10px 0;">Назад к списку категорий</a>
    <div class="row">

        <?php $count = 0 ?>
        <?php if($model) : ?>
        <?php foreach($model as $v) { ?>
            <div class="col-md-3">
                <div class="item">
                    <div class="item-img">
                        <?php $alias = Yii::getAlias('@cat').'/'.$v->img ?>
                        <div class="block-item-img" style="background-image: url(<?= $alias ?>)">

                        </div>
                        <div class="back">
                            <ul>
                                <li><a href="<?= Yii::$app->urlManager->createUrl(['admin/cat/things', 'id' => $v->id]) ?>">Вещи категории</a></li>
                                <li><a href="<?= Yii::$app->urlManager->createUrl(['admin/cat/view', 'id' => $v->id]) ?>">Просмотр</a></li>
                                <li><a href="<?= Yii::$app->urlManager->createUrl(['admin/cat/edit', 'id' => $v->id]) ?>">Редактировать</a></li>
                                <li><a href="<?= Yii::$app->urlManager->createUrl(['admin/cat/delete', 'id' => $v->id]) ?>" class="link-delete">Удалить</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="item-desc">
                        <a href="<?= Yii::$app->urlManager->createUrl(['admin/cat/view', 'id' => $v->id]) ?>"><?= $v->name ?></a>
                    </div>
                </div>
            </div>
            <?php $count++ ?>
            <?php if($count%4 == 0) :?>
                <div class="clearfix"></div>
            <?php endif; ?>
        <?php } ?>
        <?php else : ?>
            <div class="col-md-12">
                В данной категории подкатегорий нет
            </div>
        <?php endif; ?>
    </div>
</div>




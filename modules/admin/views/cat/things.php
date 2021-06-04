<?php

/* @var $this yii\web\View */

use yii\web\View;

$this->title = 'Вещи категории '.$cat->name;
?>
<div class="container">
    <a href="<?= Yii::$app->urlManager->createUrl(['admin/cat/inner', 'id' => $cat->parent_id]) ?>" class="btn btn-default" style="margin: 10px 0;">Назад в подкатегорию</a>
    <div class="row">

        <?php $count = 0 ?>
        <?php if($model) : ?>
            <?php foreach($model as $v) { ?>
                <div class="col-md-3">
                    <div class="item">
                        <div class="item-img">
                            <?php $alias = Yii::getAlias('@thing').'/'.$v->img ?>
                            <div class="block-item-img" style="background-image: url(<?= $alias ?>)">

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
        <?php else : ?>
            <div class="col-md-12">
                В данной категории вещей нет
            </div>
        <?php endif; ?>
    </div>
</div>





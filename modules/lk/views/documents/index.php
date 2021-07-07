<?php

use yii\helpers\Html;

$this->title = 'Документы';
?>
<h1><?= Html::encode($this->title) ?></h1>
<div class="clearfix"></div>
<ul>
    <?php if($items) : ?>
        <?php foreach($items as $k => $v) : ?>
            <?php if($v['things']) : ?>
                <li>
                    <a href="<?= Yii::$app->urlManager->createUrl(['lk/documents/agreement-storage', 'id' => $k]) ?>">
                        Договор хранения вещей
                        <?php foreach($v['things'] as $thing) : ?>
                            "<b><?= $thing->name ?></b>"
                        <?php endforeach; ?>
                    </a>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php else : ?>
        <li>Документов для скачивания не найдено</li>
    <?php endif; ?>
</ul>
<style>
    .col-lg-9 {
        -ms-flex: 0;
        flex: 0;
    }
    .row {
        display: block;
    }
</style>
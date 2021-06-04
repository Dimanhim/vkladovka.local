<?php

use yii\helpers\Html;

$this->title = 'Документы';
?>
<h1><?= Html::encode($this->title) ?></h1>
<div class="clearfix"></div>
<ul>
    <?php if($things) : ?>
        <?php foreach($things as $thing) : ?>
            <li>
                <a href="<?= Yii::$app->urlManager->createUrl(['lk/documents/agreement-storage', 'id' => $thing->id]) ?>">Договор хранения вещи "<?= $thing->name ?>"</a>
            </li>
        <?php endforeach; ?>
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
<?php

/* @var $this yii\web\View */

use yii\web\View;

$this->title = 'Добавить категорию';
?>
<div class="admin-default-index">
    <div class="admin-block">
        <a href="<?= Yii::$app->urlManager->createUrl(['admin/cat']) ?>">>>Вернуться к списку категорий>></a>
    </div>

    <?= $this->render('_form', ['model' => $model]) ?>
</div>


<?php

/* @var $this yii\web\View */

use yii\web\View;

$this->title = 'Добавить вещь';
?>
<div class="admin-default-index">
    <div class="admin-block">
        <a href="<?= Yii::$app->urlManager->createUrl(['admin/thing']) ?>">>>Вернуться к списку вещей>></a>
    </div>

    <?= $this->render('_form', ['model' => $model, 'cats' => $cats, 'users' => $users]) ?>
</div>


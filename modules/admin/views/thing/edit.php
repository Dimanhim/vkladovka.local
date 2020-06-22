<?php

/* @var $this yii\web\View */

use yii\web\View;

$this->title = 'Редактирование вещи';
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
        </div>
    </div>

    <?= $this->render('_form', ['model' => $model, 'cats' => $cats, 'users' => $users]) ?>
</div>

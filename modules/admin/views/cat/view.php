<?php

/* @var $this yii\web\View */

use yii\web\View;

$this->title = $model->name;
?>
<div class="admin-default-index">
    <div class="admin-block">
        <a href="<?= Yii::$app->urlManager->createUrl(['admin/cat']) ?>">>>Вернуться к списку категорий>></a>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="item-img">
                    <img src="<?= Yii::getAlias('@cat').'/'.$model->img ?>" alt=""/>
                </div>
            </div>
            <div class="col-md-12">
                <table class="table">
                    <tr class="info">
                        <td>Название</td>
                        <td><?= $model->name ?></td>
                    </tr>
                    <tr class="info">
                        <td>Описание</td>
                        <td><?= $model->description ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <a href="<?= Yii::$app->urlManager->createUrl(['admin/cat/edit', 'id' => $model->id]) ?>" class="btn btn-success">Редактировать</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>


</div>


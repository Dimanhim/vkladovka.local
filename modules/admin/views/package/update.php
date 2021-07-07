<?php

/* @var $this yii\web\View */
/* @var $page common\models\Page */
/* @var $model object */

$this->title = 'Редактирование тары: ' . $model->name;
?>

<div class="page-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>

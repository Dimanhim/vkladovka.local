<?php

use yii\helpers\Html;

$this->title = 'Добавление тары';
?>

<div class="page-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>

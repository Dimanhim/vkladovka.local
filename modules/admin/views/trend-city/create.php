<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $page common\models\Page */
/* @var $model object */

$this->title = 'Добавление города';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="page-create">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>

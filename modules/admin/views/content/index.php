<?php

use yii\helpers\Html;

$this->title = 'Контент страниц';
?>
<div class="row">
    <div class="col-md-3">
        <div class="content-block">
            <a href="<?= Yii::$app->urlManager->createUrl(['admin/trend-city']) ?>" class="btn btn-default">Тенденции в аренде</a>
        </div>
    </div>
    <div class="col-md-3"></div>
    <div class="col-md-3"></div>
    <div class="col-md-3"></div>
</div>



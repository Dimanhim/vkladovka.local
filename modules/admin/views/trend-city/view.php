<?php

use himiklab\thumbnail\EasyThumbnailImage;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Page */

$this->title = $model->city;
?>

<div class="page-view">
    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'city',
        ],
    ]) ?>
    <?php if (count($model->images)): ?>
        <ul id="sortable_photoes" class="photo-list" data-url="<?= Url::to(['sort-images']) ?>">
            <?php foreach ($model->images as $image): ?>
                <li data-id="<?= $image->id ?>" data-path="<?= $image->link ?>">
                    <?= EasyThumbnailImage::thumbnailImg(Yii::getAlias('@trend').'/'.$model->city.'/'.$image->link, 160, 160, EasyThumbnailImage::THUMBNAIL_OUTBOUND) ?>
               </li>
            <?php endforeach ?>
        </ul>
    <?php endif ?>
</div>

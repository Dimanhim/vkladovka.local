<?php

/* @var $this yii\web\View */

use yii\web\View;
use yii\helpers\Url;
use yii\widgets\DetailView;
$this->title = 'Отзыв пользователя '.$model->user->fio;
?>

<div class="col-md-12">
    <?php if($model->user->img) : ?>
        <div class="avatar">
            <img src="<?= Yii::getAlias('@user').'/'.$model->user->img ?>" alt="">
        </div>
    <?php endif; ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'user_id',
                'value' => function($data) {
                    return $data->user->fio;
                }
            ],
            'preview',
            'content',
            [
                'attribute' => 'created_at',
                'value' => function($data) {
                    return date('d.m.Y H:i', $data->created_at);
                }
            ],
        ],
    ]) ?>
</div>

<div class="clearfix"></div>
<div class="col-md-12">

</div>





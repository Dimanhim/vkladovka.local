<?php

use app\components\Functions;
use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = 'Заказ на взятие в аренду';

?>
<div class="container">
    <div class="row">
        <a href="<?= Yii::$app->urlManager->createUrl(['admin/rent-thing/index']) ?>" class="btn btn-primary">Вернуться назад</a>
        <?=
        DetailView::widget([
            'model' => $model,
            'attributes' => [
                [
                    'attribute' => 'user_id',
                    'format' => 'raw',
                    'value' => function($data) {
                        return $data->user ? Html::a($data->user->fio, Yii::$app->urlManager->createUrl(['admin/users/view', 'id' => $data->user->id]))  : '---';
                    },
                    //'options' => ['class' => 'warning-item'],
                ],
                [
                    'attribute' => 'thing_id',
                    'value' => function($data) {
                        return $data->thing ? $data->thing->name : '---';
                    }
                ],
                [
                    'attribute' => 'take_myself',
                    'value' => function($data) {
                        return $data->take_myself ? 'Да' : 'Нет';
                    }
                ],
                'price',
                'delivery_time',
                'term',
                [
                    'attribute' => 'created_at',
                    'value' => function($data) {
                        return $data->created_at ? date('d.m.Y H:i', $data->created_at) : '---';
                    }
                ],
            ],
        ]);
        ?>
    </div>
</div>


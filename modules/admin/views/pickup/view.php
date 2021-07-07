<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = 'Заказ на грузоперевозку';

?>
<div class="container">
    <div class="row">
        <a href="<?= Yii::$app->urlManager->createUrl(['admin/pickup/index']) ?>" class="btn btn-primary">Вернуться назад</a>
        <?=
        DetailView::widget([
            'model' => $model,
            'attributes' => [
                [
                    'attribute' => 'user_id',
                    'format' => 'raw',
                    'value' => function($data) {
                        return $data->user ? Html::a($data->user->fio, Yii::$app->urlManager->createUrl(['admin/users/view', 'id' => $data->user->id]))  : '---';
                    }
                ],
                'phone',
                'email',
                'description',
                'address',
                [
                    'attribute' => 'movers',
                    'value' => function($data) {
                        return $data->movers ? 'Да' : 'Нет';
                    }
                ],
                [
                    'attribute' => 'lift',
                    'value' => function($data) {
                        return $data->lift ? 'Да' : 'Нет';
                    }
                ],
                [
                    'attribute' => 'date_time',
                    'value' => function($data) {
                        return date('d.m.Y H:i', $data->date_time);
                    }
                ],
                [
                    'attribute' => 'created_at',
                    'value' => function($data) {
                        return date('d.m.Y H:i', $data->created_at);
                    }
                ],
            ],
        ]);
        ?>
    </div>
</div>


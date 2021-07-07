<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = 'Заказ на грузоперевозку';

?>
<div class="container">
    <div class="row">
        <a href="<?= Yii::$app->urlManager->createUrl(['admin/package-orders/index']) ?>" class="btn btn-primary">Вернуться назад</a>
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
                ],
                [
                    'attribute' => 'phone',
                    'value' => function($data) {
                        return $data->phone ? $data->phone : '---';
                    }
                ],
                [
                    'attribute' => 'package_id',
                    'format' => 'raw',
                    'value' => function($data) {
                        return Html::a($data->package->name, Yii::$app->urlManager->createUrl(['admin/package/view', 'id' => $data->package->id]));
                    }
                ],
                [
                    'attribute' => 'type',
                    'format' => 'raw',
                    'value' => function($data) {
                        return $data->typeName;
                    }
                ],
                'qty',
                'total_price',
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


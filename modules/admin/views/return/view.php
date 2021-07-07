<?php

use yii\widgets\DetailView;
use yii\helpers\Html;

$this->title = 'Возврат вещей';
?>
<div class="admin-default-index">
    <div class="admin-block">
        <a href="<?= Yii::$app->urlManager->createUrl(['admin/return']) ?>">>>Вернуться к списку возвратов>></a>
    </div>
    <div class="container">
        <?=
        DetailView::widget([
            'model' => $model,
            'attributes' => [
                [
                    'attribute' => 'things_ids',
                    'header' => 'Вещи',
                    'format' => 'raw',
                    'value' => function($data) {
                        $str = '';
                        if($things = $data->things) {
                            $str .= '<ul>';
                            foreach($things as $thing) {
                                $str .= '<li>';
                                $str .= Html::a($thing->name, Yii::$app->urlManager->createUrl(['admin/thing/view', 'id' => $thing->id]));
                                $str .= '</li>';
                            }
                            $str .= '</ul>';
                        }
                        return $str;
                    }
                ],
                [
                    'attribute' => 'user_id',
                    'format' => 'raw',
                    'value' => function($data) {
                        return $data->user ? Html::a($data->user->fio, Yii::$app->urlManager->createUrl(['admin/users/view', 'id' => $data->user->id]))  : '---';
                    }
                ],
                [
                    'attribute' => 'return_value',
                    'value' => function($data) {
                        return $data->returnValue;
                    }
                ],
                [
                    'attribute' => 'return_time',
                    'value' => function($data) {
                        return $data->return_time ? date('d.m.Y H:i', $data->return_time) : '---';
                    }
                ],
                'address',
                'price',
                [
                    'attribute' => 'returned',
                    'value' => function($data) {
                        return $data->returned ? 'Да' : 'Нет';
                    }
                ],
                [
                    'attribute' => 'created_at',
                    'value' => function($data) {
                        return $data->created_at ? date('d.m.Y H:i', $data->created_at) : '---';
                    }
                ],
                [
                    'attribute' => 'act',
                    'format' => 'raw',
                    'value' => function($data) {
                        return Html::a('Скачать', Yii::$app->urlManager->createUrl(['lk/documents/return-act', 'id' => $data->id]));
                    }
                ]
            ],
        ]);
        ?>
        <?php
            if($model->returned) {
                $buttonOptions = ['class' => 'btn btn-danger', 'text' => 'Отменить возврат'];
            }
            else {
                $buttonOptions = ['class' => 'btn btn-success', 'text' => 'Вернуть вещь'];
            }
        ?>
        <?= Html::a($buttonOptions['text'], Yii::$app->urlManager->createUrl(['admin/return/return', 'id' => $model->id]), ['class' => $buttonOptions['class']]) ?>
    </div>
</div>

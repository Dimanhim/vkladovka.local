<?php

use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $type string */

$this->title = 'Заказы на тару/упаковку';
?>

<div class="container">
    <div class="row">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'rowOptions'=>function ($model, $key, $index, $grid){
                $class= $model->seen ? '' : 'warning-item';
                return [
                    'class'=>$class
                ];
            },
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
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
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view}{edit}',
                    'buttonOptions' => ['class' => 'action-btn action-btn-2x'],
                ],
            ],
        ]); ?>
    </div>
</div>

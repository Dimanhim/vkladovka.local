<?php

use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $type string */

$this->title = 'Заказы на грузоперевозку';
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
                    //'options' => ['class' => 'warning-item'],
                ],
                [
                    'attribute' => 'thing_ids',
                    'format' => 'raw',
                    'value' => function($data) {
                        $str = '';
                        if($things = $data->things) {
                            $str .= '<ul>';
                            foreach($things as $thing) {
                                $str .= '<li>'.$thing->name.'</li>';
                            }
                            $str .= '</ul>';
                        }

                        return $str;
                    }
                ],
                [
                    'attribute' => 'created_at',
                    'value' => function($data) {
                        return $data->created_at ? date('d.m.Y H:i', $data->created_at) : '---';
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

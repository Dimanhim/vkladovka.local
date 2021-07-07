<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Возвраты';
$count = 1;
?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'rowOptions' => function($data) {
        return $data->seen ? ['class' => ''] : ['class' => 'warning-item'];
    },
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'attribute' => 'user_id',
            'filter' => false,
            'format' => 'raw',
            'value' => function($data) {
                return $data->user ? Html::a($data->user->fio, Yii::$app->urlManager->createUrl(['admin/users/view', 'id' => $data->user->id]))  : '---';
            }
        ],
        [
            'attribute' => 'things_ids',
            'filter' => false,
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
            'attribute' => 'return_value',
            'filter' => false,
            'value' => function($data) {
                return $data->returnValue;
            }
        ],
        [
            'attribute' => 'return_time',
            'filter' => false,
            'value' => function($data) {
                return $data->return_time ? date('d.m.Y H:i', $data->return_time) : '---';
            }
        ],
        'address',
        'price',
        [
            'attribute' => 'returned',
            'filter' => [1 => 'Да', '0' => 'Нет'],
            'value' => function($data) {
                return $data->returned ? 'Да' : 'Нет';
            }
        ],
        [
            'attribute' => 'created_at',
            'filter' => false,
            'value' => function($data) {
                return $data->created_at ? date('d.m.Y H:i', $data->created_at) : '---';
            }
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{view}{delete}',
            'buttonOptions' => ['class' => 'action-btn action-btn-2x'],
        ],
    ],
]); ?>
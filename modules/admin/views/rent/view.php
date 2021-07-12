<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = 'Заказ на аренду';

?>
<div class="container">
    <div class="row">
        <a href="<?= Yii::$app->urlManager->createUrl(['admin/rent/index']) ?>" class="btn btn-primary">Вернуться назад</a>
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
                'description',
                'special_conditions',
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


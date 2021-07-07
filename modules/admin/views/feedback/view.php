<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->user ? 'Вопрос от '.$model->user->fio : 'Вопрос от анонима';

?>
<div class="container">
    <div class="row">
        <h1><?= Html::encode($this->title) ?></h1>
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
                'question',
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

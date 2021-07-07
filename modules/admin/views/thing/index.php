<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $type string */

$this->title = 'Список вещей';
?>

<div class="container">
    <div class="row">
        <h1><?= Html::encode($this->title) ?></h1>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'attribute' => 'img',
                    'format' => 'raw',
                    'filter' => false,
                    'value' => function($data) {
                        $img = $data->img ? Html::img(Yii::getAlias('@thing').'/'.$data->img, ['class' => 'thing-img-grid']) : '';
                        return $img ? Html::a($img, Yii::$app->urlManager->createUrl(['admin/thing/view', 'id' => $data->id])) : '---';
                    }
                ],
                [
                    'attribute' => 'cat',
                    'value' => function($data) {
                        return $data->category ? $data->category->name : '';
                    }
                ],
                [
                    'attribute' => 'parent_cat',
                    'filter' => false,
                    'value' => function($data) {
                        return $data->categoryParent ? $data->categoryParent->name : '';
                    }
                ],
                [
                    'attribute' => 'is_rent',
                    'value' => function($data) {
                        return $data->is_rent ? 'Да' : 'Нет';
                    },
                    'filter' => [0 => 'Нет', 1 => 'Да'],
                ],
                [
                    'attribute' => 'user',
                    'format' => 'raw',
                    'value' => function($data) {
                        return $data->users ? Html::a($data->users->fio, Yii::$app->urlManager->createUrl(['admin/users/view', 'id' => $data->users->id])) : '';
                    }
                ],
                'name',
                [
                    'header' => 'Действия',
                    'format' => 'raw',
                    'value' => function($data) {
                        $str = Html::a('Договор', Yii::$app->urlManager->createUrl(['lk/documents/agreement-storage', 'id' => $data->storageId]));
                        $str .= '<br>';
                        $str .= Html::a('QR-код', $data->getQrCode(true));
                        return $str;
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

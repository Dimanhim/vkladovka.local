<?php

use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $type string */

$this->title = 'Тара/упаковка';
?>

<div class="container">
    <div class="row">
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'name',
                [
                    'attribute' => 'type',
                    'value' => function($data) {
                        return $data->typeName;
                    }
                ],
                [
                    'attribute' => 'img',
                    'format' => 'raw',
                    'value' => function($data) {
                        return Html::img(Yii::getAlias('@package_view').'/'.$data->img, ['class' => 'thing-img-grid']);
                        //return ($data->img && file_exists(Yii::getAlias('@package').$data->img)) ? Html::img(Yii::getAlias('@package').$data->img) : '';
                    }
                ],
                'size',
                'price_rent',
                'price_sale',
                'price_delivery',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view}{update}{delete}',
                    'buttonOptions' => ['class' => 'action-btn action-btn-2x'],
                ],
            ],
        ]); ?>
    </div>
</div>

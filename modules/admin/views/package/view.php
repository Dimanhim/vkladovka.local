<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = 'Просмотр заказа на грузоперевозку';

?>
<div class="container">
    <div class="row">
        <a href="<?= Yii::$app->urlManager->createUrl(['admin/package/index']) ?>" class="btn btn-primary">Вернуться назад</a>
        <?=
        DetailView::widget([
            'model' => $model,
            'attributes' => [
                [
                    'attribute' => 'type',
                    'value' => function($data) {
                        return $data->typeName;
                    }
                ],
                [
                    'attribute' => 'type',
                    'format' => 'raw',
                    'value' => function($data) {
                        return $data->img ? Html::img(Yii::getAlias('@package_view').'/'.$data->img, ['class' => 'thing-img-grid']) : '---';
                    }
                ],
                'name',
                'size',
                'price_rent',
                'price_sale',
                'price_delivery',
            ],
        ]);
        ?>
    </div>
</div>


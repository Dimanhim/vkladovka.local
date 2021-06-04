<?php
$this->title = 'Заказы хранения';
?>
<table class="table table-stripped table-bordered">
    <tr>
        <th>Когда удобно забрать</th>
        <th>На какой срок, дней</th>
        <th>Стоимость хранения, руб.</th>
        <th>Итого к оплате, руб.</th>
        <th>Тип оплаты</th>
        <th>Позиции</th>
    </tr>
    <?php if($model) : ?>
        <?php foreach($model as $item) : ?>
            <tr>
                <td><?= date('d.m.Y', $item->date) ?></td>
                <td><?= $item->term ?></td>
                <td><?= $item->price_storage ?></td>
                <td><?= $item->price_total ?></td>
                <td><?= $item->paymentName ?></td>
                <td>
                    <a href="<?= Yii::$app->urlManager->createUrl(['admin/storage/items', 'id' => $item->id]) ?>">
                        <?php if($item->storageItems) : ?>
                            <ul>
                                <?php foreach($item->storageItems as $val) : ?>
                                    <li>
                                        <b><?= $val->name ?></b> <?= $val->catStorage->name ?> (<?= $val->height.'x'.$val->width.'x'.$val->length.', '.$val->weight.' кг' ?>)
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </a>

                </td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</table>

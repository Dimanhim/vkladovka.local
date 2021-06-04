<?php

/* @var $this yii\web\View */

use yii\bootstrap\ActiveForm;

?>
<tr data-marker="<?= $item ?>">
    <td colspan="2">
        <a href="#" class="remove-storage-item" data-marker="<?= $item ?>">
            <span class="glyphicon glyphicon-remove"></span>
        </a>
    </td>
</tr>
<tr data-marker="<?= $item ?>">
    <td class="td-width">
        Название:
    </td>
    <td>
        <input type="text" data-type="name" id="storage-m_name-<?= $item ?>" class="form-control" name="Storage[m_name][<?= $item ?>]" placeholder="Не более двух слов" aria-required="true">
    </td>
</tr>
<tr data-marker="<?= $item ?>">
    <td>
        Категория вещи:
    </td>
    <td>
        <select id="storage-m_cat_storage_id-<?= $item ?>" data-type="cat_storage_id" name="Storage[m_cat_storage_id][<?= $item ?>]" data-count="<?= $item ?>" class="form-control item-cats">
            <option value="">Выбрать...</option>
            <?php foreach($cats as $cat) : ?>
                <option value="<?= $cat->id ?>" data-price="<?= $cat->coef ?>"><?= $cat->name ?></option>
            <?php endforeach; ?>
        </select>
        <div class="td-desc">
            <span class="thing-desc desc-1">
                Стандартный предмет- обувь, одежда, игрушки, книги, сумки мелко бытовая техника или другие предметы , которые могут поместиться в вашей ручной клади
            </span>
            <span class="thing-desc desc-2">
                Крупный предмет- велосипед, рюкзак, лыжи, гитара, стулья, большие сумки, шины, коляски , телевизоры и т.п.
            </span>
            <span class="thing-desc desc-3">
                Закрытый контейнер- коробка с вещами, упакованный чемодан, объемом не более 0,3куб.м или 25 кг веса.
            </span>
            <span class="thing-desc desc-4">
                Мебель- все что объемом  более 0,3 куб.м или массой более 25 кг
            </span>
        </div>
    </td>
</tr>
<tr data-marker="<?= $item ?>">
    <td colspan="2">
        <a href="#" class="storage-description">Посмотреть описания категорий вещей</a>
    </td>
</tr>
<tr class="size dimensions-tr" data-marker="<?= $item ?>">
    <td class="bold">
        Примерные габариты (в см):
        <p>Для закрытых контейнеров и мебели</p>
    </td>
    <td>
        <input type="text" data-type="length" id="storage-length-<?= $item ?>" class="form-control size-item item-storage item-length" name="Storage[m_length][<?= $item ?>]" placeholder="Длина" aria-required="true">
        <input type="text" data-type="height" id="storage-height-<?= $item ?>" class="form-control size-item item-storage item-height" name="Storage[m_height][<?= $item ?>]" placeholder="Высота" aria-required="true">
        <input type="text" data-type="width" style="margin-top: 5px;" id="storage-width-<?= $item ?>" class="form-control size-item item-storage item-width" name="Storage[m_width][<?= $item ?>]" placeholder="Ширина" aria-required="true">

    </td>
</tr>

<tr class="size" data-marker="<?= $item ?>">
    <td>
        Примерный вес:
    </td>
    <td>
        <input type="text" data-type="weigth" id="storage-weight-<?= $item ?>" class="form-control size-item item-storage item-weight" name="Storage[m_weight][<?= $item ?>]" placeholder="килограммов..." aria-required="true">
    </td>
</tr>
<tr data-count="<?= $item ?>" data-marker="<?= $item ?>" class="append-to">
    <td colspan="2">
            <span class="error_message description-block"></span>
    </td>
</tr>


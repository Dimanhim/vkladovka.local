<?php

/* @var $this yii\web\View */

use yii\bootstrap\ActiveForm;

?>
<tr>
    <td>
        Название:
    </td>
    <td>
        <input type="text" id="storage-name-<?= $item ?>" class="form-control" name="StorageItems[m_name][<?= $item ?>]" placeholder="Не более двух слов" aria-required="true">
    </td>
</tr>
<tr>
    <td>
        Категория вещи:
    </td>
    <td>
        <select id="storage-items-m_cat_storage_id-<?= $item ?>" name="StorageItems[m_cat_storage_id][<?= $item ?>]" class="form-control item-cats">
            <option value="">Выбрать...</option>
            <?php foreach($cats as $cat) : ?>
                <option value="<?= $cat->id ?>"><?= $cat->name ?></option>
            <?php endforeach; ?>
        </select>
    </td>
</tr>
<tr>
    <td colspan="2">
        <a href="#" class="storage-description">Посмотреть описания категорий вещей</a>
    </td>
</tr>
<tr class="size">
    <td class="bold">
        Примерные габариты (в см):
        <p>Для закрытых контейнеров и мебели</p>
    </td>
    <td>
        <input type="text" id="storage-length-<?= $item ?>" class="form-control size-item item-storage item-length" name="StorageItems[m_length][<?= $item ?>]" placeholder="Длина" aria-required="true">
        <input type="text" id="storage-height-<?= $item ?>" class="form-control size-item item-storage item-height" name="StorageItems[m_height][<?= $item ?>]" placeholder="Высота" aria-required="true">
        <input type="text" id="storage-width-<?= $item ?>" class="form-control size-item item-storage item-width" name="StorageItems[m_width][<?= $item ?>]" placeholder="Ширина" aria-required="true">
    </td>
</tr>
<tr class="size append-to">
    <td>
        Примерный вес:
    </td>
    <td>
        <input type="text" id="storage-weight-<?= $item ?>" class="form-control size-item item-storage item-weight" name="StorageItems[m_weight][<?= $item ?>]" placeholder="килограммов..." aria-required="true">
    </td>
</tr>

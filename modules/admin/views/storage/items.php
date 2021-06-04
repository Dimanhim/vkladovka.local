<?php
$this->title = 'Заказ хранения №'.$model->id;
?>
<?php if($model) : ?>
        <table class="table table-bordered">
            <tr>
                <th>
                    На какой срок, дней
                </th>
                <th>
                    Способ оплаты
                </th>
                <th>
                    Когда удобно забрать
                </th>
                <th>
                    Стоимость хранения
                </th>
                <th>
                    Итого к оплате
                </th>
            </tr>
            <tr>
                <td><?= $model->term ?></td>
                <td><?= $model->paymentName ?></td>
                <td><?= date('d.m.Y', $model->date) ?></td>
                <td>
                    <input type="text" class="form-control change-storage-model" data-id="<?= $model->id ?>" data-field="price_storage" value="<?= $model->price_storage ?>">
                </td>
                <td>
                    <input type="text" class="form-control change-storage-model" data-id="<?= $model->id ?>" data-field="price_total" value="<?= $model->price_total ?>">
                </td>
            </tr>
        </table>
        <?php if($storageItems = $model->storageItems) : ?>
            <h3>Наименования:</h3>
            <p class="error"></p>
                <table class="table table-bordered">
                    <tr>
                        <th>Вещь</th>
                        <th>
                            Категория хранения
                        </th>
                        <th>
                            Длина
                        </th>
                        <th>
                            Ширина
                        </th>
                        <th>
                            Высота
                        </th>
                        <th>
                            Вес
                        </th>
                        <th>
                            Категория вещи
                        </th>
                        <th>
                            Подкатегория вещи
                        </th>
                    </tr>
            <?php foreach($storageItems as $storageItem) : ?>
                <tr data-id="<?= $storageItem->id ?>" class="storage-item-tr">
                    <td>
                        <input type="text" class="form-control storage-item" value="<?= $storageItem->name ?>" data-field="name">
                    </td>
                    <td>
                        <?php if($cat_storages = $storageItem->catStorage->getCatsStorageArray()) : ?>
                        <select name="" id="" class="form-control storage-item" data-field="cat_storage_id">
                            <?php foreach($cat_storages as $k => $v) : ?>
                            <?php $selected = ($k == $storageItem->cat_storage_id) ? ' selected="selected"' : '' ?>
                                <option value="<?= $k ?>"<?= $selected ?>><?= $v ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php endif; ?>
                        <?//= $storageItem->catStorage->name ?>
                    </td>
                    <td>
                        <input type="text" class="form-control storage-item" data-field="length" value="<?= $storageItem->length ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control storage-item" data-field="width" value="<?= $storageItem->width ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control storage-item" data-field="height" value="<?= $storageItem->height ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control storage-item" data-field="weight" value="<?= $storageItem->weight ?>">
                    </td>
                    <td>
                        <select name="" id="" class="form-control select-thing-category">
                            <option value="0">--Выбрать--</option>
                            <?php foreach($categories as $category) : ?>
                                <option value="<?= $category->id ?>"><?= $category->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td>
                        <select name="" id="" class="form-control select-thing-child-category">

                        </select>
                    </td>
                    <td>
                        <?php if($storageItem->inStorage) : ?>
                            <a href="#" class="btn btn-default" disabled="">Добавлено</a>
                        <?php else : ?>
                            <a href="#" class="btn btn-success add-storage-item">Добавить</a>
                        <?php endif; ?>

                    </td>
                </tr>
            <?php endforeach; ?>
                </table>
        <?php endif; ?>
<?php endif; ?>

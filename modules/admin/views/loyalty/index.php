<?php

use yii\helpers\Html;

$this->title = 'Таблица лояльности';

?>

<div class="container">
    <div class="row">
        <h1><?= Html::encode($this->title) ?></h1>

            <table id="loyalty-table" class="table table-bordered">
                <tr>
                    <th>Категория</th>
                    <th>Количество</th>
                    <th>Вывоз</th>
                    <th>Возврат, если хранение менее 3 мес.</th>
                    <th>Возврат, если хранение более 3 мес.</th>
                    <th>Стоимость хранения до 6 мес.</th>
                    <th>Стоимость хранения более 6 мес.</th>
                </tr>
<!-- Стандарт -->
                <tr>
                    <?php
                        $quan = 1;
                        $m = $model->value('standart', $quan)
                    ?>
                    <td><b>Небольшие вещи (стандарт)</b></td>
                    <td>1</td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="vivoz" value="<?= $m->vivoz ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="vozvrat_less_3" value="<?= $m->vozvrat_less_3 ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="vozvrat" value="<?= $m->vozvrat ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="storage_less_6" value="<?= $m->storage_less_6 ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="storage" value="<?= $m->storage ?>">
                    </td>
                </tr>
                <tr>
                    <?php
                    $quan = 2;
                    $m = $model->value('standart', $quan)
                    ?>
                    <td></td>
                    <td>2</td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="vivoz" value="<?= $m->vivoz ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="vozvrat_less_3" value="<?= $m->vozvrat_less_3 ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="vozvrat" value="<?= $m->vozvrat ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="storage_less_6" value="<?= $m->storage_less_6 ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="storage" value="<?= $m->storage ?>">
                    </td>
                </tr>
                <tr>
                    <?php
                    $quan = 3;
                    $m = $model->value('standart', $quan)
                    ?>
                    <td></td>
                    <td>3-4</td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="vivoz" value="<?= $m->vivoz ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="vozvrat_less_3" value="<?= $m->vozvrat_less_3 ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="vozvrat" value="<?= $m->vozvrat ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="storage_less_6" value="<?= $m->storage_less_6 ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="storage" value="<?= $m->storage ?>">
                    </td>
                </tr>
                <tr>
                    <?php
                    $quan = 4;
                    $m = $model->value('standart', $quan)
                    ?>
                    <td></td>
                    <td>5-9</td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="vivoz" value="<?= $m->vivoz ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="vozvrat_less_3" value="<?= $m->vozvrat_less_3 ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="vozvrat" value="<?= $m->vozvrat ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="storage_less_6" value="<?= $m->storage_less_6 ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="storage" value="<?= $m->storage ?>">
                    </td>
                </tr>
                <tr>
                    <?php
                    $quan = 5;
                    $m = $model->value('standart', $quan)
                    ?>
                    <td></td>
                    <td>10 и более</td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="vivoz" value="<?= $m->vivoz ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="vozvrat_less_3" value="<?= $m->vozvrat_less_3 ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="vozvrat" value="<?= $m->vozvrat ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="storage_less_6" value="<?= $m->storage_less_6 ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="storage" value="<?= $m->storage ?>">
                    </td>
                </tr>
<!-- Крупные -->
                <tr>
                    <?php
                    $quan = 1;
                    $m = $model->value('big', $quan)
                    ?>
                    <td><b>Крупные по размеру вещи</b></td>
                    <td>1</td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="vivoz" value="<?= $m->vivoz ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="vozvrat_less_3" value="<?= $m->vozvrat_less_3 ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="vozvrat" value="<?= $m->vozvrat ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="storage_less_6" value="<?= $m->storage_less_6 ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="storage" value="<?= $m->storage ?>">
                    </td>
                </tr>
                <tr>
                    <?php
                    $quan = 2;
                    $m = $model->value('big', $quan)
                    ?>
                    <td></td>
                    <td>2</td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="vivoz" value="<?= $m->vivoz ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="vozvrat_less_3" value="<?= $m->vozvrat_less_3 ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="vozvrat" value="<?= $m->vozvrat ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="storage_less_6" value="<?= $m->storage_less_6 ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="storage" value="<?= $m->storage ?>">
                    </td>
                </tr>
                <tr>
                    <?php
                    $quan = 3;
                    $m = $model->value('big', $quan)
                    ?>
                    <td></td>
                    <td>3-4</td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="vivoz" value="<?= $m->vivoz ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="vozvrat_less_3" value="<?= $m->vozvrat_less_3 ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="vozvrat" value="<?= $m->vozvrat ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="storage_less_6" value="<?= $m->storage_less_6 ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="storage" value="<?= $m->storage ?>">
                    </td>
                </tr>
                <tr>
                    <?php
                    $quan = 4;
                    $m = $model->value('big', $quan)
                    ?>
                    <td></td>
                    <td>5 и более</td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="vivoz" value="<?= $m->vivoz ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="vozvrat_less_3" value="<?= $m->vozvrat_less_3 ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="vozvrat" value="<?= $m->vozvrat ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="storage_less_6" value="<?= $m->storage_less_6 ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="storage" value="<?= $m->storage ?>">
                    </td>
                </tr>
<!-- Крупные -->
                <tr>
                    <?php
                    $quan = 1;
                    $m = $model->value('closed', $quan)
                    ?>
                    <td><b>Закрытый контейнер</b></td>
                    <td>1</td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="vivoz" value="<?= $m->vivoz ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="vozvrat_less_3" value="<?= $m->vozvrat_less_3 ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="vozvrat" value="<?= $m->vozvrat ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="storage_less_6" value="<?= $m->storage_less_6 ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="storage" value="<?= $m->storage ?>">
                    </td>
                </tr>
                <tr>
                    <?php
                    $quan = 2;
                    $m = $model->value('closed', $quan)
                    ?>
                    <td></td>
                    <td>Более 1</td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="vivoz" value="<?= $m->vivoz ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="vozvrat_less_3" value="<?= $m->vozvrat_less_3 ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="vozvrat" value="<?= $m->vozvrat ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="storage_less_6" value="<?= $m->storage_less_6 ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="storage" value="<?= $m->storage ?>">
                    </td>
                </tr>
<!-- Мебель -->
                <tr>
                    <?php
                    $quan = 1;
                    $m = $model->value('furniture', $quan)
                    ?>
                    <td><b>Мебель</b></td>
                    <td>До 1 куб.м.</td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="vivoz" value="<?= $m->vivoz ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="vozvrat_less_3" value="<?= $m->vozvrat_less_3 ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="vozvrat" value="<?= $m->vozvrat ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="storage_less_6" value="<?= $m->storage_less_6 ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="storage" value="<?= $m->storage ?>">
                    </td>
                </tr>
                <tr>
                    <?php
                    $quan = 2;
                    $m = $model->value('furniture', $quan)
                    ?>
                    <td></td>
                    <td>От 1 до 3 куб.м.</td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="vivoz" value="<?= $m->vivoz ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="vozvrat_less_3" value="<?= $m->vozvrat_less_3 ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="vozvrat" value="<?= $m->vozvrat ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="storage_less_6" value="<?= $m->storage_less_6 ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="storage" value="<?= $m->storage ?>">
                    </td>
                </tr>
                <tr>
                    <?php
                    $quan = 3;
                    $m = $model->value('furniture', $quan)
                    ?>
                    <td></td>
                    <td>Более 3 куб.м.</td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="vivoz" value="<?= $m->vivoz ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="vozvrat_less_3" value="<?= $m->vozvrat_less_3 ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="vozvrat" value="<?= $m->vozvrat ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="storage_less_6" value="<?= $m->storage_less_6 ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" data-id="<?= $m->id ?>" data-template="storage" value="<?= $m->storage ?>">
                    </td>
                </tr>
            </table>



    </div>
</div>


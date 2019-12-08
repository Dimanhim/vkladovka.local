<?php

/* @var $this yii\web\View */

use yii\web\View;
use yii\helpers\Url;
use kartik\datetime\DateTimePicker;

if(count($model) > 1) $many = true;
else $many = false;

if($many) $this->title = 'Продлить хранение '.count($model).' вещи(ей)';
else $this->title = 'Продлить хранение '.$model[0]->name;
?>
<?= $this->render('_payment', [
        'message' => 'Продлить хранение'
]) ?>

<!------------------ Хлебные крошки -->
<ul class="bread-crumps">
    <li><a href="<?= Yii::$app->urlManager->createUrl(['site/index']) ?>">Главная</a></li>
    <li><a href="<?= Yii::$app->urlManager->createUrl(['lk']) ?>"> / Личный кабинет</a></li>
    <?php if($many) : ?>
        <li> / Продлить хранение <?= count($model) ?> вещи(ей)</li>
    <?php else : ?>
        <li> / Продлить хранение <?= $model[0]->name ?></li>
    <?php endif; ?>
</ul>
<!-- Хлебные крошки -->

<div class="col-md-12">
    <?php if($many) : ?>
        <h2 class="tac">Продлить хранение <?= count($model) ?> вещи(ей)</h2>
    <?php else : ?>
        <h2 class="tac">Продлить хранение <?= $model[0]->name ?></h2>
    <?php endif; ?>
</div>

<div class="clearfix"></div>
<div class="col-md-12">
    <div>
        <a href="<?= Yii::$app->urlManager->createUrl(['lk/my-stock']) ?>">Вернуться на склад</a>
    </div>
    <div class="thing-actions">
        <table class="table">
            <tr>
                <td>
                    Название:
                </td>
                <td>
                    <?php foreach($model as $v) : ?>
                        <a href="<?= Yii::$app->urlManager->createUrl(['lk/thing', 'id' => $v->id]) ?>" class="thing-item-link" data-thing-item="<?= $v->id ?>"><?= $v->name ?> <?= $v->id ?></a><br />
                    <?php endforeach; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Фото:
                </td>
                <td class="thing-photo">
                    <?php foreach($model as $v) : ?>
                        <a href="<?= Yii::$app->urlManager->createUrl(['lk/thing', 'id' => $v->id]) ?>" class="thing-item-img" data-thing-item="<?= $v->id ?>">
                            <img src="<?= Yii::getAlias('@thing').'/'.$v->img ?>" alt="" />
                        </a>,
                    <?php endforeach; ?>
                </td>
            </tr>
            <tr class="select-date-extend">
                <td>
                    Продлить до:
                </td>
                <td>
                    <?= DateTimePicker::widget([
                        'name' => 'check_issue_date',
                        'value' => date('d-m-Y H:i'),
                        'options' => ['placeholder' => 'Выберете дату ...'],
                        'pluginOptions' => [
                            'format' => 'dd-mm-yyyy h:i',
                            'todayHighlight' => true
                        ]
                    ]); ?>
                </td>
            </tr>
            <tr>
                <td>
                    Стоимость хранения:
                </td>
                <td>
                    <input type="text" name="price" class="form-control" placeholder="384 руб." disabled />
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button class="btn btn-primary modal-btn thing-extend">Продлить хранение</button>
                </td>
            </tr>
        </table>
    </div>
</div>



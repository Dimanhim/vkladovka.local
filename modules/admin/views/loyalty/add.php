<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $type string */

$this->title = 'Добавление таблицы лояльности';
?>

<div class="container">
    <div class="row">
        <h1><?= Html::encode($this->title) ?></h1>
        <?php $form = ActiveForm::begin(['id' => 'form-loyalty', 'options' => ['class' => 'form send-data']]) ?>
        <?= $form->field($model, 'template')->dropdownList($model->templatesArray, ['prompt' => '--Выбрать--']) ?>
        <?= $form->field($model, 'quan')->textInput() ?>
        <?= $form->field($model, 'vivoz')->textInput() ?>
        <?= $form->field($model, 'vozvrat_less_3')->textInput() ?>
        <?= $form->field($model, 'vozvrat')->textInput() ?>
        <?= $form->field($model, 'storage_less_6')->textInput() ?>
        <?= $form->field($model, 'storage')->textInput() ?>
        <?= Html::submitButton('Добавить', ['class' => "btn btn-success"]) ?>
        <?php ActiveForm::end() ?>
    </div>
</div>


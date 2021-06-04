<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = 'Настройки';

?>

<div class="container">
    <div class="row">
        <h1><?= Html::encode($this->title) ?></h1>

        <?php $form = ActiveForm::begin(['id' => 'form-settings']) ?>
        <?= $form->field($model, 'bonus_partner')->textInput() ?>
        <?= $form->field($model, 'organization_name')->textInput() ?>
        <?= $form->field($model, 'stock_adress')->textInput() ?>
        <?= $form->field($model, 'requisites')->textarea() ?>
        <?= $form->field($model, 'director_name')->textInput() ?>
        <?= $form->field($model, 'director_signature')->fileInput() ?>
        <?= $form->field($model, 'director_stamp')->fileInput() ?>
        <?= Html::submitButton('Сохранить', ['class' => "btn btn-primary"]) ?>
        <?php ActiveForm::end() ?>
    </div>
</div>


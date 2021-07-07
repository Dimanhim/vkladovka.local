<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<div class="page-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'type')->dropDownList($model->types, ['prompt' => '--Выбрать--']) ?>
            <?= $form->field($model, 'size')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'price_rent')->textInput() ?>
            <?= $form->field($model, 'price_sale')->textInput() ?>
            <?= $form->field($model, 'price_delivery')->textInput() ?>
            <?= $form->field($model, 'img')->fileInput() ?>
            <?php
                if($model->type != 2)
                    echo $form->field($model, 'is_rent')->checkbox()
            ?>
            <div class="form-group">
                <?= Html::img(Yii::getAlias('@package_view').'/'.$model->img, ['class' => 'thing-img-grid']) ?>
            </div>
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>

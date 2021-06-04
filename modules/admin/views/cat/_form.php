<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\CatsThing;
?>
<div class="container">
    <div class="row">
        <div class="form">
            <?php $form = ActiveForm::begin(['fieldConfig' => ['options' => ['tag' => false]]]) ?>
            <?= $form->field($model, 'name')->textInput() ?>
            <?= $form->field($model, 'parent_id')->dropDownList(ArrayHelper::map(CatsThing::findAll(['parent_id' => null]), 'id', 'name'), ['prompt' => '--Выбрать--']) ?>
            <?= $form->field($model, 'description')->textarea() ?>
            <?= $form->field($model, 'img')->fileInput() ?>
            <?= Html::submitButton('Сохранить', ['class' => "btn btn-primary"]) ?>
            <?php ActiveForm::end() ?>
        </div>
    </div>
</div>


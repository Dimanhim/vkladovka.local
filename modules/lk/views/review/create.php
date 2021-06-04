<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<?php $form = ActiveForm::begin(['id' => 'form-review', 'options' => ['style' => 'width: 100%']]) ?>
<?= $form->field($model, 'preview')->textInput() ?>
<?= $form->field($model, 'content')->textarea() ?>
<?= Html::submitButton('Оставить отзыв', ['class' => "btn btn-success"]) ?>
<?php ActiveForm::end() ?>
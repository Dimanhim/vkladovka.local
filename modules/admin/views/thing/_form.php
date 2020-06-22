<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<div class="container">
    <div class="row">
        <div class="form">
            <?php $form = ActiveForm::begin(['fieldConfig' => ['options' => ['tag' => false]]]) ?>
            <?= $form->field($model, 'barcode')->textInput(['class' => 'form-control barcode']) ?>
            <?= $form->field($model, 'name')->textInput() ?>
            <?= $form->field($model, 'description')->textarea() ?>
<!-- Выбор категории -->
            <?php
                foreach($cats as $cat) {
                    $items[$cat->id] = $cat->name;
                }
                $param = [
                    'options' => [
                        $model->cat => ['Selected' => 'selected']
                    ],
                    'prompt' => 'Выбрать...',
                ];
            ?>
            <?= $form->field($model, 'cat')->dropDownList($items, $param) ?>
<!-- Выбор пользователя -->
            <?php
            $items = [];
            $param = [];
            foreach($users as $user) {
                $items[$user->id] = $user->fio;
            }
            $param = [
                'options' => [
                    $model->user => ['Selected' => 'selected']
                ],
                'prompt' => 'Выбрать...',
            ];
            ?>
            <?= $form->field($model, 'user')->dropDownList($items, $param) ?>

            <?= $form->field($model, 'img')->fileInput() ?>
            <?= Html::submitButton('Сохранить', ['class' => "btn btn-primary"]) ?>
            <?php ActiveForm::end() ?>
        </div>
    </div>
</div>


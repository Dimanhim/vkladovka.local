<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\CatsThing;
?>
<div class="container">
    <div class="row">
        <div class="form">
            <?php $form = ActiveForm::begin() ?>
            <?= $form->field($model, 'name')->textInput() ?>
            <?= $form->field($model, 'description')->textarea() ?>
            <?= $form->field($model, 'cat')->dropDownList(ArrayHelper::map(CatsThing::findAll(['parent_id' => null]), 'id', 'name'), ['prompt' => '--Выбрать--']) ?>
            <?= $form->field($model, 'parent_cat')->dropDownList(ArrayHelper::map(CatsThing::find()->all(), 'id', 'name'), ['prompt' => '--Выбрать--']) ?>
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


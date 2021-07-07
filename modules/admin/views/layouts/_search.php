<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<div class="search-block">
    <div class="row">
        <div class="col-md-6">
            <?php $form = ActiveForm::begin(['id' => 'form-search', 'action' => '/admin/default/search', 'options' => ['class' => 'search-form']]) ?>
            <span class="search-form-icon">
                <i class="fa fa-lg fa-search"></i>
            </span>
            <?= $form->field($model, 'request', ['template' => "{input}{error}"])->textInput(['placeholder' => "Поиск"]) ?>
            <?= Html::submitButton('Поиск', ['class' => "btn btn-success search-form-submit"]) ?>
            <?php ActiveForm::end() ?>
        </div>
    </div>

</div>


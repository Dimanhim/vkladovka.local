<?php

use common\models\Gallery;
use common\models\Salon;
use kartik\file\FileInput;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use himiklab\thumbnail\EasyThumbnailImage;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $page common\models\Page */
/* @var $model object */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="page-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'images_field[]')->widget(FileInput::classname(), [
                'options' => [
                    'multiple' => true,
                    'accept' => 'image/*'
                ],
                'pluginOptions' => [
                    'browseLabel' => 'Выбрать',
                    'showPreview' => false,
                    'showUpload' => false,
                    'showRemove' => false,
                ]
            ]); ?>
            <?php if (count($model->images)): ?>
                <ul id="sortable_photoes" class="photo-list" data-url="<?= Url::to(['sort-images']) ?>">
                    <?php foreach ($model->images as $image): ?>
                        <li data-id="<?= $image->id ?>" data-path="<?= $image->link ?>">
                            <?= EasyThumbnailImage::thumbnailImg(Yii::getAlias('@trend').'/'.$model->city_translit.'/'.$image->link, 160, 160, EasyThumbnailImage::THUMBNAIL_OUTBOUND) ?>
                            <p>
                                <?= Html::a('Удалить', ['delete-image', 'id' => $image->id], ['class' => 'btn btn-xs btn-danger delete-image']) ?>
                            </p>

                        </li>
                    <?php endforeach ?>
                </ul>
            <?php endif ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>

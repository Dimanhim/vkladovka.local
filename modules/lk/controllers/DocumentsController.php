<?php

namespace app\modules\lk\controllers;

use app\models\ReturnThing;
use app\models\Settings;
use app\models\Storage;
use app\models\StorageItems;
use app\models\Thing;
use app\models\User;
use Yii;
use app\modules\lk\models\Documents;

class DocumentsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $items = [];
        if($storages = Storage::findAll(['user_id' => Yii::$app->user->id])) {
            foreach ($storages as $storage) {
                if($storageItems = StorageItems::findAll(['storage_id' => $storage->id])) {
                    foreach($storageItems as $storageItem) {
                        $items[$storage->id]['things'][] = $storageItem;
                    }
                }
            }
        }
        return $this->render('index', [
            'items' => $items,
        ]);
    }

    // Договор хранения
    public function actionAgreementStorage($id) // storage_item_id
    {
        $storage = Storage::findOne($id);
        if($storageItems = $storage->storageItems) {
            $thingIds = [];
            foreach($storageItems as $storageItem) {
                $thingIds[] = $storageItem->thing_id;
            }
        }


        $user_id = Yii::$app->user->id;
        $user = User::findOne($user_id);
        $model = new Documents();
        $model->settings = Settings::find()->one();
        $model->user = $user;
        $model->storage = $storage;
        $model->things = Thing::find()->where(['in', 'id', $thingIds])->all();
        $model->template = Documents::TEMPLATE_AGREEMENT_STORAGE;
        $model->generatePDF();

        Yii::$app->response->sendFile($model->generatePDF());
        return;
    }
    public function actionReturnAct($id)
    {
        $return = ReturnThing::findOne($id);

        $user = User::findOne(Yii::$app->user->id);
        $model = new Documents();
        $model->model = $return;
        $model->settings = Settings::find()->one();
        $model->user = $user;
        $model->things = $return->things;
        $model->template = Documents::TEMPLATE_AGREEMENT_RETURN;
        $model->generatePDF();

        Yii::$app->response->sendFile($model->generatePDF());
        return;
    }

}

<?php

namespace app\modules\lk\controllers;

use app\models\Settings;
use app\models\StorageItems;
use app\models\Thing;
use app\models\User;
use Yii;
use app\modules\lk\models\Documents;

class DocumentsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $things = [];
        if($things = Thing::findAll(['user' => Yii::$app->user->id])) {

        }
        return $this->render('index', [
            'things' => $things,
        ]);
    }

    // Договор хранения
    public function actionAgreementStorage($id)
    {
        $user_id = Yii::$app->user->id;
        $user = User::findOne($user_id);
        $model = new Documents();
        $model->settings = Settings::find()->one();
        $model->user = $user;
        $model->thing = Thing::findOne($id);
        $model->template = Documents::TEMPLATE_AGREEMENT_STORAGE;
        $model->generatePDF();

        Yii::$app->response->sendFile($model->generatePDF());
        return;
    }

}

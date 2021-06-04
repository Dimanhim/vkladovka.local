<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Settings;

class SettingsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = Settings::find()->one() ? Settings::find()->one() : new Settings();
        if($model->load(Yii::$app->request->post())) {
            if($model->uploadFiles && $model->save()) {
                Yii::$app->session->setFlash('success', 'Успешно сохранено');
                return $this->redirect('index');
            }
        }
        return $this->render('index', [
            'model' => $model,
        ]);
    }
}

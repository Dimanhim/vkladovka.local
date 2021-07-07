<?php

namespace app\modules\lk\controllers;

use app\components\Functions;
use Yii;
use app\models\Pickup;

class PickupController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = new Pickup();
        if($model->load(Yii::$app->request->post())) {
            $model->date_time = ($model->pickup_date && $model->pickup_time) ? (strtotime($model->pickup_date) + Functions::getSecondsInTime($model->pickup_time)) : 0;
            $model->user_id = Yii::$app->user->id;
            $model->created_at = time();
            $model->phone = $model->phone ? $model->phone : '---';
            if(!$model->agree) {
                Yii::$app->session->setFlash('error', 'Необходимо согласиться с условиями');
            }
            if(!$model->user_id && !$model->phone) {
                Yii::$app->session->setFlash('error', 'Укажите номер телефона');
                return $this->refresh();
            }
            if(/*$model->validate() && */$model->save()) {
                Yii::$app->session->setFlash('success', 'Грузоперевозка успешно заказана. Наш менеджер свяжется с Вами в ближайшее время');
                return $this->refresh();
            }
        }
        return $this->render('index', [
            'model' => $model,
        ]);
    }

}

<?php

namespace app\modules\lk\controllers;

use Yii;
use app\models\Review;
use app\modules\lk\models\ReviewSearch;

class ReviewController extends \yii\web\Controller
{
    public function beforeAction($action)
    {
        $user = Yii::$app->user;
        if($user->isGuest AND $this->action->id !== 'login')
        {
            $user->loginRequired();
        }
        return true;
    }

    public function actionCreate()
    {
        $model = new Review();
        if($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->created_at = time();
            $model->user_id = Yii::$app->user->id;
            if($model->save()) {
                Yii::$app->session->setFlash('success', 'Отзыв успешно добавлен');
                return $this->redirect('/lk');
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

}

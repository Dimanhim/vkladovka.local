<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\User;

class ContentController extends \yii\web\Controller
{
    public function beforeAction($action)
    {
        $user = Yii::$app->user;
        if($user->isGuest AND $this->action->id !== 'login')
        {
            $user->loginRequired();
        }
        if(User::findOne(Yii::$app->user->id)->role != 'admin') {
            $this->goHome();
        }
        return true;
    }

    public function actionIndex($type = null)
    {
        return $this->render('index');
    }

}

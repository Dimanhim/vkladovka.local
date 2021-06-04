<?php

namespace app\modules\admin\controllers;

use app\models\Review;
use app\models\Thing;
use Yii;
use yii\web\Controller;
use app\models\User;

/**
 * Default controller for the `admin` module
 */
class UsersController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */

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

    public function actionIndex()
    {
        $model = User::find()->all();
        return $this->render('index', [
            'model' => $model,
        ]);
    }
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $things = Thing::findAll(['user' => $model->id]);
        $reviews = Review::findAll(['user_id' => $model->id]);
        return $this->render('view', [
            'model' => $model,
            'things' => $things,
            'reviews' => $reviews,
        ]);
    }


    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}


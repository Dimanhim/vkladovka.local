<?php

namespace app\modules\admin\controllers;

use app\models\SearchForm;
use Yii;
use yii\web\Controller;
use app\models\User;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
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
        return $this->render('index');
    }
    public function actionSearch()
    {
        $model = new SearchForm();
        $results = [];
        if($model->load(Yii::$app->request->post())) {
            $results = $model->results;
        }
        return $this->render('search', [
            'model' => $model,
            'results' => $results,
        ]);
    }
}

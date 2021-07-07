<?php

namespace app\modules\admin\controllers;

use app\models\ReturnThingSearch;
use Yii;
use yii\web\Controller;
use app\models\ReturnThing;
use app\models\User;
use yii\web\NotFoundHttpException;

class ReturnController extends Controller
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

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = new ReturnThingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);



        /*$model = ReturnThing::find()->all();
        return $this->render('index', [
            'model' => $model,
        ]);*/
    }
    public function actionView($id)
    {
        $model = $this->findModel($id);
        if(!$model->seen) {
            $model->seen = 1;
            $model->save();
        }
        return $this->render('view', [
            'model' => $model,
        ]);
    }
    public function actionReturn($id)
    {
        $model = $this->findModel($id);
        if($model->returned) {
            $model->returned = 0;
            $model->getReturnThings(true);
            $message = 'Отмена возврата произошла успешно';
        }
        else {
            $model->returned = 1;
            $model->returnThings;
            $message = 'Вещь успешно возвращена';
        }
        if($model->save()) {
            Yii::$app->session->setFlash('success', $message);
        }
        return $this->redirect(Yii::$app->request->referrer);
    }
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if($model->delete()) {
            Yii::$app->session->setFlash('success', 'Заявка на возврат успешно удалена');
            return $this->redirect('index');
        }

    }

    protected function findModel($id)
    {
        if (($model = ReturnThing::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}



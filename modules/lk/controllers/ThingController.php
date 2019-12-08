<?php

namespace app\modules\lk\controllers;

use app\models\Thing;
use yii\web\Controller;
use Yii;
use yii\filters\AccessControl;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class ThingController extends Controller
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

    /**
     * Displays homepage.
     *
     * @return string
     */

    public function actionIndex($id)
    {
        $model = $this->findModel($id);
        return $this->render('index', [
            'model' => $model,
        ]);
    }
    public function actionReturn($id)
    {
        $model = $this->findModelDelimiter($id);
        return $this->render('return', [
            'model' => $model,
        ]);
    }
    public function actionFriend($id)
    {
        $model = $this->findModelDelimiter($id);
        return $this->render('friend', [
            'model' => $model,
        ]);
    }
    public function actionRent($id)
    {
        $model = $this->findModelDelimiter($id);
        return $this->render('rent', [
            'model' => $model,
        ]);
    }
    public function actionExtend($id)
    {
        $model = $this->findModelDelimiter($id);
        return $this->render('extend', [
            'model' => $model,
        ]);
    }
    public function actionExtendAll()
    {
        return $this->render('extend-all');
    }

    protected function findModel($id)
    {
        if (($model = Thing::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    protected function findModelDelimiter($id)
    {
        $things = explode(',', $id);
        ;
        if (($model = Thing::find()->where(['id' => $things])->all()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }



    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionMyStuff()
    {
        return $this->render('my-stuff');
    }
}

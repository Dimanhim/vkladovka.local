<?php

namespace app\modules\lk\controllers;

use app\models\Settings;
use yii\web\Controller;
use Yii;
use yii\filters\AccessControl;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class BankController extends Controller
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

    public function actionIndex()
    {
        $settings = Settings::find()->one();
        return $this->render('index', [
            'settings' => $settings,
        ]);
    }
    public function actionPartner()
    {
        return $this->render('partner', [

        ]);
    }
    public function actionPayments()
    {
        return $this->render('payments', [

        ]);
    }
    public function actionHistory()
    {
        return $this->render('history', [

        ]);
    }
}

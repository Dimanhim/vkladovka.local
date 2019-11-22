<?php

namespace app\modules\lk\controllers;

use yii\web\Controller;
use Yii;
use yii\filters\AccessControl;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class PackageController extends Controller
{
    public $layout = 'main';

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
        return $this->render('index', [

        ]);
    }
    public function actionTara()
    {
        return $this->render('tara', [

        ]);
    }
    public function actionPackage()
    {
        return $this->render('package', [

        ]);
    }
    public function actionOther()
    {
        return $this->render('other', [

        ]);
    }
    public function actionItem()
    {
        return $this->render('item', [

        ]);
    }
}

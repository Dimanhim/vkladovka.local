<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class LkController extends Controller
{
    public $layout = 'lk';
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
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
//---- МОИ ВЕЩИ
    public function actionIndex()
    {
        return $this->render('my-stock');
    }
    public function actionMyStock()
    {
        return $this->render('my-stock');
    }
    public function actionRoom()
    {
        return $this->render('room');
    }
    public function actionMyThing()
    {
        return $this->render('my-thing');
    }
    public function actionMyThingRent()
    {
        return $this->render('my-thing-rent');
    }
    public function actionMyThingReturn()
    {
        return $this->render('my-thing-return');
    }
    public function actionMyThingForFriend()
    {
        return $this->render('my-thing-for-friend');
    }
    public function actionMyThingExtend()
    {
        return $this->render('my-thing-extend');
    }
    public function actionMyThingExtendAll()
    {
        return $this->render('my-thing-extend-all');
    }

//--- АРЕНДОВАТЬ ВЕЩЬ
    public function actionToThingRent()
    {
        return $this->render('to-thing-rent');
    }
    public function actionToThings()
    {
        return $this->render('to-things');
    }
    public function actionToThingItem()
    {
        return $this->render('to-thing-item');
    }

//---- ЗАКАЗАТЬ ХРАНЕНИЕ
    public function actionOrderStorage()
    {
        return $this->render('order-storage', [

        ]);
    }

//---- ЗАКАЗАТЬ ПИКАП
    public function actionOrderPickup()
    {
        return $this->render('order-pickup', [

        ]);
    }
//---- МОЙ БАНК
    public function actionBank()
    {
        return $this->render('bank', [

        ]);
    }
    public function actionBankPartner()
    {
        return $this->render('bank-partner', [

        ]);
    }
    public function actionBankPayments()
    {
        return $this->render('bank-payments', [

        ]);
    }
    public function actionBankHistory()
    {
        return $this->render('bank-history', [

        ]);
    }
//--- СТРАНИЦЫ ОПЛАТЫ
    public function actionPaymentTinkoff()
    {
        return $this->render('payment-tinkoff', [

        ]);
    }
    public function actionPaymentLk()
    {
        return $this->render('payment-lk', [

        ]);
    }
//--- СООБЩЕНИЕ МЕНЕДЖЕРА
    public function actionManagerMessage()
    {
        return $this->render('manager-message', [

        ]);
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

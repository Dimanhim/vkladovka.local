<?php

namespace app\controllers;

use app\models\Feedback;
use app\models\Review;
use app\models\Thing;
use app\models\TrendCity;
use app\models\TrendImage;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\SignupForm;
use app\models\User;
use app\models\Forget;
use app\models\ContactForm;
use app\models\FormRegistration;

class SiteController extends Controller
{
    public $layout = 'main';
    /**
     * {@inheritdoc}
     */
    /*public function behaviors()
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
    }*/

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
    public function actionIndex()
    {
        $trends = TrendCity::find()->all();
        $reviews = Review::find()->limit(10)->orderBy(['id' => SORT_DESC])->all();
        return $this->render('index', [
            'reviews' => $reviews,
            'trends' => $trends,
        ]);
    }
    public function actionAsWork()
    {
        return $this->render('as-work');
    }
    public function actionFaq()
    {
        return $this->render('faq');
    }
    public function actionLegalNotice()
    {
        return $this->render('legal-notice');
    }
    public function actionForUrLic()
    {
        return $this->render('for-ur-lic');
    }
    public function actionOrderDeparture()
    {
        return $this->render('order-departure');
    }
    public function actionForUrLic2()
    {
        return $this->render('for-ur-lic2');
    }
    public function actionOrderService()
    {
        return $this->render('order-service');
    }
    public function actionSearchThing()
    {
        if(Yii::$app->request->isAjax) {
            $string = Yii::$app->request->post('data');
            $model = Thing::find()->where(['like', 'name', $string])->all();
            return $this->renderAjax('search-thing', [
                'model' => $model,
            ]);
        }
    }
    public function actionRegistration()
    {
        $model = new FormRegistration();
        if($model->load(\Yii::$app->request->post()) && $model->validate()){
            $user = new User();
            $user->fio = $model->fio;
            $user->passport = $model->passport;
            $user->address = $model->address;
            $user->phone = $model->phone;
            $user->email = $model->email;
            $user->password = $model->password;
            if($model->password == $model->password_2) {
                $user->password = \Yii::$app->security->generatePasswordHash($model->password);
                if($user->save()) {
                    if($model->sendEmailRegistration()) {
                        Yii::$app->session->setFlash('success', "Поздравляем! Вы успешно зарегистрировались в системе!");
                        $login = new LoginForm();
                        $login->email = $model->email;
                        $login->password = $model->password;
                        if($login->login()) return $this->goHome();
                    }
                };
            }
            else {
                Yii::$app->session->setFlash('error', "Пароли не совпадают!");
                return $this->redirect('registration');
            }

        }
        return $this->render('registration', [
            'model' => $model,
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
            return $this->goBack();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post())) {
            if($model->login()) {
                Yii::$app->session->setFlash('success', "Вы успешно авторизовались!");
                return $this->goBack();
            }
            else {
                Yii::$app->session->setFlash('error', "Ошибка входа! Неверный логин или пароль");
                return $this->redirect('login');
            }

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

        return $this->goBack();
    }
    public function actionForget()
    {
        $model = new Forget();
        if($model->load(Yii::$app->request->post())) {
            $update = User::find()->where(['email' => $model->email]);
            if($update->exists()) {
                if($model->password == $model->password_2) {
                    $update = $update->one();
                    $update->password = \Yii::$app->security->generatePasswordHash($model->password);
                    $model->email = $update->email;
                    $model->fio = $update->fio;
                    if($update->save() && $model->sendEmailChangePassword()) {
                        Yii::$app->session->setFlash('success', 'Пароль успешно изменен и отправлен Вам на E-mail');
                    }
                }
                else {
                    Yii::$app->session->setFlash('error', 'Пароли не совпадают');
                }
            }
            else {
                Yii::$app->session->setFlash('error', 'Пользователя с указанным E-mail не существует в системе');
            }


        }
        return $this->render('forget', [
            'model' => $model,
        ]);
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
    public function actionAddTrendImages($id)
    {
        if(Yii::$app->request->isAjax) {
            $images = TrendImage::findAll(['city_id' => $id]);
            return $this->renderAjax('_trend_images', ['images' => $images]);
        }
    }
    public function actionChatForm()
    {
        $responce = ['result' => false, 'message' => 'Ошибка отправки данных. Пожалуйста, попробуйте позднее'];
        $model = new Feedback();
        if($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->user_id = Yii::$app->user->id;
            $model->created_at = time();
            if($model->save())
                $responce = ['result' => true, 'message' => 'Ваш вопрос успешно отправлен!'];
        }
        return json_encode($responce);
    }
}

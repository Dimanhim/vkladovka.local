<?php

namespace app\modules\lk\controllers;

use app\models\CatsThing;
use app\models\Rent;
use app\models\RentThing;
use app\models\Thing;
use yii\web\Controller;
use Yii;
use yii\filters\AccessControl;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class RentController extends Controller
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

//--- АРЕНДОВАТЬ ВЕЩЬ
    public function actionIndex($parent = false)
    {
        if(($get = Yii::$app->request->get('rent')) && ($thing = Thing::findOne($get))) {
            return $this->redirect('rent/thing?id='.$thing->id);
        }
        $model = $parent ? CatsThing::findAll(['parent_id' => $parent]) : CatsThing::findAll(['parent_id' => null]);
        return $this->render('index', [
            'model' => $model,
            'parent' => $parent,
        ]);
    }
    public function actionCat($id)
    {
        $model = CatsThing::findAll(['parent_id' => $id]);
        return $this->render('cat', [
            'model' => $model,
        ]);
    }

    public function actionTo($id)
    {
        $cat = CatsThing::findOne($id);
        $model = Thing::findAll(['is_rent' => 1, 'parent_cat' => $id]);
        return $this->render('to', [
            'model' => $model,
            'cat' => $cat,
        ]);
    }

    public function actionThing($id)
    {
        $model = Thing::findOne($id);
        $thing_rent = $model->findRent;
        $rent = new RentThing();
        if($rent->load(Yii::$app->request->post()) && $rent->validate()) {
            $rent->thing_id = $model->id;
            $rent->user_id = Yii::$app->user->id;
            if($rent->save()) {
                Yii::$app->session->setFlash('success', ' Вещь "'.$model->name.'" успешно Вами арендована');
                return $this->refresh();
            }
        }
        return $this->render('thing', [
            'model' => $model,
            'rent' => $rent,
            'thing_rent' => $thing_rent,
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

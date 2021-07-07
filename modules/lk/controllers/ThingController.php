<?php

namespace app\modules\lk\controllers;

use app\models\Rent;
use app\models\ReturnThing;
use app\models\Settings;
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
        $model_form = new ReturnThing();
        if($settings = Settings::find()->one()) {
            $model_form->address = $settings->stock_adress;
        }
        if($model_form->load(Yii::$app->request->post())) {
            $model_form->return_time = $model_form->return_time ? strtotime($model_form->return_time) : 0;
            $model_form->price = $model_form->price ? ((int) substr($model_form->price, 0, -5)) : 0;
            $model_form->things_ids = $model_form->thingsIdsString;
            $model_form->user_id = Yii::$app->user->id;
            $model_form->created_at = time();
            if($model_form->save()) {
                Yii::$app->session->setFlash('success', 'Заявка на возврат вещей успешно отправлена!');
                return $this->redirect('/lk');
            }
        }
        return $this->render('return', [
            'model' => $model,
            'model_form' => $model_form,
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
        $things = $this->findModelDelimiter($id);
        $model = new Rent();
        if($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->prepareModel;
            $model->user_id = Yii::$app->user->id;
            if($rented_things_message = $model->validateIsRent) {
                Yii::$app->session->setFlash('error', $rented_things_message);
                return $this->refresh();
            }
            if($model->save() && $model->rentThings) {
                Yii::$app->session->setFlash('success', 'Вещи успешно сданы в аренду. При желании, Вы сможете отменить аренду в карточке вещи');
                return $this->redirect('/lk');
            }
        }
        return $this->render('rent', [
            'things' => $things,
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


    public function actionDeleteRent($id)
    {
        $model = $this->findModel($id);
        $model->is_rent = 0;
        if($model->save() && $model->unsetRent) {
            Yii::$app->session->setFlash('success', 'Вещь успешно снята с аренды');
            return $this->redirect(['index', 'id' => $id]);
        }
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
    public function actionAjaxThingsRent($ids)
    {
        if($things = Thing::find()->where(['in', 'id', explode(',', $ids)])->all()) {
            $thing_names = [];
            foreach($things as $thing) {
                if($thing->is_rent) {
                    $thing_names[] = $thing->name;
                }
            }
            if(!empty($thing_names)) {
                $message = 'Вещи "'.implode(',', $thing_names).'" уже арендованы. Пожалуйста, сдайте в аренду неарендованные вещи';
                return $message;
            }
        }
        return false;
    }
}

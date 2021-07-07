<?php

namespace app\modules\lk\controllers;

use app\models\Package;
use app\models\PackageOrder;
use yii\web\Controller;
use Yii;
use yii\filters\AccessControl;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class PackageController extends Controller
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
        $model = new Package();
        return $this->render('index', [
           'model' => $model,
        ]);
    }
    public function actionItems($type = false)
    {
        $model = Package::findAll(['type' => $type]);
        $package = new Package();
        $package->type = $type;
        $typeName = $package->typeName;
        return $this->render('view', [
            'model' => $model,
            'typeName' => $typeName,
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
    public function actionItem($id)
    {
        $model = $this->findModel($id);
        $order = new PackageOrder();
        if($order->load(Yii::$app->request->post())) {
            $order->created_at = time();
            if(!Yii::$app->user->isGuest) {
                $order->user_id = Yii::$app->user->id;
            }
            if($order->save()) {
                Yii::$app->session->setFlash('success', 'Ваш Заказ успешно принят');
                return $this->refresh();
            }
        }
        return $this->render('item', [
            'model' => $model,
            'order' => $order,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Package::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

<?php

namespace app\modules\lk\controllers;

use yii\web\Controller;
use Yii;
use yii\filters\AccessControl;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Storage;
use app\models\CatsStorage;
use app\models\StorageItems;

class StorageController extends Controller
{
    /*
    public function beforeAction($action)
    {
        $user = Yii::$app->user;
        if($user->isGuest AND $this->action->id !== 'login')
        {
            $user->loginRequired();
        }
        return true;
    }
    */

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
        $model = new Storage();
        $items = new StorageItems();
        if($model->load(Yii::$app->request->post())) {
            $model->date = strtotime($model->date);
            /*if($model->save()) {
                $success = false;
                if($items->load(Yii::$app->request->post())) {
                    for($i = 0; $i < count($items->name); $i++) {
                        $item = new StorageItems();
                        $item->name = $items->name[$i];
                        $item->cat_storage_id = $items->cat_storage_id[$i];
                        $item->length = $items->length[$i];
                        $item->height = $items->height[$i];
                        $item->width = $items->width[$i];
                        $item->weight = $items->weight[$i];
                        if($item->save()) $success = true;
                        else $success = false;
                    }
                    if($success) {
                        Yii::$app->session->setFlash('success', 'Заказ успешно сохранен', false);
                        //return $this->redirect('index');
                    } else {
                        Yii::$app->session->setFlash('error', 'Ошибка сохранения заказа');
                    }
                }
            }*/
        }
        $cats = CatsStorage::find()->all();
        return $this->render('index', [
            'model' => $model,
            'cats' => $cats,
            'items' => $items,
        ]);
    }
    public function actionAddStorage()
    {
        $model = new Storage();
        $items = new StorageItems();
        if($items->load(Yii::$app->request->post())) {


        }
        if($model->load(Yii::$app->request->post())) {
            $model->date = strtotime($model->date);
        }
        return $items->name;
    }
    public function actionAppend($count)
    {
        $cats = CatsStorage::find()->all();
        return $this->renderPartial('_item', ['item' => $count, 'cats' => $cats]);
    }
    public function actionReg()
    {
        if(Yii::$app->user->isGuest) return 'error';
        else return 'success';
    }
}

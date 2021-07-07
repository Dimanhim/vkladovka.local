<?php

namespace app\modules\admin\controllers;

use app\models\CatsThing;
use app\models\Thing;
use Mpdf\Tag\Th;
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
use app\models\User;

class StorageController extends Controller
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
        $model = Storage::find()->all();
        return $this->render('index', [
            'model' => $model,
        ]);
    }
    public function actionItems($id)
    {
        $model = $this->findModel($id);
        $items = StorageItems::findAll(['storage_id' => $id]);
        $categories = CatsThing::findAll(['parent_id' => null]);
        return $this->render('items', [
            'model' => $model,
            'items' => $items,
            'categories' => $categories,
        ]);
    }
    public function actionChangeFieldValue($id, $field, $val)
    {
        if($model = StorageItems::findOne($id)) {
            $model->$field = $val;
            return $model->save();
        }
        return false;
    }
    public function actionChangeModelValue($id, $field, $val)
    {
        if($model = Storage::findOne($id)) {
            $model->$field = $val;
            return $model->save(false);
        }
        return false;
    }
    public function actionGetChildCategories($val)
    {
        $str = '';
        if($model = CatsThing::findAll(['parent_id' => $val])) {
            foreach($model as $value) {
                $str .= '<option value="'.$value->id.'">'.$value->name.'</option>';
            }
        }
        return $str;
    }
    public function actionAddThing($id, $name, $category_id, $child_category_id, $user_id)
    {
        $model = new Thing();
        $model->name = $name;
        $model->cat = $category_id;
        $model->parent_cat = $child_category_id;
        $model->created_at = time();
        $model->user = $user_id;
        if($model->save()) {
            $storageItem = StorageItems::findOne($id);
            $storageItem->thing_id = $model->id;
            $storageItem->is_proceess = 1;
            return $storageItem->save();
        }
        return false;
    }
    public function actionCreate()
    {
        $model = new Storage();

        if($model->load(Yii::$app->request->post())) {
            $model->date = strtotime($model->date);
            if($model->save()) {
                if($model->saveItems) {
                    Yii::$app->session->setFlash('success', 'Успешно сохранено!');
                    return $this->redirect('index');
                }
            }
        }

        $cats = CatsStorage::find()->all();
        return $this->render('create', [
            'model' => $model,
            'cats' => $cats,
            'items' => $items,
        ]);
    }
    protected function findModel($id)
    {
        if (($model = Storage::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}


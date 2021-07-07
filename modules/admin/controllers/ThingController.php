<?php

namespace app\modules\admin\controllers;

use app\components\Functions;
use yii\web\Controller;
use Yii;
use yii\filters\AccessControl;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\CatsThing;
use app\models\Thing;
use app\models\User;
use yii\web\UploadedFile;
use app\modules\admin\models\ThingSearch;

class ThingController extends Controller
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

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ThingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);




        $model = Thing::find()->all();
        return $this->render('index', [
            'model' => $model,
        ]);
    }
    public function actionView($id)
    {
        $model = $this->findModel($id);
        return $this->render('view', [
            'model' => $model,
        ]);
    }
    public function actionAdd()
    {
        $model = new Thing();
        $cats = CatsThing::find()->all();
        $users = User::find()->all();
        if($model->load(Yii::$app->request->post())) {
            $model->created_at = time();
            $model->qrCode;
            if($model->save()) {
                if($model->uploadFile) {
                    return $this->redirect('view?id='.$model->id);
                }
                Yii::$app->session->setFlash('success', "Вещь успешно добавлена!");
                return $this->redirect('view?id='.$model->id);
            }

        }
        return $this->render('add', [
            'model' => $model,
            'cats' => $cats,
            'users' => $users,
        ]);
    }
    public function actionEdit($id)
    {
        $model = $this->findModel($id);
        $cats = CatsThing::find()->all();
        $users = User::find()->all();
        $img = $model->img;
        if($model->load(Yii::$app->request->post())) {
            $model->qrCode;
            $model->file = UploadedFile::getInstance($model, 'img');
            if($model->file) {
                $model->uploadFile;
            }
            else {
                $model->img = $img;
            }
            if($model->save()) {
                Yii::$app->session->setFlash('success', "Вещь успешно отредактирована!");
                return $this->redirect('index');
            } else {
                Yii::$app->session->setFlash('error', "Произошла ошибка редактирования!");
                return $this->redirect('index');
            }
        }
        return $this->render('edit', [
            'model' => $model,
            'cats' => $cats,
            'users' => $users,
        ]);
    }
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if($model->delete()) {
            $alias = Yii::getAlias('@thingdel').'/'.$model->img;
            if(file_exists($alias)) {
                unlink($alias);
            }
            Yii::$app->session->setFlash('success', "Вещь успешно удалена!");
            return $this->redirect('index');
        } else {
            Yii::$app->session->setFlash('error', "Произошла ошибка удаления!");
            return $this->redirect('index');
        }
    }


    /*
     *  AJAX
     * */
    public function actionAddParentCats($cat)
    {
        if(Yii::$app->request->isAjax) {
            if($model = CatsThing::findAll(['parent_id' => Yii::$app->request->get('cat')])) {
                $str = '<option value="">--Выбрать--</option>';
                foreach($model as $value) {
                    $str .= '<option value="'.$value->id.'">'.$value->name.'</option>';
                }
                return $str;
            }
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


}


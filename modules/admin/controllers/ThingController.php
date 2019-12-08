<?php

namespace app\modules\admin\controllers;

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
            if($model->save()) {
                $id = $model->id;
            }
            $model->file = UploadedFile::getInstance($model, 'img');
            if(!$model->user) $model->user = 0;
            if($model->file) {
                $model->file->saveAs('admin/things/img-user-'.$model->user.'-thing-'.$id.'.'. $model->file->extension);
                $model->img = 'img-user-'.$model->user.'-thing-'.$id.'.'. $model->file->extension;
                if($model->save()) {
                    Yii::$app->session->setFlash('success', "Вещь успешно добавлена!");
                    return $this->redirect('index');
                } else {
                    Yii::$app->session->setFlash('error', "Произошла ошибка сохранения!");
                    return $this->redirect('index');
                }
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
            $model->file = UploadedFile::getInstance($model, 'img');
            if($model->file) {
                $model->file->saveAs('admin/things/img-user-'.$model->user.'-thing-'.$model->id.'.'. $model->file->extension);
                $model->img = 'img-user-'.$model->user.'-thing-'.$model->id.'.'. $model->file->extension;
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
            unlink($alias);
            Yii::$app->session->setFlash('success', "Вещь успешно удалена!");
            return $this->redirect('index');
        } else {
            Yii::$app->session->setFlash('error', "Произошла ошибка удаления!");
            return $this->redirect('index');
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


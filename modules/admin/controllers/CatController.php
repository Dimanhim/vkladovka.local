<?php

namespace app\modules\admin\controllers;

use app\models\Thing;
use yii\web\Controller;
use Yii;
use yii\filters\AccessControl;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\User;
use app\models\CatsThing;
use yii\web\UploadedFile;

class CatController extends Controller
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
        $model = CatsThing::findAll(['parent_id' => null]);
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
    public function actionInner($id)
    {
        $model = CatsThing::findAll(['parent_id' => $id]);
        return $this->render('inner', [
            'model' => $model,
            'parent' => $id,
        ]);
    }
    public function actionThings($id)
    {
        $model = Thing::findAll(['parent_cat' => $id]);
        $cat = CatsThing::findOne($id);
        return $this->render('things', [
            'model' => $model,
            'cat' => $cat,
        ]);
    }
    public function actionAdd($parent = false)
    {
        $model = new CatsThing();
        if($parent) $model->parent_id = $parent;
        if($model->load(Yii::$app->request->post())) {
            if($model->save()) {
                $cat_id = $model->id;
            }
            $model->file = UploadedFile::getInstance($model, 'img');
            if($model->file) {
                $model->file->saveAs('admin/categories/img-category-'.$cat_id.'.'. $model->file->extension);
                $model->img = 'img-category-'.$cat_id.'.'. $model->file->extension;
            }
            if($model->save()) {
                Yii::$app->session->setFlash('success', "Категория успешно добавлена!");
                return $parent ? $this->redirect('inner?id='.$parent) : $this->redirect('index');
            } else {
                Yii::$app->session->setFlash('error', "Произошла ошибка сохранения!");
                return $this->redirect('index');
            }
        }
        return $this->render('add', [
            'model' => $model,
        ]);
    }
    public function actionEdit($id)
    {
        $model = $this->findModel($id);
        $img = $model->img;
        if($model->load(Yii::$app->request->post())) {
            $model->file = UploadedFile::getInstance($model, 'img');
            if($model->file) {
                $model->file->saveAs('admin/categories/img-category-'.$model->id.'.'. $model->file->extension);
                $model->img = 'img-category-'.$model->id.'.'. $model->file->extension;
            }
            else {
                $model->img = $img;
            }
            if($model->save()) {
                Yii::$app->session->setFlash('success', "Категория успешно отредактирована!");
                return $this->redirect('index');
            } else {
                Yii::$app->session->setFlash('error', "Произошла ошибка редактирования!");
                return $this->redirect('index');
            }
        }
        return $this->render('edit', [
            'model' => $model,
        ]);
    }
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if($model->delete()) {
            $alias = Yii::getAlias('@catdel').'/'.$model->img;
            unlink($alias);
            Yii::$app->session->setFlash('success', "Категория успешно удалена!");
            return $this->redirect('index');
        } else {
            Yii::$app->session->setFlash('error', "Произошла ошибка удаления!");
            return $this->redirect('index');
        }
    }
    protected function findModel($id)
    {
        if (($model = CatsThing::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


}


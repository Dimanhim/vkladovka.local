<?php

namespace app\modules\lk\controllers;

use yii\web\Controller;
use Yii;
use yii\filters\AccessControl;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\User;
use app\models\UserForm;
use app\models\FormRegistration;
use yii\web\UploadedFile;

class ProfileController extends Controller
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
        $user = User::findOne(Yii::$app->user->id);
        return $this->render('index', [
            'user' => $user,
        ]);
    }
    public function actionEdit()
    {
        $form = new UserForm();
        $model = User::findOne(Yii::$app->user->id);
        if($form->load(Yii::$app->request->post())) {
            $model->fio = $form->fio;
            $model->passport = $form->passport;
            $model->address = $form->address;
            $model->phone = $form->phone;
            $form->file = UploadedFile::getInstance($form, 'file');
            if($form->file) {
                $form->file->saveAs('admin/avatars/img-ava-'.$model->id.'.'. $form->file->extension);
                $model->img = 'img-ava-'.$model->id.'.'. $form->file->extension;
            }
            if($model->save()) {
                Yii::$app->session->setFlash('success', 'Данные успешно обновлены');
                return $this->redirect('index');
            }
            else Yii::$app->session->setFlash('error', 'Произошла ошибка обновления данных');
        }

        return $this->render('edit', [
            'model' => $model,
            'edit' => $form,
        ]);
    }
}


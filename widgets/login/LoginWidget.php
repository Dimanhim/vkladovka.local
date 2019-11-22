<?php
namespace app\widgets\login;

use app\models\LoginForm;
use Yii;
use yii\helpers\Url;

class LoginWidget extends \yii\base\Widget
{
    public function init()
    {
        return parent::init();
    }

    public function run()
    {
        if (!Yii::$app->user->isGuest) {
            //Yii::$app->response->redirect(['site/index']);
            //return $this->goHome();
            //Yii::$app->request->redirect(Yii::$app->getHomeUrl());
            //return Yii::$app->request->redirect('index');
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post())) {
            if($model->login()) {
                Yii::$app->session->setFlash('success', "Вы успешно авторизовались!", false);
                Yii::$app->response->redirect(Url::to(['/site/index']));
            }
            else {
                Yii::$app->session->setFlash('error', "Ошибка входа! Неверный логин или пароль", false);
                Yii::$app->response->redirect(Url::to(['/site/login']));
            }

        }

        $model->password = '';
        return $this->render('form', [
            'model' => $model,
        ]);
    }
}
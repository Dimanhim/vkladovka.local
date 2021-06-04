<?php

namespace app\modules\admin\controllers;

use app\models\TrendImage;
use Yii;
use app\models\Review;
use app\modules\admin\models\TrendCitySearch;
use app\models\TrendCity;
use app\models\User;

class TrendCityController extends \yii\web\Controller
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
    public function actionIndex()
    {
        $searchModel = new TrendCitySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionCreate()
    {
        $model = new TrendCity();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->cityTranslit;
            $model->uploadImages;
            $model->save();
            return $this->redirect(['index']);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->cityTranslit;
            $model->uploadImages;
            $model->save();
            return $this->redirect('index');
        }

        return $this->render('update', [
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
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if($model->delete()) {
            Yii::$app->session->setFlash('success', 'Отзыв успешно удален!');
            return $this->redirect('index');
        }
    }
    public function actionDeleteImage($id)
    {
        if ($image = TrendImage::findOne(['id' => $id])) {
            if (file_exists($image->fullPath)) {
                unlink($image->fullPath);
            }
            if($image->delete()) {
                return true;
            }
        }
        return false;
    }

    protected function findModel($id)
    {
        if (($model = TrendCity::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}

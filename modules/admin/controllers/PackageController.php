<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Package;
use yii\data\ActiveDataProvider;

class PackageController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Package::find(),
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionView($id)
    {
        $model = $this->findModel($id);
        return $this->render('view', [
            'model' => $model,
        ]);
    }
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $img = $model->img;
        if ($model->load(Yii::$app->request->post()) && $model->save() && $model->uploadFile) {
            if(!$model->img) {
                $model->img = $img;
                $model->save();
            }
            Yii::$app->session->setFlash('success', "Тара/упаковка успешно сохранена!");
            return $this->redirect(['index']);
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }
    public function actionCreate()
    {
        $model = new Package();
        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->save() && $model->uploadFile) {
            return $this->redirect(['index']);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if($model->delete()) return $this->redirect('index');
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

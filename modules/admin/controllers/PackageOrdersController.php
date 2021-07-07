<?php

namespace app\modules\admin\controllers;

use app\models\PackageOrder;
use yii\data\ActiveDataProvider;

class PackageOrdersController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => PackageOrder::find(),
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $model->seen = 1;
        $model->save();
        return $this->render('view', [
            'model' => $model,
        ]);
    }


    protected function findModel($id)
    {
        if (($model = PackageOrder::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

    }

}

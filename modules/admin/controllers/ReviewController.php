<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Review;
use app\modules\admin\models\ReviewSearch;

class ReviewController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $searchModel = new ReviewSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionView($id)
    {
        $model = Review::findOne($id);
        return $this->render('view', [
            'model' => $model,
        ]);
    }
    public function actionDelete($id)
    {
        $model = Review::findOne($id);
        if($model->delete()) {
            Yii::$app->session->setFlash('success', 'Отзыв успешно удален!');
            return $this->redirect('index');
        }
    }

}

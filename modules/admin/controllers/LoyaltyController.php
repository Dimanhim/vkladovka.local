<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Loyalty;

class LoyaltyController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = new Loyalty();
        return $this->render('index', [
            'model' => $model,
        ]);
    }
    public function actionAdd()
    {
        $model = new Loyalty();
        if($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Успешно добавлено');
            return $this->redirect('add');
        }
        return $this->render('add', [
            'model' => $model,
        ]);
    }

    /*
     * AJAX
     */
    public function actionSaveValue()
    {
        $id = Yii::$app->request->post('id');
        $val = Yii::$app->request->post('val');
        $template = Yii::$app->request->post('template');
        $model = Loyalty::findOne($id);
        $model->$template = $val;
        if($model->save()) return 'success';
        return 'fail';
    }

}

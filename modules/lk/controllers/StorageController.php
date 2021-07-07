<?php

namespace app\modules\lk\controllers;

use yii\web\Controller;
use Yii;
use yii\filters\AccessControl;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Storage;
use app\models\CatsStorage;
use app\models\StorageItems;
use app\models\StorageForm;

class StorageController extends Controller
{
    /*
    public function beforeAction($action)
    {
        $user = Yii::$app->user;
        if($user->isGuest AND $this->action->id !== 'login')
        {
            $user->loginRequired();
        }
        return true;
    }
    */
    public function beforeAction($action)
    {
        if (in_array($action->id, ['index'])) {
            $this->enableCsrfValidation = false;
        }
        return parent::beforeAction($action);
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
        $model = new Storage();

        if($model->load(Yii::$app->request->post())) {
            $model->date = strtotime($model->date);
            $model->user_id = null;
            if($model->save()) {
                if($model->saveItems) {
                    Yii::$app->session->setFlash('success', 'Успешно сохранено!');
                }
            }
        }

        $cats = CatsStorage::find()->all();
        return $this->render('index', [
            'model' => $model,
            'cats' => $cats,
            'items' => $items,
        ]);
    }
    public function actionAddStorage()
    {
        $model = new Storage();
        $items = new StorageItems();
        if($model->load(Yii::$app->request->post())) {
            $model->date = strtotime($model->date);
            $model->user_id = Yii::$app->user->id;
            if($model->save()) {
                if($items->load(Yii::$app->request->post())) {
                    foreach($items as $item) {
                        $item->cat_storage_id = $model->id;
                        $item->save();
                    }
                }
            }
        }
        return 'success';
    }
    public function actionAppend($count)
    {
        $cats = CatsStorage::find()->all();
        return $this->renderAjax('_item', ['item' => $count, 'cats' => $cats]);
    }
    public function actionReg()
    {
        if(Yii::$app->user->isGuest) return 'error';
        else return 'success';
    }
    public function actionSendStorage()
    {
        echo "<pre>";
        print_r(Yii::$app->request->post());
        echo "</pre>";
        exit;
        return 'success';
    }
    public function actionCalculateStorage()
    {
        $price_vivoz = 0;
        $price_vozvrat = 0;
        $price_storage = 0;

        $size = [];
        $responce = [0 => ['field' => [], 'size' => [], 'message' => [], 'price_storage' => [], 'price_total' => []]];
        $model = new Storage();
        $loyal = $model->loyalTable;
        if($model->load(Yii::$app->request->post())) {

            // расчет размеров, веса
            if($model->m_length/* && $model->m_height && $model->m_width && $model->m_weight*/) {
                foreach($model->m_length as $k => $v) {
                    $responce[$k]['field'] = $k;
                    $responce[$k]['message'] = '';
                    $storage_template = ($model->term && ($model->term > Storage::PROMO_YEAR_DAYS)) ? 'storage' : 'storage_less_6';
                    $vozvrat_template = ($model->term && ($model->term > Storage::PROMO_DAYS)) ? 'vozvrat' : 'vozvrat_less_3';

                    // Стандартный предмет -------------------------------------------------------------------------
                    if($model->m_cat_storage_id[$k] == 1) {
                        $template = 'standart';
                        $count = $model->countCatStorageTemplate(1);

                        $price_vivoz += $loyal[$template][$count]['vivoz'];
                        $price_vozvrat += $loyal[$template][$count][$vozvrat_template];
                        $price_storage += $loyal[$template][$count][$storage_template];
                    }

                    // Крупный предмет -------------------------------------------------------------------------
                    elseif($model->m_cat_storage_id[$k] == 2) {
                        $template = 'big';
                        $count = $model->countCatStorageTemplate(2);

                        $price_vivoz += $loyal[$template][$count]['vivoz'];
                        $price_vozvrat += $loyal[$template][$count][$vozvrat_template];
                        $price_storage += $loyal[$template][$count][$storage_template];
                    }
                    // Закрытый контейнер -------------------------------------------------------------------------
                    elseif($model->m_cat_storage_id[$k] == 3) {
                        if($model->m_length[$k] && $model->m_width[$k] && $model->m_height[$k]) {
                            $size[$k] = $model->m_length[$k] * $model->m_width[$k] * $model->m_height[$k];
                        }
                        if(!$size[$k] && $model->m_cat_storage_id[$k]) {
                            $responce[$k]['message'] = 'Укажите размеры';
                        } else {
                            if(($size && ($size[$k] >= 300000)) || ($model->m_weight[$k] >= 25)) {
                                $template = 'furniture';
                                $count = $model->countCatStorageTemplate(4);
                                $price_vivoz += $loyal[$template][$count]['vivoz'];
                                $price_vozvrat += $loyal[$template][$count][$vozvrat_template];
                                $price_storage += $size[$k] / 1000000 * $loyal[$template][$count][$storage_template];
                            }
                            else {
                                $template = 'closed';
                                $count = $model->countCatStorageTemplate(3);
                                $price_vivoz += $loyal[$template][$count]['vivoz'];
                                $price_vozvrat += $loyal[$template][$count][$vozvrat_template];
                                $price_storage += $loyal[$template][$count][$storage_template];
                            }
                        }
                    }
                    // Мебель -------------------------------------------------------------------------
                    elseif($model->m_cat_storage_id[$k] == 4) {
                        if($model->m_length[$k] && $model->m_width[$k] && $model->m_height[$k]) {
                            $size[$k] = $model->m_length[$k] * $model->m_width[$k] * $model->m_height[$k];
                        }
                        if($size[$k] && $model->m_cat_storage_id[$k]) {
                            $template = 'furniture';
                            $count = $model->countCatStorageTemplate(4, $size[$k]);
                            $responce['test'] = $size[$k];
                            $price_vivoz += $loyal[$template][$count]['vivoz'];
                            $price_vozvrat += $loyal[$template][$count][$vozvrat_template];
                            $price_storage += $size[$k] / 1000000 * $loyal[$template][$count][$storage_template];
                        }
                        if(!$size[$k] && !$model->m_cat_storage_id[$k]) {
                            $responce[$k]['message'] = 'Укажите категорию и размеры';
                        }
                        if(!$size[$k] && $model->m_cat_storage_id[$k]) {
                            $responce[$k]['message'] = 'Укажите размеры';
                        }
                        if($size[$k] && !$model->m_cat_storage_id[$k]) {
                            $responce[$k]['message'] = 'Укажите категорию';
                        }
                    }

                    else {
                        $responce[$k]['field'] = $k;
                        $responce[$k]['message'] = 'Укажите категорию';
                    }

                }
            }
            //--- расчет размеров, веса


            $responce['count'] = count($model->m_cat_storage_id);
            $responce['price_vivoz'] = $model->priceFormat($price_vivoz);
            $responce['price_vozvrat'] = $model->priceFormat($price_vozvrat);
            $responce['price_storage'] =  $model->priceFormat($model->termValue($price_storage));
            $responce['price_pickup'] = $model->priceFormat($price_vivoz + $price_vozvrat);
            $responce['price_total'] = $model->priceFormat($price_vivoz + $price_vozvrat + $responce['price_storage']);


            return json_encode($responce);
        }
    }
    public function actionCalculateStorageOLD()
    {
        $price_storage = 0;
        $return_price = 0;
        $export_price = 0;
        $size = [];
        $responce = [0 => ['field' => [], 'size' => [], 'message' => [], 'price_storage' => [], 'price_total' => []]];
        $model = new Storage();
        if($model->load(Yii::$app->request->post())) {

            // расчет размеров, веса
            if($model->m_length/* && $model->m_height && $model->m_width && $model->m_weight*/) {
                foreach($model->m_length as $k => $v) {

                    // Закрытый контейнер или мебель -------------------------------------------------------------------
                    if(($model->m_cat_storage_id[$k] == 3) || ($model->m_cat_storage_id[$k] == 4)) {
                        // Закрытый контейнер
                        if($model->m_cat_storage_id[$k] == 3) {
                            $responce[$k]['field'] = $k;
                            $responce[$k]['message'] = '';
                            if(!$model->m_weight[$k]) {
                                $responce[$k]['message'] = 'Укажите примерный вес';
                            } else {
                                if($model->m_length[$k] && $model->m_width[$k] && $model->m_height[$k]) {
                                    $size[$k] = $model->m_length[$k] * $model->m_width[$k] * $model->m_height[$k];
                                }
                                if(($size && ($size[$k] >= 300000)) || ($model->m_weight[$k] >= 25)) {
                                    $price = $model->storagePrice(4, $size[$k]);
                                    $delivery = $model->storagePrice(4, $size[$k], true);
                                }
                                else {
                                    $price = $model->storagePrice(3);
                                    $delivery = $model->storagePrice(3, false, true);
                                }
                                $price_storage += $price;
                                $return_price += $delivery;
                            }
                        }

                        // Мебель --------------------------------------------------------------------------------------
                        if($model->m_cat_storage_id[$k] == 4) {
                            $responce[$k]['field'] = $k;
                            $responce[$k]['message'] = '';
                            if($model->m_length[$k] && $model->m_width[$k] && $model->m_height[$k]) {
                                $size[$k] = $model->m_length[$k] * $model->m_width[$k] * $model->m_height[$k];
                            }
                            if($size[$k] && $model->m_weight[$k] && $model->m_cat_storage_id[$k]) {
                                $size[$k] = $model->m_length[$k] * $model->m_width[$k] * $model->m_height[$k];
                                $responce[$k]['size'] = $size[$k];
                                $price = $model->storagePrice(4, $size[$k]);
                                $price_storage += $price;
                                $return_price += $model->storagePrice(4, $size[$k], true);
                            }
                            if(!$size[$k] && !$model->m_weight[$k] && !$model->m_cat_storage_id[$k]) {
                                $responce[$k]['message'] = 'Укажите категорию, размеры и вес';
                            }
                            if(!$size[$k] && !$model->m_weight[$k] && $model->m_cat_storage_id[$k]) {
                                $responce[$k]['message'] = 'Укажите размеры и вес';
                            }
                            if(!$size[$k] && $model->m_weight[$k] && !$model->m_cat_storage_id[$k]) {
                                $responce[$k]['message'] = 'Укажите категорию и размеры';
                            }
                            if(!$size[$k] && $model->m_weight[$k] && $model->m_cat_storage_id[$k]) {
                                $responce[$k]['message'] = 'Укажите размеры';
                            }
                            if($size[$k] && !$model->m_weight[$k] && !$model->m_cat_storage_id[$k]) {
                                $responce[$k]['message'] = 'Укажите категорию и вес';
                            }
                            if($size[$k] && $model->m_weight[$k] && !$model->m_cat_storage_id[$k]) {
                                $responce[$k]['message'] = 'Укажите категорию';
                            }
                            if($size[$k] && !$model->m_weight[$k] && $model->m_cat_storage_id[$k]) {
                                $responce[$k]['message'] = 'Укажите вес';
                            }
                        }
                    } elseif(($model->m_cat_storage_id[$k] == 1) || ($model->m_cat_storage_id[$k] == 2)) {

                        // Стандартный предмет -------------------------------------------------------------------------
                        if($model->m_cat_storage_id[$k] == 1) {
                            $responce[$k]['field'] = $k;
                            $responce[$k]['message'] = '';
                            $count_storage = $model->countCatStorage(1);
                            if($count_storage == 1) {
                                if($model->term && ($model->term > Storage::PROMO_YEAR_DAYS)) {
                                    $price = 23 / 30 * $model->term;
                                }
                                else {
                                    $price = 25;
                                }
                                $return = ($model->term && ($model->term > Storage::PROMO_DAYS)) ? 50 : 100 ;
                                $export = 100;
                            }
                            elseif($count_storage == 2) {
                                if($model->term && ($model->term > Storage::PROMO_YEAR_DAYS)) {
                                    $price = 23;
                                }
                                else {
                                    $price = 25;
                                }
                                $return = ($model->term && ($model->term > Storage::PROMO_DAYS)) ? 40 : 60 ;
                                $export = 60;
                            }
                            elseif($count_storage < 5) {
                                if($model->term && ($model->term > Storage::PROMO_YEAR_DAYS)) {
                                    $price = 23;
                                }
                                else {
                                    $price = 25;
                                }
                                $return = ($model->term && ($model->term > Storage::PROMO_DAYS)) ? 25 : 45 ;
                                $export = 45;
                            }
                            elseif($count_storage < 10) {
                                if($model->term && ($model->term > Storage::PROMO_YEAR_DAYS)) {
                                    $price = 23;
                                }
                                else {
                                    $price = 25;
                                }
                                $return = ($model->term && ($model->term > Storage::PROMO_DAYS)) ? 0 : 25 ;
                                $export = 25;
                            }
                            else {
                                if($model->term && ($model->term > Storage::PROMO_YEAR_DAYS)) {
                                    $price = 23;
                                }
                                else {
                                    $price = 25;
                                }
                                $return = ($model->term && ($model->term > Storage::PROMO_DAYS)) ? 0 : 0 ;
                                $export = 0;
                            }
                            $price_storage += $price;
                            $return_price += $return;
                            $export_price += $export;
                        }

                        // Крупный предмет -----------------------------------------------------------------------------
                        if($model->m_cat_storage_id[$k] == 2) {
                            $responce[$k]['field'] = $k;
                            $responce[$k]['message'] = '';
                            $count_storage = $model->countCatStorage(2);
                            $responce['test'] = $count_storage;
                            if($count_storage == 1) {
                                if($model->term && ($model->term > Storage::PROMO_YEAR_DAYS)) {
                                    $price = 135;
                                }
                                else {
                                    $price = 150;
                                }
                                $return = ($model->term && ($model->term > Storage::PROMO_DAYS)) ? 50 : 100 ;
                                $export = 100;
                            }
                            elseif($count_storage == 2) {
                                if($model->term && ($model->term > Storage::PROMO_YEAR_DAYS)) {
                                    $price = 130 * $count_storage;
                                }
                                else {
                                    $price = 150 * $count_storage;
                                }
                                $return = ($model->term && ($model->term > Storage::PROMO_DAYS)) ? 0 : 75 ;
                                $export = 70;
                            }
                            elseif($count_storage < 5) {
                                if($model->term && ($model->term > Storage::PROMO_YEAR_DAYS)) {
                                    $price = 125 * $count_storage;
                                }
                                else {
                                    $price = 150 * $count_storage;
                                }
                                $return = ($model->term && ($model->term > Storage::PROMO_DAYS)) ? 0 : 45 ;
                                $export = 45;
                            }
                            else {
                                if($model->term && ($model->term > Storage::PROMO_YEAR_DAYS)) {
                                    $price = 125 * $count_storage;
                                }
                                else {
                                    $price = 150 * $count_storage;
                                }
                                $return = ($model->term && ($model->term > Storage::PROMO_DAYS)) ? 0 : 0 ;
                                $export = 0;
                            }
                            $price_storage += $price;
                            $return_price += $return;
                            $export_price += $export;
                        }
                    } else {
                        $responce[$k]['field'] = $k;
                        $responce[$k]['message'] = 'Укажите категорию';
                    }

                }
            }
            //--- расчет размеров, веса


            $responce['count'] = count($model->m_length);
            $responce['price_storage'] =  $model->termValue($price_storage);
            $responce['price_export'] = $export_price;
            $responce['price_return'] = $return_price;
            $delivery_price = $responce['price_export'] + $responce['price_return'];
            //$responce['price_total'] = $responce['price_storage'] + $delivery_price * $model->termValue;
            $responce['price_total'] = $responce['price_storage'] +$delivery_price;
            //$responce['price_total'] = $delivery_price;

            return json_encode($responce);
        }
    }
}

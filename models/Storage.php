<?php

namespace app\models;
use app\models\CatsThing;
use app\models\User;
use Yii;
use yii\db\ActiveRecord;

class Storage extends ActiveRecord
{
    public $agree;

    public $m_name = [];
    public $m_length = [];
    public $m_height = [];
    public $m_width = [];
    public $m_weight = [];
    public $m_cat_storage_id = [];

    public $price_pickup;

    public $delivery;

    const SIZE_COST = 10;
    const SIZE_WEIGHT = 10;

    const PROMO_DAYS = 93;
    const PROMO_YEAR_DAYS = 186;

    public function rules()
    {
        return [
            [['term', 'agree', 'payment_method', 'user_id'], 'integer'],
            [['date', 'm_cat_storage_id', 'm_length', 'm_height', 'm_width', 'm_weight', 'm_name', 'price_storage', 'price_total', 'delivery', 'price_pickup'], 'safe'],
        ];
    }
    public static function tableName()
    {
        return 'storage';
    }
    public function attributeLabels()
    {
        return [
            'id',
            'term' => 'На какой срок',
            'date' => 'Когда удобно забрать',
            'agree' => 'Согласен',
            'price_storage' => 'Стоимость хранения',
            'price_total' => 'Итого к оплате',
            'price_pickup' => 'Стоимость перевозки',
            'payment_method' => 'Способ оплаты',

            'm_name' => 'Название',
            'm_cat_storage_id' => 'Категория вещи',
            'm_length' => 'Длина',
            'm_height' => 'Высота',
            'm_width' => 'Ширина',
            'm_weight' => 'Примерный вес',

            'delivery' => 'Доставка',
            'user_id' => 'Пользователь',
        ];
    }
    public function getSaveItems()
    {
        if($this->m_name) {
            for($i = 0; $i < count($this->m_name); $i++) {
                $model = new StorageItems();
                foreach($this->relationArray as $k => $v) {
                    $model->$v = $this->$k[$i];
                }
                $model->storage_id = $this->id;
                $model->save();
            }
            return true;
        }
        return false;
    }
    public function getRelationArray()
    {
        return [
            'm_name' => 'name',
            'm_cat_storage_id' => 'cat_storage_id',
            'm_length' => 'length',
            'm_height' => 'height',
            'm_width' => 'width',
            'm_weight' => 'weight',
        ];
    }
    public function getCategory()
    {
        return $this->render(CatsStorage::className(), ['id' => 'cat_storage_id']);
    }
    public function getStorageItems()
    {
        return $this->hasMany(StorageItems::className(), ['storage_id' => 'id']);
    }
    public function getPaymentName()
    {
        $arr = [
            0 => 'Оплата картой',
            1 => 'Оплата наличными или картой курьеру',
        ];
        return $arr[$this->payment_method];
    }
    public function countCatStorage($value)
    {
        $count = 0;
        if($cats = $this->m_cat_storage_id) {
            foreach($cats as $k => $v) {
                if($v == $value) $count++;
            }
        }
        return $count;
    }
    public function storagePrice($value, $size = false, $del = false)
    {
        if($value == 3) {
            $price = 395;
            if($this->term && ($this->term > self::PROMO_DAYS)) {
                if(($this->countCatStorage(3) > 1)) {
                    $price = 295;
                    $return = 0;
                    $export = 0;
                } else {
                    $price = 360;
                    $return = 0;
                    $export = 100;
                }
            } else {
                if(($this->countCatStorage(3) > 1)) {
                    $return = 0;
                    $export = 0;
                } else {
                    $return = 0;
                    $export = 100;
                }
            }
            $delivery = $return + $export;
        }
        if($value == 4) {
            if($size <= 1000000) {
                if($this->term && ($this->term > self::PROMO_DAYS)) {
                    $price = 250;
                    $delivery = 0;
                }
                else {
                    $price = 270;
                    $delivery = 0;
                }
            } elseif(($size > 1000000) && ($size <= 3000000)) {
                if($this->term && ($this->term > self::PROMO_DAYS)) {
                    $price = 220;
                    $delivery = 0;
                }
                else {
                    $price = 250;
                    $delivery = 0;
                }
            } else {
                if($this->term && ($this->term > self::PROMO_DAYS)) {
                    $price = 200;
                    $delivery = 0;
                }
                else {
                    $price = 220;
                    $delivery = 0;
                }
            }
            if(($this->countCatStorage(4) < 3)) {
                $delivery = 550 + 500;
            }
            elseif(($this->countCatStorage(4) == 3)) {
                $delivery = 600 + 600;
            }
            else {
                $delivery = 0;
            }
        }
        return $del ? $delivery : $price;

    }
    public function deliveryValue($size)
    {
        return 1;
    }
    public function termValue($price_storage)
    {
        $days = 30;
        if($this->term > $days) {
            return $price_storage /$days * $this->term;
        } else {
            //return $this->term ? ($price_storage * ceil($this->term / $days)) : $price_storage;
            return $price_storage;
        }
    }
    public function countCatStorageTemplate($value, $size = false)
    {
        $template = 0;
        $count = $this->countCatStorage($value);
        if($value == 1) {
            if($count == 1) $template = 1;
            elseif($count == 2) $template = 2;
            elseif(($count == 3) || ($count == 4)) $template = 3;
            elseif(($count >= 5) && ($count <= 9)) $template = 4;
            elseif($count >= 10) $template = 5;
        }
        if($value == 2) {
            if($count == 1) $template = 1;
            elseif($count == 2) $template = 2;
            elseif(($count == 3) || ($count == 4)) $template = 3;
            elseif($count >= 5) $template = 4;
        }
        if($value == 3) {
            if($count == 1) $template = 1;
            elseif($count >= 2) $template = 2;
        }
        if($value == 4) {
            if($size) {
                if($size <= 1000000) $template = 1;
                elseif(($size > 1000000) && ($size <= 3000000)) $template = 2;
                elseif($size > 3000000) $template = 3;
            }
        }
        return $template;
    }

    public function priceFormat($price)
    {
        return number_format($price, 2, '.', '');
    }

    public function getLoyalTable()
    {
        $loyalty = new Loyalty();

        return [
            'standart' => [
                1 => [
                    'vivoz' => $loyalty->value('standart', 1)->vivoz,
                    'vozvrat_less_3' => $loyalty->value('standart', 1)->vozvrat_less_3,
                    'vozvrat' => $loyalty->value('standart', 1)->vozvrat,
                    'storage_less_6' => $loyalty->value('standart', 1)->storage_less_6,
                    'storage' => $loyalty->value('standart', 1)->storage,
                ],
                2 => [
                    'vivoz' => $loyalty->value('standart', 2)->vivoz,
                    'vozvrat_less_3' => $loyalty->value('standart', 2)->vozvrat_less_3,
                    'vozvrat' => $loyalty->value('standart', 2)->vozvrat,
                    'storage_less_6' => $loyalty->value('standart', 2)->storage_less_6,
                    'storage' => $loyalty->value('standart', 2)->storage,
                ],
                3 => [
                    'vivoz' => $loyalty->value('standart', 3)->vivoz,
                    'vozvrat_less_3' => $loyalty->value('standart', 3)->vozvrat_less_3,
                    'vozvrat' => $loyalty->value('standart', 3)->vozvrat,
                    'storage_less_6' => $loyalty->value('standart', 3)->storage_less_6,
                    'storage' => $loyalty->value('standart', 3)->storage,
                ],
                4 => [
                    'vivoz' => $loyalty->value('standart', 4)->vivoz,
                    'vozvrat_less_3' => $loyalty->value('standart', 4)->vozvrat_less_3,
                    'vozvrat' => $loyalty->value('standart', 4)->vozvrat,
                    'storage_less_6' => $loyalty->value('standart', 4)->storage_less_6,
                    'storage' => $loyalty->value('standart', 4)->storage,
                ],
                5 => [
                    'vivoz' => $loyalty->value('standart', 5)->vivoz,
                    'vozvrat_less_3' => $loyalty->value('standart', 5)->vozvrat_less_3,
                    'vozvrat' => $loyalty->value('standart', 5)->vozvrat,
                    'storage_less_6' => $loyalty->value('standart', 5)->storage_less_6,
                    'storage' => $loyalty->value('standart', 5)->storage,
                ],
            ],
            'big' => [
                1 => [
                    'vivoz' => $loyalty->value('big', 1)->vivoz,
                    'vozvrat_less_3' => $loyalty->value('big', 1)->vozvrat_less_3,
                    'vozvrat' => $loyalty->value('big', 1)->vozvrat,
                    'storage_less_6' => $loyalty->value('big', 1)->storage_less_6,
                    'storage' => $loyalty->value('big', 1)->storage,
                ],
                2 => [
                    'vivoz' => $loyalty->value('big', 2)->vivoz,
                    'vozvrat_less_3' => $loyalty->value('big', 2)->vozvrat_less_3,
                    'vozvrat' => $loyalty->value('big', 2)->vozvrat,
                    'storage_less_6' => $loyalty->value('big', 2)->storage_less_6,
                    'storage' => $loyalty->value('big', 2)->storage,
                ],
                3 => [
                    'vivoz' => $loyalty->value('big', 3)->vivoz,
                    'vozvrat_less_3' => $loyalty->value('big', 3)->vozvrat_less_3,
                    'vozvrat' => $loyalty->value('big', 3)->vozvrat,
                    'storage_less_6' => $loyalty->value('big', 3)->storage_less_6,
                    'storage' => $loyalty->value('big', 3)->storage,
                ],
                4 => [
                    'vivoz' => $loyalty->value('big', 4)->vivoz,
                    'vozvrat_less_3' => $loyalty->value('big', 4)->vozvrat_less_3,
                    'vozvrat' => $loyalty->value('big', 4)->vozvrat,
                    'storage_less_6' => $loyalty->value('big', 4)->storage_less_6,
                    'storage' => $loyalty->value('big', 4)->storage,
                ],
            ],
            'closed' => [
                1 => [
                    'vivoz' => $loyalty->value('closed', 1)->vivoz,
                    'vozvrat_less_3' => $loyalty->value('closed', 1)->vozvrat_less_3,
                    'vozvrat' => $loyalty->value('closed', 1)->vozvrat,
                    'storage_less_6' => $loyalty->value('closed', 1)->storage_less_6,
                    'storage' => $loyalty->value('closed', 1)->storage,
                ],
                2 => [                          // более 1
                    'vivoz' => $loyalty->value('closed', 2)->vivoz,
                    'vozvrat_less_3' => $loyalty->value('closed', 2)->vozvrat_less_3,
                    'vozvrat' => $loyalty->value('closed', 2)->vozvrat,
                    'storage_less_6' => $loyalty->value('closed', 2)->storage_less_6,
                    'storage' => $loyalty->value('closed', 2)->storage,
                ],
            ],
            'furniture' => [
                1 => [                          // до 1 куб/м
                    'vivoz' => $loyalty->value('furniture', 1)->vivoz,
                    'vozvrat_less_3' => $loyalty->value('furniture', 1)->vozvrat_less_3,
                    'vozvrat' => $loyalty->value('furniture', 1)->vozvrat,
                    'storage_less_6' => $loyalty->value('furniture', 1)->storage_less_6,
                    'storage' => $loyalty->value('furniture', 1)->storage,
                ],
                2 => [                          // от 1 до 3 куб/м
                    'vivoz' => $loyalty->value('furniture', 2)->vivoz,
                    'vozvrat_less_3' => $loyalty->value('furniture', 2)->vozvrat_less_3,
                    'vozvrat' => $loyalty->value('furniture', 2)->vozvrat,
                    'storage_less_6' => $loyalty->value('furniture', 2)->storage_less_6,
                    'storage' => $loyalty->value('furniture', 2)->storage,
                ],
                3 => [                          // более 3 куб/м
                    'vivoz' => $loyalty->value('furniture', 3)->vivoz,
                    'vozvrat_less_3' => $loyalty->value('furniture', 3)->vozvrat_less_3,
                    'vozvrat' => $loyalty->value('furniture', 3)->vozvrat,
                    'storage_less_6' => $loyalty->value('furniture', 3)->storage_less_6,
                    'storage' => $loyalty->value('furniture', 3)->storage,
                ],
            ],
        ];
    }
    public function getLoyalTableOLD()
    {
        return [
            'standart' => [
                1 => [
                    'vivoz' => 100,
                    'vozvrat_less_3' => 100,
                    'vozvrat' => 50,
                    'storage_less_6' => 25,
                    'storage' => 23,
                ],
                2 => [
                    'vivoz' => 60,
                    'vozvrat_less_3' => 60,
                    'vozvrat' => 40,
                    'storage_less_6' => 25,
                    'storage' => 23,
                ],
                3 => [
                    'vivoz' => 45,
                    'vozvrat_less_3' => 45,
                    'vozvrat' => 25,
                    'storage_less_6' => 25,
                    'storage' => 23,
                ],
                4 => [
                    'vivoz' => 25,
                    'vozvrat_less_3' => 25,
                    'vozvrat' => 0,
                    'storage_less_6' => 25,
                    'storage' => 23,
                ],
                5 => [
                    'vivoz' => 0,
                    'vozvrat_less_3' => 0,
                    'vozvrat' => 0,
                    'storage_less_6' => 25,
                    'storage' => 23,
                ],
            ],
            'big' => [
                1 => [
                    'vivoz' => 100,
                    'vozvrat_less_3' => 100,
                    'vozvrat' => 50,
                    'storage_less_6' => 150,
                    'storage' => 135,
                ],
                2 => [
                    'vivoz' => 70,
                    'vozvrat_less_3' => 70,
                    'vozvrat' => 0,
                    'storage_less_6' => 150,
                    'storage' => 130,
                ],
                3 => [
                    'vivoz' => 45,
                    'vozvrat_less_3' => 45,
                    'vozvrat' => 0,
                    'storage_less_6' => 150,
                    'storage' => 125,
                ],
                4 => [
                    'vivoz' => 0,
                    'vozvrat_less_3' => 0,
                    'vozvrat' => 0,
                    'storage_less_6' => 150,
                    'storage' => 150,
                ],
            ],
            'closed' => [
                1 => [
                    'vivoz' => 100,
                    'vozvrat_less_3' => 100,
                    'vozvrat' => 0,
                    'storage_less_6' => 395,
                    'storage' => 360,
                ],
                2 => [                          // более 1
                    'vivoz' => 0,
                    'vozvrat_less_3' => 0,
                    'vozvrat' => 0,
                    'storage_less_6' => 395,
                    'storage' => 295,
                ],
            ],
            'furniture' => [
                1 => [                          // до 1 куб/м
                    'vivoz' => 550,
                    'vozvrat_less_3' => 550,
                    'vozvrat' => 550,
                    'storage_less_6' => 270,
                    'storage' => 250,
                ],
                2 => [                          // от 1 до 3 куб/м
                    'vivoz' => 550,
                    'vozvrat_less_3' => 550,
                    'vozvrat' => 550,
                    'storage_less_6' => 250,
                    'storage' => 220,
                ],
                3 => [                          // более 3 куб/м
                    'vivoz' => 600,
                    'vozvrat_less_3' => 600,
                    'vozvrat' => 600,
                    'storage_less_6' => 220,
                    'storage' => 200,
                ],
            ],
        ];
    }


}





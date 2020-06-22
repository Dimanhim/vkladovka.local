<?php

namespace app\models;
use app\models\CatsThing;
use app\models\User;
use Yii;
use yii\db\ActiveRecord;

class Storage extends ActiveRecord
{
    public $agree;

    public function rules()
    {
        return [
            [['term', 'agree', 'date', 'price_storage', 'price_total', 'payment_method'], 'integer'],
        ];
    }
    public static function tableName()
    {
        return 'storage';
    }
    /*public function attributes()
    {
        return [
            'id',
            'term',
            'date',
            'agree',
            'price_storage',
            'price_total',
            'payment_method',
        ];
    }*/
    public function attributeLabels()
    {
        return [
            'id',
            'term' => 'На какой срок',
            'date' => 'Когда удобно забрать',
            'agree' => 'Согласен',
            'price_storage' => 'Стоимость хранения',
            'price_total' => 'Итого к оплате',
            'payment_method' => 'Способ оплаты',
        ];
    }

}





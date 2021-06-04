<?php

namespace app\models;
use Yii;
use yii\db\ActiveRecord;

class CatsStorage extends ActiveRecord
{
    const COEF_STANDART = 1;
    const COEF_BIG = 1.5;
    const COEF_CONTAINER = 2;
    const COEF_FURNITURE = 3;


    public function rules()
    {
        return [
            [['name'], 'required', 'message' => 'Поле должно быть заполнено'],
            [['name', 'description'], 'string'],
            ['coef', 'safe'],
        ];
    }
    public function attributes()
    {
        return [
            'id',
            'name',
            'description',
            'coef',
        ];
    }
    public function attributeLabels()
    {
        return [
            'name' => 'Название',
            'description' => 'Описание',
            'coef' => 'Коэффициент для расчета хранения',
        ];
    }
    public function coefValue($coef)
    {
        return self::findOne($coef)->coef;
    }
    public function getCatsStorageArray()
    {
        $arr = [];
        if($model = self::find()->all()) {
            foreach($model as $value) {
                $arr[$value->id] = $value->name;
            }
        }
        return $arr;
    }
}




<?php

namespace app\models;
use app\models\CatsThing;
use app\models\User;
use Yii;
use yii\db\ActiveRecord;

class StorageItems extends ActiveRecord
{

    public function rules()
    {
        return [
            //[['name'], 'required', 'message' => 'Поле должно быть заполнено'],
            [['cat_storage_id', 'length', 'height', 'width', 'weight'], 'integer'],
            [['name'], 'string'],
        ];
    }
    /*public function attributes()
    {
        return [
            'id',
            'name',
            'cat_storage_id',
            'length',
            'height',
            'width',
            'weight',
        ];
    }*/
    public function attributeLabels()
    {
        return [
            'name' => 'Название',
            'cat_storage_id' => 'Категория вещи',
            'length' => 'Длина',
            'height' => 'Высота',
            'width' => 'Ширина',
            'weight' => 'Примерный вес',
        ];
    }
    public function getStorage()
    {
        return $this->hasMany(Storage::classname(), ['id' => 'cat_storage_id']);
    }

}





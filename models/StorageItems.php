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
            [['storage_id', 'cat_storage_id', 'length', 'height', 'width', 'weight', 'thing_id', 'is_proceess'], 'integer'],
            [['name'], 'string'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Название',
            'storage_id' => 'id хранения',
            'cat_storage_id' => 'Категория вещи',
            'thing_id' => 'Вещь',
            'length' => 'Длина',
            'height' => 'Высота',
            'width' => 'Ширина',
            'weight' => 'Примерный вес',
            'is_proceess' => 'Обработано',
        ];
    }
    public function getStorage()
    {
        return $this->hasOne(Storage::classname(), ['id' => 'storage_id']);
    }
    public function getCatStorage()
    {
        return $this->hasOne(CatsStorage::classname(), ['id' => 'cat_storage_id']);
    }
    public function getCatsStorage()
    {
        return $this->hasMany(CatsStorage::classname(), ['id' => 'cat_storage_id']);
    }
    public function getThing()
    {
        return $this->hasOne(Thing::className(), ['id' => 'thing_id']);
    }
    public function getInStorage()
    {
        if($this->thing) return true;
        return false;
    }


}





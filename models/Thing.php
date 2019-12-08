<?php

namespace app\models;
use app\models\CatsThing;
use app\models\User;
use Yii;
use yii\db\ActiveRecord;

class Thing extends ActiveRecord
{
    public $file;

    public function rules()
    {
        return [
            [['name'], 'required', 'message' => 'Поле должно быть заполнено'],
            [['barcode', 'cat', 'user'], 'integer'],
            [['name', 'description', 'img'], 'string'],
            [['file'], 'file'],
        ];
    }
    public function attributes()
    {
        return [
            'id',
            'barcode',
            'name',
            'description',
            'img',
            'cat',
            'user',
            'file',
        ];
    }
    public function attributeLabels()
    {
        return [
            'barcode' => 'Штрих-код',
            'name' => 'Название',
            'description' => 'Описание',
            'img' => 'Изображение',
            'cat' => 'Категория',
            'user' => 'Вещь пользователя',
        ];
    }
    public function getCategory(){
        return $this->hasOne(CatsThing::className(), ['id' => 'cat']);
    }
    public function getUsers(){
        return $this->hasOne(User::className(), ['id' => 'user']);
    }

}




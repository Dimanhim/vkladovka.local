<?php

namespace app\models;
use Yii;
use yii\db\ActiveRecord;

class CatsThing extends ActiveRecord
{
    public $file;

    public function rules()
    {
        return [
            [['name'], 'required', 'message' => 'Поле должно быть заполнено'],
            [['name', 'description', 'img'], 'string'],
            [['file'], 'file'],
        ];
    }
    public function attributes()
    {
        return [
            'id',
            'name',
            'description',
            'img',
            'file',
        ];
    }
    public function attributeLabels()
    {
        return [
            'name' => 'Название',
            'description' => 'Описание',
            'img' => 'Изображение',
        ];
    }
}



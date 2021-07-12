<?php

namespace app\models;
use Yii;
use yii\db\ActiveRecord;

class CatsThing extends ActiveRecord
{
    public $file;
    public $request;

    public function rules()
    {
        return [
            [['name'], 'required', 'message' => 'Поле должно быть заполнено'],
            [['name', 'description', 'img', 'request'], 'string'],
            [['parent_id'], 'integer'],
            [['file'], 'file'],
        ];
    }
    public function attributes()
    {
        return [
            'id',
            'name',
            'parent_id',
            'description',
            'img',
            'file',
        ];
    }
    public function attributeLabels()
    {
        return [
            'name' => 'Название',
            'parent_id' => 'Родительская категория',
            'description' => 'Описание',
            'img' => 'Изображение',
        ];
    }
}



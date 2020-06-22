<?php

namespace app\models;
use Yii;
use yii\db\ActiveRecord;

class CatsStorage extends ActiveRecord
{

    public function rules()
    {
        return [
            [['name'], 'required', 'message' => 'Поле должно быть заполнено'],
            [['name', 'description'], 'string'],
        ];
    }
    public function attributes()
    {
        return [
            'id',
            'name',
            'description',
        ];
    }
    public function attributeLabels()
    {
        return [
            'name' => 'Название',
            'description' => 'Описание',
        ];
    }
}




<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "loyalty".
 *
 * @property int $id
 * @property string $template
 * @property int $quan
 * @property int $vivoz
 * @property int $vozvrat_less_3
 * @property int $vozvrat
 * @property int $storage_less_6
 * @property int $storage
 */
class Loyalty extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'loyalty';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['quan', 'vivoz', 'vozvrat_less_3', 'vozvrat', 'storage_less_6', 'storage'], 'required'],
            [['quan', 'vivoz', 'vozvrat_less_3', 'vozvrat', 'storage_less_6', 'storage'], 'integer'],
            [['template'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'template' => 'Шаблон',
            'quan' => 'Количество',
            'vivoz' => 'Вывоз',
            'vozvrat_less_3' => 'Возврат, менее 3 мес.',
            'vozvrat' => 'Возврат более 3 мес.',
            'storage_less_6' => 'Хранение, менее 6 мес.',
            'storage' => 'Хранение',
        ];
    }

    public function getTemplatesArray()
    {
        return [
            'standart' => 'standart',
            'big' => 'big',
            'closed' => 'closed',
            'furniture' => 'furniture',
        ];
    }

    public function value($template, $quan)
    {
        $model = self::find()->where(['template' => $template, 'quan' => $quan])->one();
        //return $model->$value;
        return $model;
    }
}

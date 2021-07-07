<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "package".
 *
 * @property int $id
 * @property int $type
 * @property string $name
 * @property string $img
 * @property string $size
 * @property int $price_rent
 * @property int $price_sale
 * @property int $price_delivery
 */
class Package extends \yii\db\ActiveRecord
{
    public $types = [
        1 => 'Тара',
        2 => 'Упаковка',
        3 => 'Прочие расходники',
    ];
    public $file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'package';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'name'], 'required', 'message' => 'Заполните это поле'],
            [['type', 'price_rent', 'price_sale', 'price_delivery', 'is_rent'], 'integer'],
            [['name', 'img', 'size'], 'string', 'max' => 255],
            ['file', 'file'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Тип тары',
            'name' => 'Название',
            'img' => 'Изображение',
            'size' => 'Размер',
            'price_rent' => 'Цена аренды',
            'price_sale' => 'Цена продажи',
            'price_delivery' => 'Цена доставки',
            'is_rent' => 'Сдается в аренду',
        ];
    }
    public function getTypeName()
    {
        return $this->types[$this->type];
    }
    public function getUploadFile()
    {
        if($this->file = UploadedFile::getInstance($this, 'img')) {
            if($this->file->saveAs( Yii::getAlias('@package').'/img-'.$this->id.'.'.$this->file->extension))
                $this->img = 'img-'.$this->id.'.'. $this->file->extension;
            return $this->save();
        }
        return true;
    }
    public function getIsRent()
    {
        if($this->type == 2) return false;
        return $this->is_rent;
    }
}

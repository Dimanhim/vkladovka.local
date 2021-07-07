<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "package_order".
 *
 * @property int $id
 * @property int $user_id
 * @property string $phone
 * @property int $package_id
 * @property int $type
 * @property int $qty
 * @property int $total_price
 * @property int $created_at
 */
class PackageOrder extends \yii\db\ActiveRecord
{
    public $typeValues = [
        1 => 'Взять в аренду',
        2 => 'Купить',
    ];
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'package_order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'package_id', 'type', 'qty', 'total_price', 'created_at'], 'integer'],
            [['package_id', 'type', 'qty', 'total_price', 'created_at'], 'required'],
            [['phone'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'Пользователь',
            'phone' => 'Телефон',
            'package_id' => 'Тара/упаковка',
            'type' => 'Тип операции',
            'qty' => 'Количество',
            'total_price' => 'Итоговая цена',
            'created_at' => 'Дата создания',
        ];
    }
    public function getTypeName()
    {
        return $this->typeValues[$this->type];
    }
    public function getPackage()
    {
        return $this->hasOne(Package::className(), ['id' => 'package_id']);
    }
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}

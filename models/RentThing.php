<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rent_things".
 *
 * @property int $id
 * @property string $address
 * @property int $take_myself
 * @property string $delivery_time
 * @property int $term
 */
class RentThing extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rent_things';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['address'], 'string'],
            [['take_myself', 'term', 'thing_id', 'price'], 'integer'],
            [['delivery_time'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'address' => 'Address',
            'take_myself' => 'Заберу сам',
            'delivery_time' => 'Delivery Time',
            'term' => 'Term',
        ];
    }
    public function getThing()
    {
        return $this->hasOne(Thing::className(), ['id' => 'thing_id']);
    }
}

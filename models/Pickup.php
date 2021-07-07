<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transportation".
 *
 * @property int $id
 * @property int $user_id
 * @property string $phone
 * @property string $email
 * @property string $description
 * @property int $date_time
 * @property string $address
 * @property int $movers
 * @property int $lift
 * @property int $created_at
 */
class Pickup extends \yii\db\ActiveRecord
{
    public $pickup_date;
    public $pickup_time;
    public $agree;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pickup';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'date_time', 'movers', 'lift', 'seen', 'created_at', 'agree'], 'integer'],
            [['description'], 'string'],
            ['email', 'email', 'message' => 'Введите корректный E-mail адрес'],
            [['pickup_date', 'pickup_time'], 'safe'],
            [['description', 'address', 'pickup_date', 'pickup_time', 'phone', 'created_at'], 'required', 'message' => 'Заполните это поле'],
            [['agree'], 'required', 'message' => 'Для продолжения необходимо согласиться с условиями'],
            [['phone', 'email', 'address'], 'string', 'max' => 255],
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
            'email' => 'E-mail',
            'description' => 'Описание (в общих словах)',
            'date_time' => 'Когда удобно забрать:',
            'pickup_date' => 'Дата',
            'pickup_time' => 'Время',
            'address' => 'Адрес:',
            'movers' => 'Нужны грузчики',
            'lift' => 'Есть лифт',
            'agree' => 'Согласен',
            'created_at' => 'Дата создания',
        ];
    }
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}

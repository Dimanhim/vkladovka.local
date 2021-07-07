<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "return_things".
 *
 * @property int $id
 * @property string $things_ids
 * @property int $return_time
 * @property string $address
 * @property int $price
 * @property int $created_at
 */
class ReturnThing extends \yii\db\ActiveRecord
{
    public $act;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'return_things';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['things_ids'], 'required'],
            [['return_value', 'seen', 'user_id', 'returned', 'created_at'], 'integer'],
            [['things_ids', 'address'], 'string', 'max' => 255],
            [['return_time', 'price'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'things_ids' => 'Вещи',
            'return_time' => 'Дата возврата',
            'address' => 'Адрес',
            'price' => 'Стоимость',
            'return_value' => 'Вернуть в течение',
            'seen' => 'seen',
            'created_at' => 'Дата заявки',
            'user_id' => 'Пользователь',
            'returned' => 'Возвращено',
            'act' => 'Скачать акт возврата',
        ];
    }
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
    public function getThings()
    {
        //$ids = is_array($this->things_ids) ? explode(',', $this->things_ids) : $this->things_ids;
        $ids = explode(',', $this->things_ids);
        return Thing::find()->where(['in', 'id', $ids])->all();
    }
    public function getReturnValuesArray()
    {
        return [
            1 => '1 часа (800 руб.)',
            2 => '2-3 часов (от 350 руб. за каждую вещь)',
            3 => 'в течение дня (200 руб.)',
            10 => 'в другой день',
        ];
    }
    public function getReturnValue()
    {
        return $this->return_value ? $this->returnValuesArray[$this->return_value] : false;
    }
    public function getThingsIdsString()
    {
        if($this->things_ids && is_array($this->things_ids)) return implode(',', $this->things_ids);
        return false;
    }
    public function getReturnThings($cancel = false)
    {
        if($things = $this->things) {
            foreach($things as $thing) {
                $model = Thing::findOne($thing->id);
                $model->is_rent = $cancel ? 1 : 0;
                $model->save();
            }
        }
        return;
    }

}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rents".
 *
 * @property int $id
 * @property string $thing_ids
 * @property string $description
 * @property string $special_conditions
 * @property int $price
 */
class Rent extends \yii\db\ActiveRecord
{
    public $deposit;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rents';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            //[['thing_ids'], 'required'],
            [['description', 'special_conditions'], 'string'],
            [['price', 'deposit', 'user_id', 'seen', 'created_at'], 'integer'],
            [['thing_ids'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'thing_ids' => 'Вещи',
            'description' => 'Описание',
            'special_conditions' => 'Специальные условия',
            'price' => 'Стоимость',
            'user_id' => 'Пользователь',
            'created_at' => 'Дата создания'
        ];
    }
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
    public function getPrepareModel()
    {
        $str = '';
        if($this->thing_ids) {
            $str = implode(',', $this->thing_ids);
        }
        $this->thing_ids = $str;
    }
    public function getThings()
    {
        $ids = explode(',', $this->thing_ids);
        if($things = Thing::find()->where(['in', 'id', $ids])->all()) {
            return $things;
        }
        return false;
    }
    public function getValidateIsRent()
    {
        if($thing_ids = explode(',', $this->thing_ids)) {
            if($things = Thing::find()->where(['in', 'id', $thing_ids])->all()) {
                foreach($things as $thing) {
                    if($thing->is_rent) $rented_ids[] = $thing->name;
                }
                if(!empty($rented_ids)) {
                    return 'Вещи "'.implode(',', $rented_ids).'" уже арендованы. Пожалуйста, сдайте в аренду неарендованные вещи';
                }
            }
        }
        return false;
    }
    public function getRentThings()
    {
        if($thing_ids = explode(',', $this->thing_ids)) {
            if($things = Thing::find()->where(['in', 'id', $thing_ids])->all()) {
                foreach($things as $thing) {
                    $thing->is_rent = 1;
                    if($this->deposit) $thing->deposit = $this->deposit;
                    $thing->save();
                }
                return true;
            }
        }
        return false;
    }
}

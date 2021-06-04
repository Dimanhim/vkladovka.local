<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reviews".
 *
 * @property int $id
 * @property int $user_id
 * @property string $preview
 * @property string $content
 * @property int $created_at
 */
class Review extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reviews';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content'], 'required', 'message' => 'Заполните это поле'],
            [['user_id', 'created_at'], 'integer'],
            [['content'], 'string'],
            [['preview'], 'string', 'max' => 255],
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
            'preview' => 'Предисловие',
            'content' => 'Текст отзыва',
            'created_at' => 'Дата создания',
        ];
    }
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
    public function getCreatedAt()
    {
        $day = date('d', $this->created_at);
        $year = date('Y', $this->created_at);
        return $day.' '.$this->monthes.' '.$year;
    }
    public function getMonthes()
    {
        $array = [
            1 => 'января',
            2 => 'февраля',
            3 => 'марта',
            4 => 'апреля',
            5 => 'мая',
            6 => 'июня',
            7 => 'июля',
            8 => 'августа',
            9 => 'сентября',
            10 => 'октября',
            11 => 'ноября',
            12 => 'декабря',
        ];
        return $array[date('m', $this->created_at)];
    }
}

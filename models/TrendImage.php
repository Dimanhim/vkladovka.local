<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "trend_images".
 *
 * @property int $id
 * @property int $city_id
 * @property string $link
 */
class TrendImage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'trend_images';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['city_id', 'link'], 'required'],
            [['city_id'], 'integer'],
            [['link'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'city_id' => 'Город',
            'link' => 'Путь',
        ];
    }
    public function getCity()
    {
        return $this->hasOne(TrendCity::className(), ['id' => 'city_id']);
    }
    public function getFullPath()
    {
        return Yii::getAlias('@trend').'/'.$this->city->city_translit.'/'.$this->link;
    }
    public function getFullLink()
    {
        return Yii::getAlias('@trend_view_image').'/'.$this->city->city_translit.'/'.$this->link;
    }
}

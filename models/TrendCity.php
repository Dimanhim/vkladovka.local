<?php

namespace app\models;

use app\components\Translit;
use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "trend_cities".
 *
 * @property int $id
 * @property string $city
 */
class TrendCity extends \yii\db\ActiveRecord
{
    public $images_field;
    public $images_count;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'trend_cities';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['city', 'city_translit'], 'string', 'max' => 255],
            ['images_field', 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'city' => 'Город',
            'city_translit' => 'Город транслит',
            'images_field' => 'Изображения в галерее',
            'images_count' => 'Картинок в галерее',
        ];
    }
    public function getImages()
    {
        return TrendImage::findAll(['city_id' => $this->id]);
    }
    public function getUploadImages()
    {
        $images_dir = Yii::getAlias('@trend').'/'.$this->city_translit.'/';
        if (!file_exists($images_dir)) {

            mkdir($images_dir, 0777, true);
        }
        $images = UploadedFile::getInstances($this, 'images_field');
        foreach ($images as $key => $image) {
            //$image_path = '/web/upload/galleries/'.$this->id.'/'.$key.'.'.$image->extension;
            $file_name = mt_rand(1000000, 100000000).'.'.$image->extension;
            $image_path = $images_dir.$file_name;
            if ($image->saveAs($image_path)) {
                $img = new TrendImage();
                $img->city_id = $this->id;
                $img->link = $file_name;
                $img->save();
            }
        }
        return true;
    }
    public function getImagesCount()
    {
        return TrendImage::find()->where(['city_id' => $this->id])->count();
    }
    public function getCityTranslit()
    {
        $translit = new Translit();
        $this->city_translit = $translit->translate($this->city);
    }
}

<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "settings".
 *
 * @property int $id
 * @property int $bonus_partner
 */
class Settings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'settings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bonus_partner'], 'required'],
            [['bonus_partner'], 'integer'],
            [['organization_name', 'stock_adress', 'requisites', 'director_name', 'director_signature', 'director_stamp'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bonus_partner' => 'Стоимость бонус-партнера',
            'organization_name' => 'Индивидуальный предприниматель',
            'stock_adress' => 'Адрес склада',
            'requisites' => 'Реквизиты',
            'director_name' => 'Директор',
            'director_signature' => 'Подпись директора',
            'director_stamp' => 'Печать директора',
        ];
    }
    public function getUploadFiles()
    {
        if($director_signature = UploadedFile::getInstance($this, 'director_signature')) {
            $file_extension = explode('.', $director_signature)[1];
            $file_name = 'director_signature.'.$file_extension;
            $file_path = Yii::getAlias('@pdf').'/'.$file_name;
            $director_signature->saveAs($file_path);
            $this->director_signature = $file_name;
            if(!$this->save()) return false;
        }
        if($director_stamp = UploadedFile::getInstance($this, 'director_stamp')) {
            $file_extension = explode('.', $director_stamp)[1];
            $file_name = 'director_stamp.'.$file_extension;
            $file_path = Yii::getAlias('@pdf').'/'.$file_name;
            $director_stamp->saveAs($file_path);
            $this->director_stamp = $file_name;
            if(!$this->save()) return false;
        }
        return true;
    }
    public function monthString($timestamp)
    {
        $month = [
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
        return $month[date('n', $timestamp)];
    }
}

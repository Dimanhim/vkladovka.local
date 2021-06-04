<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;

/**
 * ContactForm is the model behind the contact form.
 */
class UserForm extends Model
{
    public $fio;
    public $passport;
    public $address;
    public $phone;
    public $email;
    public $file;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['fio', 'passport', 'phone', 'email'], 'required'],
            ['email', 'unique', 'targetClass' => User::className(),  'message' => 'Этот E-mail уже занят'],
            [['fio', 'passport', 'phone', 'address', 'email'], 'safe'],
            [['file'], 'file'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'fio' => 'Фамилия, имя, отчество',
            'passport' => 'Паспорт',
            'address' => 'Проживание (по паспорту)',
            'phone' => 'Номер телефона',
            'email' => 'Адрес электронной почты',
            'file' => 'Аватарка',
        ];
    }

}


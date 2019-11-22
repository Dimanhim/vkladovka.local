<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;

/**
 * ContactForm is the model behind the contact form.
 */
class FormRegistration extends Model
{
    public $fio;
    public $passport;
    public $address;
    public $phone;
    public $email;
    public $password;
    public $password_2;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['fio', 'passport', 'phone', 'email', 'password', 'password_2'], 'required'],
            ['email', 'unique', 'targetClass' => User::className(),  'message' => 'Этот E-mail уже занят'],
            [['fio', 'passport', 'phone', 'address', 'email', 'password', 'password_2'], 'safe'],
            ['password', 'validateUserPassword'],
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
            'password' => 'Пароль',
            'password_2' => 'Повторите пароль',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return bool whether the model passes validation
     */
    public function contact($email)
    {
        if ($this->validate()) {
            Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
                ->setReplyTo([$this->email => $this->name])
                ->setSubject($this->subject)
                ->setTextBody($this->body)
                ->send();

            return true;
        }
        return false;
    }
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }
    public function validateUserPassword($attribute)
    {
        if (strlen($this->password) < 8) {
            $this->addError($attribute, 'Слишком короткий пароль, придумайте другой.');
        }
    }
    public function sendEmailRegistration()
    {
        $subject = 'Vkladovka - Уведомление об успешной регистрации';
        return Yii::$app->mailer->compose('registration', ['name' => $this->fio, 'email' => $this->email, 'password' => $this->password])
            ->setFrom([Yii::$app->params['adminEmail'] => 'vKladovka'])
            ->setTo($this->email)
            ->setSubject($subject)
            ->setTextBody(' ')
            ->send();
    }

}


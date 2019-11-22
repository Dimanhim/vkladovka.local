<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class Forget extends Model
{
    public $fio;
    public $email;
    public $password;
    public $password_2;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['email'], 'required', 'message' => 'Введите E-mail, указанный при регистрации'],
            [['password'], 'required', 'message' => 'Введите пароль'],
            [['password_2'], 'required', 'message' => 'Введите пароль еще раз'],
        ];
    }
    public function attributeLabels() {
        return [
            'email' => 'E-mail',
            'password' => 'Пароль',
            'password_2' => 'Пароль еще раз',
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                //Yii::$app->session->setFlash('error', "Неверный пароль!");
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            //return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
        }
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->email);
        }

        return $this->_user;
    }
    public function sendEmailChangePassword()
    {
        $subject = 'Vkladovka - Уведомление о восстановлении пароля';
        return Yii::$app->mailer->compose('password', ['name' => $this->fio, 'email' => $this->email, 'password' => $this->password])
            ->setFrom([Yii::$app->params['adminEmail'] => 'vKladovka'])
            ->setTo($this->email)
            ->setSubject($subject)
            ->setTextBody(' ')
            ->send();
    }
}

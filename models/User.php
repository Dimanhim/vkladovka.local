<?php

namespace app\models;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{
    public $authKey;
    public $accessToken;

    /*private static $users = [
        '100' => [
            'id' => '100',
            'fio' => 'admin',
            'passport' => 'admin',
            'address' => 'admin',
            'phone' => '11111111111',
            'email' => 'demo@demo.demo',
            'password' => 'admin',
            'authKey' => 'test100key',
            'accessToken' => '100-token',
        ],
        '101' => [
            'id' => '101',
            'fio' => 'demo',
            'passport' => 'demo',
            'address' => 'admin',
            'phone' => '11111111111',
            'email' => 'demo@demo.demo',
            'password' => 'demo',
            'authKey' => 'test101key',
            'accessToken' => '101-token',
        ],
    ];*/

    public function attributeLabels()
    {
        return [
            'fio' => 'Фамилия, имя, отчество',
            'passport' => 'Паспорт',
            'address' => 'Проживание (по паспорту)',
            'phone' => 'Номер телефона',
            'email' => 'Адрес электронной почты',
        ];
    }
    public function attributes()
    {
        return [
            'id',
            'fio',
            'passport',
            'password',
            'address',
            'phone',
            'email',
            'role',
        ];
    }

    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
        //return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        /*foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;*/
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['email' => $username]);
        /*foreach (self::$users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }

        return null;*/
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return \Yii::$app->security->validatePassword($password, $this->password);
        //return $this->password === $password;
    }
}

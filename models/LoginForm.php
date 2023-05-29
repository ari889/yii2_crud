<?php

namespace app\models;

use yii\base\Model;

class LoginForm extends Model
{
    public $username;
    public $password;

    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            ['password', 'validatePassword'],
        ];
    }

    public function validatePassword($attribute, $params)
    {
        $user = User::findOne(['username' => $this->username]);
        if (!$user || !$user->validatePassword($this->password)) {
            $this->addError($attribute, 'Incorrect username or password.');
        }
    }

    public function login()
    {
        if ($this->validate()) {
            $user = User::findOne(['username' => $this->username]);
            return \Yii::$app->user->login($user);
        }
        return false;
    }
}

<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $password_hash
 * @property string $auth_key
 * @property string $created_at
 * @property string $updated_at
 *
 * @property PasswordResetToken[] $passwordResetTokens
 */
class User extends ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password_hash', 'auth_key'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['username', 'password_hash'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password_hash' => 'Password Hash',
            'auth_key' => 'Auth Key',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[PasswordResetTokens]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPasswordResetTokens()
    {
        return $this->hasMany(PasswordResetToken::class, ['user_id' => 'id']);
    }


    // Your existing code for the User model goes here

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    // Other methods and implementations of the IdentityInterface go here

    // Your existing code for the User model goes here

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        // Implement the logic to find a user based on the access token
        // This method is required for token-based authentication, you can customize it based on your application's requirements
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        // Implement the logic to retrieve the user's auth key
        // This method is required for cookie-based authentication, you can customize it based on your application's requirements
        throw new NotSupportedException('"getAuthKey" is not implemented.');
    }

    public function validateAuthKey($authKey)
    {
        // Implement the logic to validate the user's auth key
        // This method is required for cookie-based authentication, you can customize it based on your application's requirements
        throw new NotSupportedException('"validateAuthKey" is not implemented.');
    }
}

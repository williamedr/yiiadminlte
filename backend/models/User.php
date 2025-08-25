<?php

namespace backend\models;

use Yii;
use common\models\User as UserCommon;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $first_name
 * @property string $last_name
 * @property int $status
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string|null $verification_token
 * @property string $auth_key
 * @property int $created_at
 * @property int $updated_at
 */
class User extends \yii\db\ActiveRecord
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
            [['password_reset_token', 'verification_token'], 'default', 'value' => null],
            [['status'], 'default', 'value' => 1],
            [['username', 'email', 'first_name', 'last_name', 'password_hash', 'auth_key', 'created_at', 'updated_at'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'email'], 'string', 'max' => 80],
            [['first_name', 'last_name'], 'string', 'max' => 50],
            [['password_hash', 'password_reset_token', 'verification_token'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
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
            'email' => 'Email',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'status' => 'Status',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'verification_token' => 'Verification Token',
            'auth_key' => 'Auth Key',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * column status ENUM value labels
     * @return string[]
     */
    public static function optsStatus()
    {
        return [
            UserCommon::STATUS_ACTIVE => 'active',
            UserCommon::STATUS_INACTIVE => 'inactive',
        ];
    }


    /**
     * column status ENUM value labels
     * @return string[]
     */
    public static function optsRoles()
    {
        return [
            'admin' => 'Admin',
            'user' => 'User',
        ];
    }


}

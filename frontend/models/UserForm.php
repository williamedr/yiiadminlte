<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use backend\models\User;

/**
 * User form
 */
class UserForm extends Model
{
    public $username;
    public $email;
    public $first_name;
    public $last_name;
    public $password;
    // public $status;
    // public $role;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],

            ['first_name', 'trim'],
            ['first_name', 'required'],

            ['last_name', 'trim'],
            ['last_name', 'required'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function saveUser()
    {
        if (!$this->validate()) {
            return false;
        }

        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        // $user->status = $this->status;
        $user->status = 1;

        $user->setPassword($this->password);
        $user->generateAuthKey();

        if ($user->save()) {
            $auth = Yii::$app->authManager;
            $userRole = $auth->getRole('user');
            $auth->assign($userRole, $user->getId());

            return true;

        } else {
            return false;
        }

    }

}

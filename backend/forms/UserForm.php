<?php

namespace backend\forms;

use common\models\User;

/**
 * User model
 *
 * @property string $username
 * @property string $email
 * @property string $password write-only password
 */
class UserForm
{
    public $username;
    public $email;
    public $password;

    public function __construct(User $user)
    {
        $this->username = $user->username;
        $this->email = $user->email;
        $this->password = $user->password;
    }
}
<?php

namespace backend\repositories;

use RuntimeException;
use common\models\User;

class UserRepository
{
    public function save(User $user): void
    {
        if (!$user->save()) {
            throw new RuntimeException('Saving error.');
        }
    }
}
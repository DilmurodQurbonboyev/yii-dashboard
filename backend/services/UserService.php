<?php

namespace backend\services;

use Yii;
use common\models\User;
use yii\base\Exception;
use backend\repositories\UserRepository;

class UserService
{
    private UserRepository $userRepository;
    
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @throws Exception
     */
    public function create($request): User
    {
        $user = User::create(
            $request['user_id'],
            $request['email'],
            Yii::$app->security->generatePasswordHash($request['pin'])
        );
        $this->userRepository->save($user);
        return $user;
    }
}
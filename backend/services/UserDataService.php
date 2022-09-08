<?php

namespace backend\services;

use backend\models\UserData;
use backend\repositories\UserDataRepository;

class UserDataService
{
    private UserDataRepository $userDataRepository;

    public function __construct(UserDataRepository $userDataRepository)
    {
        $this->userDataRepository = $userDataRepository;
    }

    public function create($request, $user): UserData
    {
        return $this->userDataRepository->save($request, $user);
    }
}
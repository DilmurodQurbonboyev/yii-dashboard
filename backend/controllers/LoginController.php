<?php

namespace backend\controllers;

use Yii;
use yii\web\Response;
use yii\web\Controller;
use common\models\User;
use yii\httpclient\Exception;
use backend\models\UserData;
use backend\services\UserService;
use yii\base\InvalidConfigException;
use backend\services\UserDataService;
use backend\services\OneIdLoginService;

class LoginController extends Controller
{
    private UserService $userService;
    private UserDataService $userDataService;
    private OneIdLoginService $oneIdLoginService;

    public function __construct(
        $id,
        $module,
        OneIdLoginService $oneIdLoginService,
        UserService $userService,
        UserDataService $userDataService,
        $config = []
    )
    {
        parent::__construct($id, $module, $config);
        $this->oneIdLoginService = $oneIdLoginService;
        $this->userDataService = $userDataService;
        $this->userService = $userService;
    }


    public function actionOneId(): Response
    {
        return $this->redirect($this->oneIdLoginService->getOneId());
    }

    /**
     * @throws InvalidConfigException
     * @throws Exception
     * @throws \yii\base\Exception
     */
    public function actionCheck(): Response
    {
        $accessToken = $this->oneIdLoginService->getAccessToken($this->request);
        $responseData = $this->oneIdLoginService->sendAccessToken($accessToken);
        $userInfo = json_decode($responseData, true);

        $userData = UserData::find()
            ->where([
                'user_id' => $userInfo['user_id'],
                'pin' => $userInfo['pin']
            ])
            ->one();
        if ($userData) {
            $user = User::find()
                ->andWhere([
                    'username' => $userData['user_id'],
                ])->one();
        } else {
            $user = $this->userService->create($userInfo);
            $this->userDataService->create($userInfo, $user);
        }

        Yii::$app->user->login($user, 3600 * 100 * 10);
        return $this->redirect(['site/index']);
    }
}
<?php

namespace backend\controllers;

use OneIdLoginService;
use yii\web\Controller;
use yii\web\Request;
use yii\web\Response;

class LoginController extends Controller
{
    private OneIdLoginService $oneIdLoginService;

    public function __construct(
        $id,
        $module,
        OneIdLoginService $oneIdLoginService,
        $config = []
    )
    {
        $this->oneIdLoginService = $oneIdLoginService;
        parent::__construct($id, $module, $config);
    }

    public function actionOneId(): Response
    {
        return $this->redirect($this->oneIdLoginService->getOneId());
    }

    public function actionCheck(Request $request)
    {
        $accessToken = $this->oneIdLoginService->getAccessToken($request)['access_token'];
        $responseData = $this->oneIdLoginService->sendAccessToken($accessToken);
        $userInfo = json_decode($responseData, true);
        echo '<pre>';
        var_dump($userInfo);
        die;
    }
}
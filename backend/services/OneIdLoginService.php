<?php

use yii\base\InvalidConfigException;
use yii\httpclient\Client;

class OneIdLoginService
{
    const ONEID_CLIENT_ID = "test.epmty.uz";
    const ONEID_CLIENT_SECRET = "As9d1Gu6fa/0q5yw+Zwfgw==";

    public string $authorizationUrl;
    public string $clientId;
    public string $responseType;
    public string $redirectUrl;
    public string $scope;
    public string $clientSecret;
    public string $state;

    public function __construct()
    {
        $this->authorizationUrl = "https://sso.egov.uz/sso/oauth/Authorization.do";
        $this->clientId = self::ONEID_CLIENT_ID;
        $this->responseType = "one_code";
        $this->redirectUrl = 'ss';
        $this->scope = 'legal';
        $this->clientSecret = self::ONEID_CLIENT_SECRET;
        $this->state = 'testState';
    }

    public function getOneId(): string
    {
        return $this->authorizationUrl . '?' . http_build_query([
                'response_type' => $this->responseType,
                'client_id' => $this->clientId,
                'redirect_uri' => $this->redirectUrl,
                'scope' => $this->scope,
                'state' => $this->state,
            ]);
    }

    /**
     * @throws \yii\httpclient\Exception
     * @throws InvalidConfigException
     */
    public function getAccessToken($request): bool|string
    {
        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('POST')
            ->setUrl($this->authorizationUrl)
            ->setData([
                'grant_type' => 'one_authorization_code',
                'client_id' => $this->clientId,
                'client_secret' => $this->clientSecret,
                'redirect_uri' => $this->redirectUrl,
                'code' => $request->query('code'),
            ])
            ->send();
        if ($response->isOk) {
            return $response->content;
        }
        return true;
    }

    /**
     * @throws \yii\httpclient\Exception
     * @throws InvalidConfigException
     */
    public function sendAccessToken($accessToken): bool|string
    {
        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('POST')
            ->setUrl($this->authorizationUrl)
            ->setData([
                'grant_type' => 'one_access_token_identify',
                'client_id' => $this->clientId,
                'client_secret' => $this->clientSecret,
                'access_token' => $accessToken,
                'scope' => $this->scope
            ])
            ->send();
        if ($response->isOk) {
            return $response->content;
        }
        return true;
    }
}
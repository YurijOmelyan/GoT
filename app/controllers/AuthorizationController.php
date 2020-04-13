<?php

include_once ROOT . AUTHORIZATION_MODEL;

class AuthorizationController
{
    private $userData;
    public function __construct($data)
    {
        $this->userData=array_pop($data);
    }

    public function actionAuthorization()
    {
        $authorizationObject = new Authorization($this->userData);
        $authorization = $authorizationObject->runAuthorization();
        echo $authorization;

    }
}
<?php

include_once ROOT . PROFILE_MODEL;

class ProfileController
{
    private $data;

    public function __construct($userData)
    {
        $this->data = array_pop($userData);
    }

    public function actionProfile()
    {
        $profileObject = new Profile($this->data);
        $result = $profileObject->run();
        echo $result;
    }
}
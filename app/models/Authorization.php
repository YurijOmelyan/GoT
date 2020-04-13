<?php


class Authorization
{
    private $user;
    private $response = [];
    private $userBase;

    public function __construct($userData)
    {
        $this->user = $userData;
        $this->userBase = $this->loadUserDatabase();
    }


    public function runAuthorization()
    {
        //password and mail verification by template
        if (!$this->isValidatePasswordAndMail($this->user)) {
            return json_encode($this->response);
        }

        //user verification in the database
        if ($this->isThisUserNotInDatabase($this->user, $this->userBase)) {
            $this->addNewUserToDatabase($this->user);
            return json_encode($this->response);
        }

        //verification of user password with the database
        if ($this->isPasswordMatchThisUser($this->user, $this->userBase)) {
            $this->getProfileForm();
        } else {
            $this->setResponse('pass', 'The password you entered does not match this user');
        }

        return json_encode($this->response);
    }

    /*
     * validation of password and login
     */
    private function isValidatePasswordAndMail($user)
    {
        $check = true;
        if (!filter_var($user['mail'], FILTER_VALIDATE_EMAIL)) {
            $this->setResponse('mail', 'Mail does not match the template');
            $check = false;
        }

        if (mb_strlen($user['pass']) < 8 || mb_strlen($user['pass']) > 16) {
            $this->setResponse('pass', 'Password must be between 6 and 16 characters');
            $check = false;
        }
        return $check;
    }

    /*
     * set server response
     */
    private function setResponse($key, $value)
    {
        $this->response[$key] = $value;
    }

    /*
     *verification of user password with the database
     */
    private function isPasswordMatchThisUser($user, $userBase)
    {
        return password_verify($user['pass'], $userBase[$user['mail']]['pass']);
    }

    /*
     * user verification in the database
     */
    private function isThisUserNotInDatabase($user, $userBase)
    {
        return !($userBase && array_key_exists($user['mail'], $userBase));
    }

    /*
     * return profile form
     */
    function getProfileForm()
    {
        $_SESSION['user'] = $this->user;
        $this->setResponse('form', PROFILE_FORM);
    }

    /*
     * add a new user to the database
     */
    private function addNewUserToDatabase($user)
    {
        $this->getProfileForm();
    }

    /*
     * loading database
     */
    private function loadUserDatabase()
    {
        if (!file_exists(ROOT . USER_BASE)) {
            return [];
        }

        $jsonResult = file_get_contents(ROOT . USER_BASE);
        return json_decode($jsonResult, true);
    }

}

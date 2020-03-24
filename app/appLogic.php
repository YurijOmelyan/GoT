<?php
include_once 'functions.php';

class appLogic
{

    public function getForm()
    {
        define('PATH', 'public/form/');
        define('PROFILE_FORM', PATH . 'profileForm.php');
        define('LOGIN_FORM', PATH . 'loginForm.php');

        if (isset($_POST['profileButton']) && isset($_SESSION['user']) && isVerifiedProfileData()) {
            $this->setProfileData();
            saveUserProfile();
        }

        if (isset($_POST['loginButton']) && isAuthorizationCompleted()) {
            $this->setRegistrationData();
        }

        include(isset($_SESSION['user']) ? PROFILE_FORM : LOGIN_FORM);

    }

    private function setRegistrationData()
    {
        $_SESSION['user']['mail'] = $_POST['email'];
        $_SESSION['user']['pass'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
    }

    private function setProfileData()
    {
        $_SESSION['user']['userName'] = $_POST['userName'];
        $_SESSION['user']['house'] = $_POST['house'];
        $_SESSION['user']['aboutMe'] = $_POST['aboutMe'];

    }

}
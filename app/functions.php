<?php
define('PATH_BASE', 'base/');

/*
 * verification of registration form data
 */
function isAuthorizationCompleted()
{
    if (!isset($_POST['email']) && !isset($_POST['password'])) {
        return false;
    }

    $mail = $_POST['email'];
    $pass = $_POST['password'];
    return isDataMatchesPattern($mail, $pass) && isUserNotInDatabase($mail);
}

/*
 * validation of data
 */
function isDataMatchesPattern($mail, $pass)
{
    $check = true;

    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['errorEmail'] = $mail;
        $check = false;
    }
    if (mb_strlen($pass) < 8 || mb_strlen($pass) > 16) {
        $_SESSION['errorPass'] = $pass;
        $check = false;
    }
    return $check;
}

/*
 * user search in the database
 */
function isUserNotInDatabase($mail)
{
    $check = true;
    $file = md5($mail);
    if (file_exists(PATH_BASE . $file)) {
        $json = file_get_contents(PATH_BASE . $file);
        $user = json_decode($json, true);

        if ($mail == $user['mail']) {
            $_SESSION['userFound'] = $mail;
            $check = false;
        }
    }
    return $check;
}

/*
 * validating user profile form data
 */
function isVerifiedProfileData()
{
    $check = true;
    if (!isset($_POST['userName']) || empty($_POST['userName'])) {
        $_SESSION['errorUserName'] = 'errorUserName';
        $check = false;
    }

    if (!isset($_POST['house']) || empty($_POST['house'])) {
        $_SESSION['errorSelectHouse'] = 'errorSelectHouse';
        $check = false;
    }

    if (!isset($_POST['aboutMe']) || empty($_POST['aboutMe'])) {
        $_SESSION['errorAboutMe'] = 'errorAboutMe';
        $check = false;
    }

    return $check;
}

/*
 * save user data to the database
 */
function saveUserProfile()
{
    $json = json_encode($_SESSION['user']);
    if (!file_exists(PATH_BASE)) {
        mkdir(PATH_BASE);
        chmod(PATH_BASE, 0777);
    }
    $mail = $_SESSION['user']['mail'];
    $test = file_put_contents(PATH_BASE . md5($mail), $json);
    chmod(PATH_BASE . md5($mail), 0666);
    if ($test) {
        $_SESSION['success'] = 'success';
    }
}
<?php


if (isset($_POST['formLogining'])) {
    if (!empty($mail = $_POST['email']) && !empty($pass = $_POST['password'])) {
        if (checkData(htmlspecialchars($mail), htmlspecialchars($pass))) {
            if (!isUserInDatabase($mail, $pass)) {
                $_SESSION['saveForm'] = 'saveForm';
                $_SESSION['mail'] = $mail;
                $_SESSION['pass'] = $pass;
            }
        }
    }
}

if (isset($_POST['formSave'])) {
    $error = 0;
    if (isset($_POST['userName']) && !empty($_POST['userName'])) {
        $userName = $_POST['userName'];
    } else {
        $_SESSION['errorUserName'] = 'errorUserName';
        $error = 1;
    }
    if (isset($_POST['house']) && !empty($_POST['house'])) {
        $house = $_POST['house'];
    } else {
        $_SESSION['errorSelectHouse'] = 'errorSelectHouse';
        $error = 1;
    }
    if (isset($_POST['aboutMe']) && !empty($_POST['aboutMe'])) {
        $aboutMe = $_POST['aboutMe'];
    } else {
        $_SESSION['errorAboutMe'] = 'errorAboutMe';
        $error = 1;
    }

    if ($error === 0) {
        $userName = $_POST['userName'];
        $aboutMe = $_POST['aboutMe'];

        $arrUser['mail'] = $_SESSION['mail'];
        $arrUser['pass'] = password_hash($_SESSION['mail'], PASSWORD_DEFAULT);
        $arrUser['username'] = $userName;
        $arrUser['house'] = $house;
        $arrUser['hobby'] = $aboutMe;
        $json = json_encode($arrUser);
        $dir = 'base/';
        if (!file_exists($dir)) {
            mkdir($dir);
            chmod($dir, 0777);
        }

        file_put_contents($dir . md5($_SESSION['mail']), $json);
        chmod($dir . md5($_SESSION['mail']), 0777);
        $_SESSION['success'] = 'success';
    }
}

if (isset($_SESSION['saveForm'])) {
    include 'save.php';
} else {
    include 'logining.php';
}

function checkData($mail, $pass)
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

function isUserInDatabase($mail)
{
    $dir = 'base/';
    $file = md5($mail);
    if (file_exists($dir . $file)) {
        $json = file_get_contents($dir . $file);
        $user = json_decode($json, true);

        if ($mail == $user['mail']) {
            $_SESSION['userFound'] = $mail;
            return true;
        }
    }
    return false;
}

?>
<?php

define('PATH_APP', '/app/');
define('ROOTS', PATH_APP . 'config/roots.php');

define('PATH_CONTROLLERS', PATH_APP . 'controllers/');
define('PATH_MODELS', PATH_APP . 'models/');

define('FORM_CONTROLLER', PATH_CONTROLLERS . 'FormController.php');
define('FORM_MODEL', PATH_MODELS . 'Form.php');

define('AUTHORIZATION_CONTROLLER', PATH_CONTROLLERS . 'AuthorizationController.php');
define('AUTHORIZATION_MODEL', PATH_MODELS . 'Authorization.php');

define('COMPONENT_CONTROLLER', PATH_CONTROLLERS . 'ComponentController.php');
define('COMPONENT_MODEL', PATH_MODELS . 'Component.php');

define('PROFILE_CONTROLLER', PATH_CONTROLLERS . 'ProfileController.php');
define('PROFILE_MODEL', PATH_MODELS . 'Profile.php');

define('PATH_BASE', '/base/');
define('USER_BASE', PATH_BASE . 'userBase.json');

define('PATH_FORM', '/public/form/');
define('VIEWS', PATH_APP . 'views/');

define('PATH_IMAGES', '/public/images/house/');
define('LIST_HOUSES', 'imageList.json');

define('AUTH_FORM','authForm');
define('PROFILE_FORM','profileForm');
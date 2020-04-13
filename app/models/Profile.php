<?php


class Profile
{
    private $response = [];
    private $userData;
    private $listHouses;

    public function __construct($data)
    {
        $this->userData = $data;

        $this->listHouses = json_decode(file_get_contents(ROOT . PATH_IMAGES . LIST_HOUSES), true);
    }

    public function run()
    {
        if (!isset($_SESSION['user'])) {
            $this->setResponse('form', AUTH_FORM);
            return json_encode($this->response);
        }

        if (!$this->isVerifiedProfileData($this->userData)) {
            return json_encode($this->response);
        }

        $this->saveUserProfile($this->userData);

        return json_encode($this->response);
    }

    /*
     * validating user profile form data
     */
    private function isVerifiedProfileData($userData)
    {
        $check = true;

        if (!array_key_exists('userName', $userData) || mb_strlen($userData['userName']) === 0) {
            $this->setResponse('userName', 'Enter the correct username');
            $check = false;
        }

        $keysHouse = array_keys($this->listHouses);
        if (!array_key_exists('house', $userData)
            || empty($userData['house'])
            || !isset($keysHouse[$userData['house'] - 1])) {
            $this->setResponse('house', 'Choose a house from the list');
            $check = false;
        }

        if (!array_key_exists('aboutMe', $userData) || mb_strlen($userData['aboutMe']) === 0) {
            $this->setResponse('aboutMe', 'Enter your hobby');
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
     * save user data to the database
     */
    private function saveUserProfile($userData)
    {
        if (!file_exists(ROOT . PATH_BASE)) {
            mkdir(ROOT . PATH_BASE);
            chmod(ROOT . PATH_BASE, 0777);
        }

        $userList = $this->getListUser();

        $data = [
            'pass' => password_hash($_SESSION['user']['pass'], PASSWORD_DEFAULT),
            'name' => $userData['userName'],
            'house' => $userData['house'],
            'aboutMe' => $userData['aboutMe']
        ];

        $userList[$_SESSION['user']['mail']] = $data;

        if (file_put_contents(ROOT . USER_BASE, json_encode($userList))) {
            $this->setResponse('result', 'successfully');
            session_destroy();
        } else {
            $this->setResponse('result', 'not successful');
        }
    }

    private function getListUser()
    {
        if (!file_exists(ROOT . USER_BASE)) {
            return [];
        }
        $json = file_get_contents(ROOT . USER_BASE);
        return json_decode($json, true);
    }
}
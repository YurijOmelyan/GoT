<?php

include_once ROOT . '/app/constants.php';
include_once ROOT . PATH_CONTROLLERS . 'ErrorController.php';


class Router
{
    private $routes;
    private $post;

    public function __construct($post)
    {
        $this->routes = include(ROOT . ROOTS);
        $this->post = $post;
    }

    /*
     * error output
     */
    private function setError($codeError)
    {
        $error = new ErrorController(['Router' => $codeError]);
        $error->run();
    }

    public function run()
    {
        // is there a post request
        if (!$this->post) {
            $this->setError(1);
        }

        //check post request with routes
        $keyPost = array_key_first($this->post);
        if (!array_key_exists($keyPost, $this->routes)) {
            $this->setError(2);
        }

        //form the name of the controller
        $controllerName = array_key_first($this->post) . 'Controller';
        $controllerName = ucfirst($controllerName);

        //check the value of the request post
        if (!in_array($this->post[$keyPost], $this->routes[$keyPost])) {
            $this->setError(3);
        }

        //form the method name
        $actionName = 'action' . ucfirst($keyPost);

        //check the presence of the controller file and connect it
        $controllerFile = ROOT . PATH_CONTROLLERS . $controllerName . '.php';
        if (!file_exists($controllerFile)) {
            $this->setError(4);
        }
        include_once($controllerFile);

        //create a controller object and call the method
        $controllerObject = new $controllerName($this->post);
        $controllerObject->$actionName();
    }
}

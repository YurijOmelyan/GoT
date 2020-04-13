<?php

class Form
{

    private $nameForm;
    private $response = [];

    public function __construct($nameForm)
    {
        $this->nameForm = $nameForm;
    }

    private function setError($codeError)
    {
        $error = new ErrorController(['Form' => $codeError]);
        $error->run();
    }

    /*
   * set server response
   */
    private function setResponse($key, $value)
    {
        $this->response[$key] = $value;
    }

    public function getForm()
    {
        $fileForm = ROOT . PATH_FORM . $this->nameForm . '.php';
        if (!file_exists($fileForm)) {
            $this->setError(1);
        }
        $this->setResponse('form', file_get_contents($fileForm));

        return json_encode($this->response);
    }
}
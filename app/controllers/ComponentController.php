<?php

include_once ROOT . COMPONENT_MODEL;

class ComponentController
{
    private $componentType;

    public function __construct($data)
    {
        $this->componentType = array_pop($data);
    }

    private function setError($codeError)
    {
        $error = new ErrorController(['ComponentController' => $codeError]);
        $error->run();
    }

    public function actionComponent()
    {
        $componentObject = new Component();
        $fileName = $this->componentType . '.php';

        $listHouses = $componentObject->getComponent();

        if (!include_once ROOT . VIEWS . $fileName) {
            $this->setError(1);
        }
    }
}
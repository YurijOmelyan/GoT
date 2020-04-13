<?php

include_once ROOT . FORM_MODEL;

class FormController
{

    private $data;

    public function __construct($post)
    {
        $this->data = array_shift($post);
    }

    public function actionForm()
    {
        $formObject = new Form($this->data);
        $form = $formObject->getForm();
        echo $form;
    }
}
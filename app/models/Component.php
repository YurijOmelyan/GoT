<?php


class Component
{
    private $json;
    private $listHouses;

    public function __construct()
    {
        $this->json = file_get_contents(ROOT . PATH_IMAGES . LIST_HOUSES);
        $this->listHouses = json_decode($this->json, true);
    }

    public function getComponent()
    {
        return $this->listHouses;
    }
}
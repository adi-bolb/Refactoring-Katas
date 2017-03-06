<?php

class Player{
    private $name;
    private $points;

    public function __construct($name, $points)
    {
        $this->name = $name;
        $this->points = $points;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getPoints()
    {
        return $this->points;
    }

    public function setPoints($points)
    {
        $this->points = $points;
    }
}
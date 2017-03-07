<?php
/**
 * Created by PhpStorm.
 * User: adi
 * Date: 3/7/17
 * Time: 10:25 AM
 */

class BuildPlayer{
    const DEFAULT_NUMBER_OF_POINTS = 0;
    protected $name;
    protected $points = self::DEFAULT_NUMBER_OF_POINTS;

    public function withDefaults(){

    }

    public function withName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function withPoints($points)
    {
        $this->points = $points;
        return $this;
    }

    public function build(){
        return new Player($this->name, $this->points);
    }
}
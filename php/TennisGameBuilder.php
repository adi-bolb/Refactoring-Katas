<?php

/**
 * Created by PhpStorm.
 * User: adi
 * Date: 3/7/17
 * Time: 10:35 AM
 */
abstract class TennisGameBuilder
{
    protected $playerOneName;
    protected $playerTwoName;

    function withPlayerOneName($playerOneName){
        $this->playerOneName = $playerOneName;
        return $this;
    }

    function withPlayerTwoName($playerTwoName){
        $this->playerTwoName = $playerTwoName;
        return $this;
    }

    abstract function build();

    protected function getBuildPlayer()
    {
        return new BuildPlayer();
    }
}
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
    protected $tennisGameScore;


    function withPlayerOneName($playerOneName){
        $this->playerOneName = $playerOneName;
        return $this;
    }

    function withPlayerTwoName($playerTwoName){
        $this->playerTwoName = $playerTwoName;
        return $this;
    }

    public function withTennisGameScore()
    {
        $this->tennisGameScore = new TennisGameScore();
        return $this;
    }

    abstract function build();

    protected function getBuildPlayer()
    {
        return new BuildPlayer();
    }


}
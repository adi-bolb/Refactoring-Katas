<?php
require_once './TennisGame.php';
require 'Player.php';
require 'BuildPlayer.php';
require 'SingleTennisGameScore.php';

class TennisGame1 implements TennisGame
{

    private $playerOne;
    private $playerTwo;

    private $tennisGameScore;

    public function TennisGame1($playerOne, $playerTwo, $tennisGameScore)
    {
        $this->playerOne = $playerOne;
        $this->playerTwo = $playerTwo;
        $this->tennisGameScore = $tennisGameScore;
    }

    public function wonPoint($playerName)
    {
        $player = $this->buildPlayerWithNameAndDefaultPoints($playerName);
        $this->incrementPointsForPlayer($player);
    }

    function incrementPointsForPlayer($player){
        $incrementedPoints = $player->getPoints() + 1;
        $player->setPoints($incrementedPoints);
    }

    public function getGameScore(){
        $playerOnePoints = $this->getPlayerOne()->getPoints();
        $playerTwoPoints = $this->getPlayerTwo()->getPoints();

        return $this->tennisGameScore->computeScore($playerOnePoints, $playerTwoPoints);
    }

    private function buildPlayerWithNameAndDefaultPoints($playerName)
    {
        if($this->getPlayerOne()->getName() == $playerName){
            return $this->getPlayerOne();
        }
        return $this->getPlayerTwo();
    }

    protected function getPlayerTwo()
    {
        return $this->playerTwo;
    }

    protected function getPlayerOne()
    {
        return $this->playerOne;
    }


}









































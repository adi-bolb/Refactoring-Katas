<?php
require_once './TennisGame.php';
require 'Player.php';

class TennisGame1 implements TennisGame
{

    const GAME_SCORE_NO_POINTS = 0;
    const GAME_SCORE_ONE_POINT = 1;
    const GAME_SCORE_TWO_POINTS = 2;
    const GAME_SCORE_THREE_POINTS = 3;
    const GAME_SCORE_FOUR_POINTS = 4;
    const GAME_SCORE_SEPARATOR = "-";
    const GAME_SCORE_MESSAGE_ADVANTAGE = "Advantage";
    const GAME_SCORE_MESSAGE_SPACE = " ";
    const GAME_SCORE_MESSAGE_WINNER = "Win for";
    const GAME_SCORE_ALL = "All";
    const GAME_SCORE_LOVE = "Love";
    const GAME_SCORE_FIFTEEN = "Fifteen";
    const GAME_SCORE_THIRTY = "Thirty";
    const GAME_SCORE_FORTY = "Forty";
    const GAME_SCORE_DEUCE = "Deuce";

    private $playerOne;
    private $playerTwo;

    public function TennisGame1($playerOneName, $playerTwoName)
    {
        $this->playerOne = new Player($playerOneName, 0);
        $this->playerTwo = new Player($playerTwoName, 0);
    }

    public function wonPoint($playerName)
    {
        $this->incrementScoreForPlayerOne($playerName);
        $this->incrementScoreForPlayerTwo($playerName);
    }

    private function incrementScoreForPlayerOne($playerName){
        if ($playerName == $this->playerOne->getName()) {

            $incrementedPoints = $this->playerOne->getPoints() + 1;
            $this->playerOne->setPoints($incrementedPoints);
        }
    }

    private function incrementScoreForPlayerTwo($playerName)
    {
        if ($playerName == $this->playerTwo->getName()) {
            $incrementedValue = $this->playerTwo->getPoints() + 1;
            $this->playerTwo->setPoints($incrementedValue);
        }
    }

    public function getGameScore(){
        $gameScore = "";
        if ($this->playerOne->getPoints()==$this->playerTwo->getPoints())
        {
            switch ($this->playerOne->getPoints())
            {
                case self::GAME_SCORE_NO_POINTS:
                    $gameScore = self::GAME_SCORE_LOVE . self::GAME_SCORE_SEPARATOR . self::GAME_SCORE_ALL;
                    break;
                case self::GAME_SCORE_ONE_POINT:
                    $gameScore = self::GAME_SCORE_FIFTEEN .self::GAME_SCORE_SEPARATOR. self::GAME_SCORE_ALL;
                    break;
                case self::GAME_SCORE_TWO_POINTS:
                    $gameScore = self::GAME_SCORE_THIRTY .self::GAME_SCORE_SEPARATOR. self::GAME_SCORE_ALL;
                    break;
                case self::GAME_SCORE_THREE_POINTS:
                    $gameScore = self::GAME_SCORE_FORTY .self::GAME_SCORE_SEPARATOR. self::GAME_SCORE_ALL;
                    break;
                default:
                    $gameScore = self::GAME_SCORE_DEUCE;
                    break;
            }
        }
        else if ($this->playerOne->getPoints()>=self::GAME_SCORE_FOUR_POINTS
            || $this->playerTwo->getPoints()>=self::GAME_SCORE_FOUR_POINTS)
        {

            $minusResult = $this->playerOne->getPoints()- $this->playerTwo->getPoints();
            if ($minusResult==1) $gameScore = self::GAME_SCORE_MESSAGE_ADVANTAGE . self::GAME_SCORE_MESSAGE_SPACE . "player1";
            else if ($minusResult ==-1) $gameScore = self::GAME_SCORE_MESSAGE_ADVANTAGE . self::GAME_SCORE_MESSAGE_SPACE. "player2";
            else if ($minusResult>=2) $gameScore = self::GAME_SCORE_MESSAGE_WINNER . self::GAME_SCORE_MESSAGE_SPACE . "player1";
            else $gameScore = self::GAME_SCORE_MESSAGE_WINNER . self::GAME_SCORE_MESSAGE_SPACE . "player2";
        }
        else
        {
            for ($i=1; $i<3; $i++)
            {
                if ($i==1) $tempScore = $this->playerOne->getPoints();
                else { $gameScore.= self::GAME_SCORE_SEPARATOR; $tempScore = $this->playerTwo->getPoints();}
                switch($tempScore)
                {
                    case self::GAME_SCORE_NO_POINTS:
                        $gameScore.= self::GAME_SCORE_LOVE;
                        break;
                    case self::GAME_SCORE_ONE_POINT:
                        $gameScore.= self::GAME_SCORE_FIFTEEN;
                        break;
                    case self::GAME_SCORE_TWO_POINTS:
                        $gameScore.= self::GAME_SCORE_THIRTY;
                        break;
                    case self::GAME_SCORE_THREE_POINTS:
                        $gameScore.= self::GAME_SCORE_FORTY;
                        break;
                }
            }
        }
        return $gameScore;

    }

    public function getScore()
    {
        return $this->getGameScore();
    }
}

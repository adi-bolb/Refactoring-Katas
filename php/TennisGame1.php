<?php
require_once './TennisGame.php';

class TennisGame1 implements TennisGame
{

    const GAME_SCORE_NO_POINTS = 0;
    const GAME_SCORE_ONE_POINT = 1;
    const GAME_SCORE_TWO_POINTS = 2;
    const GAME_SCORE_THREE_POINTS = 3;
    const GAME_SCORE_FOUR_POINTS = 4;
    const SCORE_SEPARATOR = "-";
    const GAME_SCORE_MESSAGE_ADVANTAGE = "Advantage";
    const GAME_SCORE_MESSAGE_SPACE = " ";
    const GAME_SCORE_MESSAGE_WINNER = "Win for";
    const GAME_SCORE_ALL = "All";
    const GAME_SCORE_LOVE = "Love";
    const GAME_SCORE_FIFTEEN = "Fifteen";
    const GAME_SCORE_THIRTY = "Thirty";
    const GAME_SCORE_FORTY = "Forty";
    const GAME_SCORE_DEUCE = "Deuce";

    private $playerOnePoints = 0;
    private $playerTwoPoints = 0;
    private $playerOneName;
    private $playerTwoName;

    public function TennisGame1($playerOneName, $playerTwoName)
    {
        $this->playerOneName = $playerOneName;
        $this->playerTwoName = $playerTwoName;
    }

    public function wonPoint($playerName)
    {
        if ($playerName == "player1")
            $this->playerOnePoints += 1;
        else
            $this->playerTwoPoints += 1;
    }

    public function getGameScore(){
        $gameScore = "";
        if ($this->playerOnePoints==$this->playerTwoPoints)
        {
            switch ($this->playerOnePoints)
            {
                case self::GAME_SCORE_NO_POINTS:
                    $gameScore = self::GAME_SCORE_LOVE . self::SCORE_SEPARATOR . self::GAME_SCORE_ALL;
                    break;
                case self::GAME_SCORE_ONE_POINT:
                    $gameScore = self::GAME_SCORE_FIFTEEN .self::SCORE_SEPARATOR. self::GAME_SCORE_ALL;
                    break;
                case self::GAME_SCORE_TWO_POINTS:
                    $gameScore = self::GAME_SCORE_THIRTY .self::SCORE_SEPARATOR. self::GAME_SCORE_ALL;
                    break;
                case self::GAME_SCORE_THREE_POINTS:
                    $gameScore = self::GAME_SCORE_FORTY .self::SCORE_SEPARATOR. self::GAME_SCORE_ALL;
                    break;
                default:
                    $gameScore = self::GAME_SCORE_DEUCE;
                    break;
            }
        }
        else if ($this->playerOnePoints>=self::GAME_SCORE_FOUR_POINTS
            || $this->playerTwoPoints>=self::GAME_SCORE_FOUR_POINTS)
        {

            $minusResult = $this->playerOnePoints - $this->playerTwoPoints;
            if ($minusResult==1) $gameScore = self::GAME_SCORE_MESSAGE_ADVANTAGE . self::GAME_SCORE_MESSAGE_SPACE . "player1";
            else if ($minusResult ==-1) $gameScore = self::GAME_SCORE_MESSAGE_ADVANTAGE . self::GAME_SCORE_MESSAGE_SPACE. "player2";
            else if ($minusResult>=2) $gameScore = self::GAME_SCORE_MESSAGE_WINNER . self::GAME_SCORE_MESSAGE_SPACE . "player1";
            else $gameScore = self::GAME_SCORE_MESSAGE_WINNER . self::GAME_SCORE_MESSAGE_SPACE . "player2";
        }
        else
        {
            for ($i=1; $i<3; $i++)
            {
                if ($i==1) $tempScore = $this->playerOnePoints;
                else { $gameScore.= self::SCORE_SEPARATOR; $tempScore = $this->playerTwoPoints;}
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

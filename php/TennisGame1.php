<?php
require_once './TennisGame.php';

class TennisGame1 implements TennisGame
{
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
                case 0:
                    $gameScore = "Love-All";
                    break;
                case 1:
                    $gameScore = "Fifteen-All";
                    break;
                case 2:
                    $gameScore = "Thirty-All";
                    break;
                case 3:
                    $gameScore = "Forty-All";
                    break;
                default:
                    $gameScore = "Deuce";
                    break;
            }
        }
        else if ($this->playerOnePoints>=4 || $this->playerTwoPoints>=4)
        {
            $minusResult = $this->playerOnePoints - $this->playerTwoPoints;
            if ($minusResult==1) $gameScore = "Advantage player1";
            else if ($minusResult ==-1) $gameScore = "Advantage player2";
            else if ($minusResult>=2) $gameScore = "Win for player1";
            else $gameScore = "Win for player2";
        }
        else
        {
            for ($i=1; $i<3; $i++)
            {
                if ($i==1) $tempScore = $this->playerOnePoints;
                else { $gameScore.="-"; $tempScore = $this->playerTwoPoints;}
                switch($tempScore)
                {
                    case 0:
                        $gameScore.="Love";
                        break;
                    case 1:
                        $gameScore.="Fifteen";
                        break;
                    case 2:
                        $gameScore.="Thirty";
                        break;
                    case 3:
                        $gameScore.="Forty";
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

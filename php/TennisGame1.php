<?php
require_once './TennisGame.php';

class TennisGame1 implements TennisGame
{
    private $playerOneScore = 0;
    private $playerTwoScore = 0;
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
            $this->playerOneScore += 1;
        else
            $this->playerTwoScore += 1;
    }

    public function getScore()
    {
        $score = "";
        $tempScore=0;
        if ($this->playerOneScore==$this->playerTwoScore)
        {
            switch ($this->playerOneScore)
            {
                case 0:
                    $score = "Love-All";
                    break;
                case 1:
                    $score = "Fifteen-All";
                    break;
                case 2:
                    $score = "Thirty-All";
                    break;
                case 3:
                    $score = "Forty-All";
                    break;
                default:
                    $score = "Deuce";
                    break;
            }
        }
        else if ($this->playerOneScore>=4 || $this->playerTwoScore>=4)
        {
            $minusResult = $this->playerOneScore - $this->playerTwoScore;
            if ($minusResult==1) $score = "Advantage player1";
            else if ($minusResult ==-1) $score = "Advantage player2";
            else if ($minusResult>=2) $score = "Win for player1";
            else $score = "Win for player2";
        }
        else
        {
            for ($i=1; $i<3; $i++)
            {
                if ($i==1) $tempScore = $this->playerOneScore;
                else { $score.="-"; $tempScore = $this->playerTwoScore;}
                switch($tempScore)
                {
                    case 0:
                        $score.="Love";
                        break;
                    case 1:
                        $score.="Fifteen";
                        break;
                    case 2:
                        $score.="Thirty";
                        break;
                    case 3:
                        $score.="Forty";
                        break;
                }
            }
        }
        return $score;
    }
}

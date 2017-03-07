<?php
require_once './TennisGame.php';
require 'Player.php';
require 'BuildPlayer.php';

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

    public function TennisGame1($playerOne, $playerTwo)
    {
        $this->playerOne = $playerOne;
        $this->playerTwo = $playerTwo;
    }

    public function wonPoint($playerName)
    {
        $player = $this->getPlayerByName($playerName);
        $this->incrementPointsForPlayer($player);
    }

    function incrementPointsForPlayer($player){
        $incrementedPoints = $player->getPoints() + 1;
        $player->setPoints($incrementedPoints);
    }

    public function getGameScore(){
        $gameScore = "";
        if ($this->getPlayerOne()->getPoints()==$this->getPlayerTwo()->getPoints())
        {
            $gameScore = $this->playersHaveEqualPoints();
        }
        else if ($this->getPlayerOne()->getPoints()>=self::GAME_SCORE_FOUR_POINTS
            || $this->getPlayerTwo()->getPoints()>=self::GAME_SCORE_FOUR_POINTS)
        {
            $gameScore = $this->computeWinnerOrAdvantage();
        }
        else
        {
            $gameScore = $this->computeNotWinnerAndNotAdvantage($gameScore);
        }
        return $gameScore;

    }

    public function getScore()
    {
        return $this->getGameScore();
    }

    private function getPlayerByName($playerName)
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

    /**
     * @return string
     */
    private function playersHaveEqualPoints()
    {
        switch ($this->getPlayerOne()->getPoints()) {
            case self::GAME_SCORE_NO_POINTS:
                $gameScore = self::GAME_SCORE_LOVE . self::GAME_SCORE_SEPARATOR . self::GAME_SCORE_ALL;
                break;
            case self::GAME_SCORE_ONE_POINT:
                $gameScore = self::GAME_SCORE_FIFTEEN . self::GAME_SCORE_SEPARATOR . self::GAME_SCORE_ALL;
                break;
            case self::GAME_SCORE_TWO_POINTS:
                $gameScore = self::GAME_SCORE_THIRTY . self::GAME_SCORE_SEPARATOR . self::GAME_SCORE_ALL;
                break;
            case self::GAME_SCORE_THREE_POINTS:
                $gameScore = self::GAME_SCORE_FORTY . self::GAME_SCORE_SEPARATOR . self::GAME_SCORE_ALL;
                break;
            default:
                $gameScore = self::GAME_SCORE_DEUCE;
                break;
        }
        return $gameScore;
    }

    /**
     * @return string
     */
    private function computeWinnerOrAdvantage()
    {
        $minusResult = $this->getPlayerOne()->getPoints() - $this->getPlayerTwo()->getPoints();
        if ($minusResult == 1) $gameScoreTemp = self::GAME_SCORE_MESSAGE_ADVANTAGE . self::GAME_SCORE_MESSAGE_SPACE . "player1";
        else if ($minusResult == -1) $gameScoreTemp = self::GAME_SCORE_MESSAGE_ADVANTAGE . self::GAME_SCORE_MESSAGE_SPACE . "player2";
        else if ($minusResult >= 2) $gameScoreTemp = self::GAME_SCORE_MESSAGE_WINNER . self::GAME_SCORE_MESSAGE_SPACE . "player1";
        else $gameScoreTemp = self::GAME_SCORE_MESSAGE_WINNER . self::GAME_SCORE_MESSAGE_SPACE . "player2";
        $gameScore = $gameScoreTemp;
        return $gameScore;
    }

    /**
     * @param $gameScore
     * @return string
     */
    private function computeNotWinnerAndNotAdvantage($gameScore)
    {
        for ($i = 1; $i < 3; $i++) {
            if ($i == 1) $tempScore = $this->getPlayerOne()->getPoints();
            else {
                $gameScore .= self::GAME_SCORE_SEPARATOR;
                $tempScore = $this->getPlayerTwo()->getPoints();
            }
            switch ($tempScore) {
                case self::GAME_SCORE_NO_POINTS:
                    $gameScore .= self::GAME_SCORE_LOVE;
                    break;
                case self::GAME_SCORE_ONE_POINT:
                    $gameScore .= self::GAME_SCORE_FIFTEEN;
                    break;
                case self::GAME_SCORE_TWO_POINTS:
                    $gameScore .= self::GAME_SCORE_THIRTY;
                    break;
                case self::GAME_SCORE_THREE_POINTS:
                    $gameScore .= self::GAME_SCORE_FORTY;
                    break;
            }
        }
        return $gameScore;
    }
}









































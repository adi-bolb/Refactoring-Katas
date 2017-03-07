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

        return $this->computeScoreForSingle($playerOnePoints, $playerTwoPoints);

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

    /**
     * @param $playerOnePoints
     * @return string
     */
    private static function computeScoreWithPlayersHavingEqualPoints($playerOnePoints)
    {
        switch ($playerOnePoints) {
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
     * @param $playerOnePoints
     * @param $playerTwoPoints
     * @return string
     */
    private static function computeWinnerOrAdvantage($playerOnePoints, $playerTwoPoints)
    {
        $minusResult = $playerOnePoints - $playerTwoPoints;
        if ($minusResult == 1) $gameScoreTemp = self::GAME_SCORE_MESSAGE_ADVANTAGE . self::GAME_SCORE_MESSAGE_SPACE . "player1";
        else if ($minusResult == -1) $gameScoreTemp = self::GAME_SCORE_MESSAGE_ADVANTAGE . self::GAME_SCORE_MESSAGE_SPACE . "player2";
        else if ($minusResult >= 2) $gameScoreTemp = self::GAME_SCORE_MESSAGE_WINNER . self::GAME_SCORE_MESSAGE_SPACE . "player1";
        else $gameScoreTemp = self::GAME_SCORE_MESSAGE_WINNER . self::GAME_SCORE_MESSAGE_SPACE . "player2";
        $gameScore = $gameScoreTemp;
        return $gameScore;
    }

    /**
     * @param $playerOnePoints
     * @param $playerTwoPoints
     * @return string
     * @internal param $gameScore
     */
    private static function computeNotWinnerAndNotAdvantage($playerOnePoints, $playerTwoPoints)
    {
        $gameScore ="";
        for ($i = 1; $i < 3; $i++) {
            if ($i == 1) {

                $tempScore = $playerOnePoints;
            }
            else {

                $gameScore .= self::GAME_SCORE_SEPARATOR;
                $tempScore = $playerTwoPoints;
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

    /**
     * @param $playerOnePoints
     * @param $playerTwoPoints
     * @return bool
     */
    private static function playersHaveEqualPoints($playerOnePoints, $playerTwoPoints)
    {
        return $playerOnePoints == $playerTwoPoints;
    }

    /**
     * @param $playerOnePoints
     * @param $playerTwoPoints
     * @return bool
     */
    private static function winnerOrAdvantage($playerOnePoints, $playerTwoPoints)
    {
        return $playerOnePoints >= self::GAME_SCORE_FOUR_POINTS
            || $playerTwoPoints >= self::GAME_SCORE_FOUR_POINTS;
    }

    /**
     * @param $playerOnePoints
     * @param $playerTwoPoints
     * @return string
     */
    public static function computeScoreForSingle($playerOnePoints, $playerTwoPoints)
    {
        if (self::playersHaveEqualPoints($playerOnePoints, $playerTwoPoints)) {
            return self::computeScoreWithPlayersHavingEqualPoints($playerOnePoints);
        }

        if (self::winnerOrAdvantage($playerOnePoints, $playerTwoPoints)) {
            return self::computeWinnerOrAdvantage($playerOnePoints, $playerTwoPoints);
        }

        return self::computeNotWinnerAndNotAdvantage($playerOnePoints, $playerTwoPoints);
    }
}









































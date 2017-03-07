<?php

require_once 'TennisGameScore.php';
/**
 * Created by PhpStorm.
 * User: adi
 * Date: 3/7/17
 * Time: 3:42 PM
 */
class DoubleTennisGameScore extends TennisGameScore
{
    private function computeScoreWithPlayersHavingEqualPoints($playerOnePoints)
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

    private function computeWinner($playerOnePoints, $playerTwoPoints)
    {
        $minusResult = $playerOnePoints - $playerTwoPoints;
        if ($minusResult == 1) $gameScoreTemp = self::GAME_SCORE_MESSAGE_WINNER . self::GAME_SCORE_MESSAGE_SPACE . "player1";
        else if ($minusResult == -1) $gameScoreTemp = self::GAME_SCORE_MESSAGE_WINNER. self::GAME_SCORE_MESSAGE_SPACE . "player2";
        else if ($minusResult >= 2) $gameScoreTemp = self::GAME_SCORE_MESSAGE_WINNER . self::GAME_SCORE_MESSAGE_SPACE . "player1";
        else $gameScoreTemp = self::GAME_SCORE_MESSAGE_WINNER . self::GAME_SCORE_MESSAGE_SPACE . "player2";
        $gameScore = $gameScoreTemp;
        return $gameScore;
    }

    private function computeNotWinnerAndNotAdvantage($playerOnePoints, $playerTwoPoints)
    {
        $gameScore = "";
        for ($i = 1; $i < 3; $i++) {
            if ($i == 1) {

                $tempScore = $playerOnePoints;
            } else {

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

    private function playersHaveEqualPoints($playerOnePoints, $playerTwoPoints)
    {
        return $playerOnePoints == $playerTwoPoints;
    }

    private function winnerOrAdvantage($playerOnePoints, $playerTwoPoints)
    {
        return $playerOnePoints >= self::GAME_SCORE_FOUR_POINTS
            || $playerTwoPoints >= self::GAME_SCORE_FOUR_POINTS;
    }

    public function computeScore($playerOnePoints, $playerTwoPoints)
    {
        if ($this->playersHaveEqualPoints($playerOnePoints, $playerTwoPoints)) {
            return $this->computeScoreWithPlayersHavingEqualPoints($playerOnePoints);
        }

        if ($this->winnerOrAdvantage($playerOnePoints, $playerTwoPoints)) {
            return $this->computeWinner($playerOnePoints, $playerTwoPoints);
        }

        return $this->computeNotWinnerAndNotAdvantage($playerOnePoints, $playerTwoPoints);
    }
}
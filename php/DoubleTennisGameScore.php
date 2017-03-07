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
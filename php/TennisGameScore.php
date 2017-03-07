<?php
/**
 * Created by PhpStorm.
 * User: adi
 * Date: 3/7/17
 * Time: 3:38 PM
 */

/**
 * Created by PhpStorm.
 * User: adi
 * Date: 3/7/17
 * Time: 12:50 PM
 */
interface TennisGameScore
{
    const GAME_SCORE_NO_POINTS = 0;
    const GAME_SCORE_THREE_POINTS = 3;
    const GAME_SCORE_FIFTEEN = "Fifteen";
    const GAME_SCORE_LOVE = "Love";
    const GAME_SCORE_MESSAGE_SPACE = " ";
    const GAME_SCORE_ALL = "All";
    const GAME_SCORE_SEPARATOR = "-";
    const GAME_SCORE_FORTY = "Forty";
    const GAME_SCORE_MESSAGE_WINNER = "Win for";
    const GAME_SCORE_ONE_POINT = 1;
    const GAME_SCORE_TWO_POINTS = 2;
    const GAME_SCORE_THIRTY = "Thirty";
    const GAME_SCORE_DEUCE = "Deuce";
    const GAME_SCORE_FOUR_POINTS = 4;
    const GAME_SCORE_MESSAGE_ADVANTAGE = "Advantage";

    public function computeScore($playerOnePoints, $playerTwoPoints);
}
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
    /**
     * @return string
     */
    protected function getAdvantageMessage()
    {
        return self::GAME_SCORE_MESSAGE_WINNER;
    }
}
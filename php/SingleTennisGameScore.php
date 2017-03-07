<?php

/**
 * Created by PhpStorm.
 * User: adi
 * Date: 3/7/17
 * Time: 12:50 PM
 */
require 'TennisGameScore.php';

class SingleTennisGameScore extends TennisGameScore
{

    /**
     * @return string
     */
    protected function getAdvantageMessage()
    {
        return self::GAME_SCORE_MESSAGE_ADVANTAGE;
    }
}
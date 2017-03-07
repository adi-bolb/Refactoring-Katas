<?php
require_once 'TennisGameBuilder.php';

/**
 * Created by PhpStorm.
 * User: adi
 * Date: 3/7/17
 * Time: 10:38 AM
 */
class TennisGame1Builder extends TennisGameBuilder
{
    function build()
    {
        $buildPlayer = $this->getBuildPlayer();

        $playerOne = $buildPlayer->withName($this->playerOneName)
                                ->build();
        $playerTwo = $buildPlayer->withName($this->playerTwoName)
            ->build();

        return new TennisGame1($playerOne, $playerTwo);
    }
}
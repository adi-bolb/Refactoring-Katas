<?php

interface TennisGame
{
    public function wonPoint($playerName);
    public function getScore();
    public function getGameScore();
}

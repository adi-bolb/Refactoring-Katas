<?php
require './TennisGame.php';
require './TennisGame1.php';
require './TennisGame2.php';
require './TennisGame3.php';

class TennisTest extends PHPUnit_Framework_TestCase
{
	private $player1Score;
	private $player2Score;
	private $expectedScore;

	public function getAllScores()
	{
		return(array(
			array( 0, 0, "Love-All"),
			array( 1, 1, "Fifteen-All"),
			array( 2, 2, "Thirty-All"),
			array( 3, 3, "Forty-All"),
			array( 4, 4, "Deuce"),
			array( 1, 0, "Fifteen-Love"),
			array( 0, 1, "Love-Fifteen"),
			array( 2, 0, "Thirty-Love"),
			array( 0, 2, "Love-Thirty"),
			array( 3, 0, "Forty-Love"),
			array( 0, 3, "Love-Forty"),
			array( 4, 0, "Win for player1"),
			array( 0, 4, "Win for player2"),

			array( 2, 1, "Thirty-Fifteen"),
			array( 1, 2, "Fifteen-Thirty"),
			array( 3, 1, "Forty-Fifteen"),
			array( 1, 3, "Fifteen-Forty"),
			array( 4, 1, "Win for player1"),
			array( 1, 4, "Win for player2"),

			array( 3, 2, "Forty-Thirty"),
			array( 2, 3, "Thirty-Forty"),
			array( 4, 2, "Win for player1"),
			array( 2, 4, "Win for player2"),

			array( 4, 3, "Advantage player1"),
			array( 3, 4, "Advantage player2"),
			array( 5, 4, "Advantage player1"),
			array( 4, 5, "Advantage player2"),
			array( 15, 14, "Advantage player1"),
			array( 14, 15, "Advantage player2"),

			array( 6, 4, "Win for player1"),
			array( 4, 6, "Win for player2"),
			array( 16, 14, "Win for player1"),
			array( 14, 16, "Win for player2")
		));
	}

	public function setVars($player1Score, $player2Score, $expectedScore)
	{
		$this->player1Score = $player1Score;
		$this->player2Score =  $player2Score;
		$this->expectedScore = $expectedScore;
	}

	public function checkAllScores(TennisGame $game)
	{
		$highestScore = max($this->player1Score, $this->player2Score);
		for ($i = 0; $i < $highestScore; $i++)
		{
			if ($i < $this->player1Score)
			    $game->wonPoint("player1");
			if ($i < $this->player2Score)
				$game->wonPoint("player2");
		}
		$this->assertEquals($this->expectedScore, $game->getScore());
	}

	/**
	 * @test
	 * @dataProvider getAllScores
	 */
	public function checkAllScoresTennisGame1($player1Score, $player2Score, $expectedScore)
	{
		$this->setVars($player1Score, $player2Score, $expectedScore);
		$game = new TennisGame1("player1", "player2");
		$this->checkAllScores($game);
	}

	/**
	 * @test
	 * @dataProvider getAllScores
	 */
	public function checkAllScoresTennisGame2($player1Score, $player2Score, $expectedScore)
	{
		$this->setVars($player1Score, $player2Score, $expectedScore);
		$game = new TennisGame2("player1", "player2");
		$this->checkAllScores($game);
	}

	/**
	 * @test
	 * @dataProvider getAllScores
	 */
	public function checkAllScoresTennisGame3($player1Score, $player2Score, $expectedScore)
	{
		$this->setVars($player1Score, $player2Score, $expectedScore);
		$game = new TennisGame3("player1", "player2");
		$this->checkAllScores($game);
	}

}

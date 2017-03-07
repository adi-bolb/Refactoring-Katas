<?php
require_once __DIR__ . '/../TennisGame.php';
require_once __DIR__ .'/../TennisGame1.php';
require_once __DIR__ .'/../TennisGame2.php';
require_once __DIR__ .'/../TennisGame3.php';

class TennisTest extends PHPUnit_Framework_TestCase
{
	private $player1Score;
	private $player2Score;
	private $expectedScore;

	public function getAllScoresSingleAndDouble()
	{
        $singleGameScore = $this->getSingleGameScore();
        $doubleGameScore = $this->getDoubleGameScore();
		return(array_merge($this->getAllScoresForSingle($singleGameScore),
            $this->getAllScoresForDouble($doubleGameScore)));
	}

    public function getAllScoresForSingle($singleGameScore)
    {
        return(array(
            array( 0, 0, "Love-All", $singleGameScore),
            array( 1, 1, "Fifteen-All", $singleGameScore),
            array( 2, 2, "Thirty-All", $singleGameScore),
            array( 3, 3, "Forty-All", $singleGameScore),
            array( 4, 4, "Deuce", $singleGameScore),
            array( 1, 0, "Fifteen-Love", $singleGameScore),
            array( 0, 1, "Love-Fifteen", $singleGameScore),
            array( 2, 0, "Thirty-Love", $singleGameScore),
            array( 0, 2, "Love-Thirty", $singleGameScore),
            array( 3, 0, "Forty-Love", $singleGameScore),
            array( 0, 3, "Love-Forty", $singleGameScore),
            array( 4, 0, "Win for player1", $singleGameScore),
            array( 0, 4, "Win for player2", $singleGameScore),

            array( 2, 1, "Thirty-Fifteen", $singleGameScore),
            array( 1, 2, "Fifteen-Thirty", $singleGameScore),
            array( 3, 1, "Forty-Fifteen", $singleGameScore),
            array( 1, 3, "Fifteen-Forty", $singleGameScore),
            array( 4, 1, "Win for player1", $singleGameScore),
            array( 1, 4, "Win for player2", $singleGameScore),

            array( 3, 2, "Forty-Thirty", $singleGameScore),
            array( 2, 3, "Thirty-Forty", $singleGameScore),
            array( 4, 2, "Win for player1", $singleGameScore),
            array( 2, 4, "Win for player2", $singleGameScore),

            array( 4, 3, "Advantage player1", $singleGameScore),
            array( 3, 4, "Advantage player2", $singleGameScore),
            array( 5, 4, "Advantage player1", $singleGameScore),
            array( 4, 5, "Advantage player2", $singleGameScore),
            array( 15, 14, "Advantage player1", $singleGameScore),
            array( 14, 15, "Advantage player2", $singleGameScore),

            array( 6, 4, "Win for player1", $singleGameScore),
            array( 4, 6, "Win for player2", $singleGameScore),
            array( 16, 14, "Win for player1", $singleGameScore),
            array( 14, 16, "Win for player2", $singleGameScore),

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
		$this->assertEquals($this->expectedScore, $game->getGameScore());
	}

	/**
	 * @test
	 * @dataProvider getAllScoresSingleAndDouble
	 */
	public function checkAllScoresTennisGame1($player1Score, $player2Score, $expectedScore, $tennisGameScore)
	{
		$this->setVars($player1Score, $player2Score, $expectedScore);
        $tennisGameBuilder = new TennisGame1Builder();
        $game  = $tennisGameBuilder->withPlayerOneName('player1')
            ->withPlayerTwoName('player2')->withTennisGameScore($tennisGameScore)->build();
		$this->checkAllScores($game);
	}

	/**
	 * @test
	 * @dataProvider getAllScoresForSingle
	 */
	public function checkAllScoresTennisGame2($player1Score, $player2Score, $expectedScore)
	{
		$this->setVars($player1Score, $player2Score, $expectedScore);
		$game = new TennisGame2("player1", "player2");
		$this->checkAllScores($game);
	}

	/**
	 * @test
	 * @dataProvider getAllScoresForSingle
	 */
	public function checkAllScoresTennisGame3($player1Score, $player2Score, $expectedScore)
	{
		$this->setVars($player1Score, $player2Score, $expectedScore);
		$game = new TennisGame3("player1", "player2");
		$this->checkAllScores($game);
	}


	public function testTennisGameWithInjectedPlayerOne(){
	    $buildPlayer = new BuildPlayer();

	    $playerOne = $buildPlayer->withName("Gigi")->withPoints(2)->build();
        $playerTwo = $buildPlayer->withName("Bubu")->withPoints(0)->build();
        $tennisGame1 = new TennisGame1ForTests($playerOne, $playerTwo);

        $gameScore = $tennisGame1 ->getGameScore();

        $this->assertEquals("Thirty-Love", $gameScore);
    }

    /**
     * @return SingleTennisGameScore
     */
    private function getSingleGameScore()
    {
        return new SingleTennisGameScore();
    }

    private function getDoubleGameScore()
    {
        return new DoubleTennisGameScore();
    }

    /**
     * @param $doubleGameScore
     * @return array
     */
    private function getAllScoresForDouble($doubleGameScore)
    {
        return array(
            array(0, 0, "Love-All", $doubleGameScore),
            array(1, 1, "Fifteen-All", $doubleGameScore),
            array(2, 2, "Thirty-All", $doubleGameScore),
            array(3, 3, "Forty-All", $doubleGameScore),
            array(4, 4, "Deuce", $doubleGameScore),
            array(1, 0, "Fifteen-Love", $doubleGameScore),
            array(0, 1, "Love-Fifteen", $doubleGameScore),
            array(2, 0, "Thirty-Love", $doubleGameScore),
            array(0, 2, "Love-Thirty", $doubleGameScore),
            array(3, 0, "Forty-Love", $doubleGameScore),
            array(0, 3, "Love-Forty", $doubleGameScore),
            array(4, 0, "Win for player1", $doubleGameScore),
            array(0, 4, "Win for player2", $doubleGameScore),

            array(2, 1, "Thirty-Fifteen", $doubleGameScore),
            array(1, 2, "Fifteen-Thirty", $doubleGameScore),
            array(3, 1, "Forty-Fifteen", $doubleGameScore),
            array(1, 3, "Fifteen-Forty", $doubleGameScore),
            array(4, 1, "Win for player1", $doubleGameScore),
            array(1, 4, "Win for player2", $doubleGameScore),

            array(3, 2, "Forty-Thirty", $doubleGameScore),
            array(2, 3, "Thirty-Forty", $doubleGameScore),
            array(4, 2, "Win for player1", $doubleGameScore),
            array(2, 4, "Win for player2", $doubleGameScore),

            array(4, 3, "Win for player1", $doubleGameScore),
            array(3, 4, "Win for player2", $doubleGameScore),
        );
    }

}

class TennisGame1ForTests extends TennisGame1{

    private $playerOneForTests;
    private $playerTwoForTests;

    function __construct($playerOneForTests, $playerTwoForTests)
    {
        parent::TennisGame1($playerOneForTests, $playerTwoForTests, new SingleTennisGameScore());
        $this->playerOneForTests = $playerOneForTests;
        $this->playerTwoForTests = $playerTwoForTests;
    }

    protected function getPlayerOne(){
        return $this->playerOneForTests;
    }

    protected function getPlayerTwo()
    {
        return $this->playerTwoForTests;
    }
}











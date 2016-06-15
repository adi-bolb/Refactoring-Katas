public class TennisGame3 implements TennisGame {

	private int playerTwoPoints
	private int playerOnePoints
	def playerOneName
	def playerTwoName

	def getScore() {
        if (noDeuceYet()) {
			String[] textOfScores = ["Love", "Fifteen", "Thirty", "Forty"]
			def scoreAsText = textOfScores[playerOnePoints]

            return equalPointsForPlayers() ? scoreAsText + "-All" : scoreAsText + "-" + textOfScores[playerTwoPoints]
		} else {
            if (equalPointsForPlayers())
				return "Deuce"
			def playerNameWithMorePoints = playerOneHasMorePoints() ? playerOneName : playerTwoName
			return onePlayerHasAdvantage() ? "Advantage " + playerNameWithMorePoints : "Win for " + playerNameWithMorePoints
		}
	}

    private boolean onePlayerHasAdvantage() {
        (playerOnePoints - playerTwoPoints) * (playerOnePoints - playerTwoPoints) == 1
    }

    private boolean playerOneHasMorePoints() {
        playerOnePoints > playerTwoPoints
    }

    private boolean noDeuceYet() {
        reachedOnlyMaximumTheFirstDeuce() && scoreSmallerThanForty()
    }

    private boolean scoreSmallerThanForty() {
        !(playerOnePoints + playerTwoPoints == 6)
    }

    private boolean reachedOnlyMaximumTheFirstDeuce() {
        def playerOneDidNotWin = playerOnePoints < 4
        def playerTwoDidNotWin = playerTwoPoints < 4
        playerOneDidNotWin && playerTwoDidNotWin
    }

    private boolean equalPointsForPlayers() {
        playerOnePoints == playerTwoPoints
    }

    void wonPoint(playerName) {
		if (playerName == "player1")
			this.playerOnePoints += 1
		else
			this.playerTwoPoints += 1
	}
}

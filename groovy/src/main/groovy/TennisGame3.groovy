public class TennisGame3 implements TennisGame {

	private int playerTwoPoints
	private int playerOnePoints
	def playerOneName
	def playerTwoName

	def getScore() {
        if (noDeuceYet()) {
            return equalPointsForPlayers() ? getScoreFor(playerOnePoints) + "-All" : getScoreFor(playerOnePoints) + "-" + getScoreFor(playerTwoPoints)
		} else {
            if (equalPointsForPlayers())
				return "Deuce"
			def playerNameWithMorePoints = playerOneHasMorePoints() ? playerOneName : playerTwoName
			return onePlayerHasOnePointLead() ? "Advantage " + playerNameWithMorePoints : "Win for " + playerNameWithMorePoints
		}
	}

    private getScoreFor(int numberOfPoints) {
        String[] textOfScores2 = ["Love", "Fifteen", "Thirty", "Forty"]
        def playerTwoScore = textOfScores2[numberOfPoints]
        playerTwoScore
    }


    private boolean onePlayerHasOnePointLead() {
        def differenceOfPoints = playerOnePoints - playerTwoPoints
        def onlyOnePointLead = Math.pow(differenceOfPoints, 2) == 1
        onlyOnePointLead
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

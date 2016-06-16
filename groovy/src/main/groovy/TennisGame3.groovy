public class TennisGame3 implements TennisGame {

	private int playerTwoPoints
	private int playerOnePoints
	def playerOneName
	def playerTwoName
    def score;

	def getScore() {
        if (noDeuceYet()) {
            String equalScore = score.getEqualScore(playerOnePoints)
            String differentScores = score.getScoreWhenNotEqual(playerOnePoints, playerTwoPoints)
            return equalPointsForPlayers() ? equalScore : differentScores
		}

        if (equalPointsForPlayers())
            return score.getDeuceScore()

        return onePlayerHasOnePointLead() ? getAdvantageScore() : getWinnerScore()
	}

    private getPlayerNameWithMorePoints() {
        playerOneHasMorePoints() ? playerOneName : playerTwoName
    }


    private String getWinnerScore() {
        "Win for " + getPlayerNameWithMorePoints()
    }

    private String getAdvantageScore() {
        "Advantage " + getPlayerNameWithMorePoints()
    }


    private boolean scoreSmallerThanForty() {
        !(playerOnePoints + playerTwoPoints == 6)
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
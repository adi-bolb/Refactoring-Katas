public class TennisGame3 implements TennisGame {

	private int playerTwoPoints
	private int playerOnePoints
	def p1N
	def p2N

	def getScore() {
		String scoreAsText

        if (noDeuceYet()) {
			String[] textOfScores = ["Love", "Fifteen", "Thirty", "Forty"]
			scoreAsText = textOfScores[playerOnePoints]

            return equalPointsForPlayers() ? scoreAsText + "-All" : scoreAsText + "-" + textOfScores[playerTwoPoints]
		} else {
            if (equalPointsForPlayers())
				return "Deuce"
			scoreAsText = playerOnePoints > playerTwoPoints ? p1N : p2N
			return ((playerOnePoints - playerTwoPoints) * (playerOnePoints - playerTwoPoints) == 1) ? "Advantage " + scoreAsText : "Win for " + scoreAsText
		}
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

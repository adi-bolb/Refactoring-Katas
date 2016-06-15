public class TennisGame3 implements TennisGame {

	private int playerTwoPoints
	private int playerOnePoints
	def p1N
	def p2N

	def getScore() {
		String scoreAsText

        def playerOneDidNotWin = playerOnePoints < 4
        def playerTwoDidNotWin = playerTwoPoints < 4
        def gameNotFinished = playerOneDidNotWin && playerTwoDidNotWin
        def scoreSmallerThanForty = !(playerOnePoints + playerTwoPoints == 6)

        if (gameNotFinished && scoreSmallerThanForty) {
			String[] textOfScores = ["Love", "Fifteen", "Thirty", "Forty"]
			scoreAsText = textOfScores[playerOnePoints]
			return (playerOnePoints == playerTwoPoints) ? scoreAsText + "-All" : scoreAsText + "-" + textOfScores[playerTwoPoints]
		} else {
			if (playerOnePoints == playerTwoPoints)
				return "Deuce"
			scoreAsText = playerOnePoints > playerTwoPoints ? p1N : p2N
			return ((playerOnePoints - playerTwoPoints) * (playerOnePoints - playerTwoPoints) == 1) ? "Advantage " + scoreAsText : "Win for " + scoreAsText
		}
	}

	void wonPoint(playerName) {
		if (playerName == "player1")
			this.playerOnePoints += 1
		else
			this.playerTwoPoints += 1
	}
}

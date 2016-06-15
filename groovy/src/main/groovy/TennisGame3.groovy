public class TennisGame3 implements TennisGame {

	private int playerTwoPoints
	private int playerOnePoints
	def p1N
	def p2N

	def getScore() {
		String scoreAsText
		if (playerOnePoints < 4 && playerTwoPoints < 4 && !(playerOnePoints + playerTwoPoints == 6)) {
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

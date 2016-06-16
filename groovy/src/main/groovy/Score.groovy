/**
 * Created by adi on 6/15/16.
 */
class Score {
    String getDeuceScore() {
        "Deuce"
    }

    String getScoreWhenNotEqual(Integer playerOnePoints, Integer playerTwoPoints) {
        getScoreFor(playerOnePoints) + "-" + getScoreFor(playerTwoPoints)
    }

    String getEqualScore(Integer numberOfPoints) {
        getScoreFor(numberOfPoints) + "-All"
    }

    private getScoreFor(int numberOfPoints) {
        String[] textOfScores2 = ["Love", "Fifteen", "Thirty", "Forty"]
        def playerTwoScore = textOfScores2[numberOfPoints]
        playerTwoScore
    }
}

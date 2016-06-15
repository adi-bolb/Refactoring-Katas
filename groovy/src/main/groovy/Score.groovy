/**
 * Created by adi on 6/15/16.
 */
class Score {
    static String getDeuceScore() {
        "Deuce"
    }

    static String getScoreWhenNotEqual(Integer playerOnePoints, Integer playerTwoPoints) {
        getScoreFor(playerOnePoints) + "-" + getScoreFor(playerTwoPoints)
    }

    static String getEqualScore(Integer numberOfPoints) {
        getScoreFor(numberOfPoints) + "-All"
    }

    private static getScoreFor(int numberOfPoints) {
        String[] textOfScores2 = ["Love", "Fifteen", "Thirty", "Forty"]
        def playerTwoScore = textOfScores2[numberOfPoints]
        playerTwoScore
    }
}

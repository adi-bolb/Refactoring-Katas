package tennis;

public class TennisGame1 implements TennisGame {

    public static final String LOVE = "Love";
    public static final String FIFTEEN = "Fifteen";
    public static final String THIRTY = "Thirty";
    public static final String FORTY = "Forty";
    public static final String ALL = "All";
    private int m_score1 = 0;
    private int m_score2 = 0;
    private String player1Name = "player1";
    private String player2Name;

    public TennisGame1(String player1Name, String player2Name) {
        this.player1Name = player1Name;
        this.player2Name = player2Name;
    }

    public void wonPoint(String playerName) {
        if (playerName == player1Name)
            m_score1 += 1;
        else
            m_score2 += 1;
    }

    public String getScore() {
        String score = "";
        int tempScore=0;
        if (m_score1==m_score2)
        {
            switch (m_score1)
            {
                case 0:
                    score = LOVE + "-"+ ALL;
                    break;
                case 1:
                    score = FIFTEEN + "-"+ ALL;
                    break;
                case 2:
                    score = THIRTY + "-"+ ALL;
                    break;
                case 3:
                    score = FORTY +"-"+ ALL;
                    break;
                default:
                    score = "Deuce";
                    break;
                
            }
        }
        else if (m_score1>=4 || m_score2>=4)
        {
            int minusResult = m_score1-m_score2;
            if (minusResult==1) score ="Advantage player1";
            else {
                String player2 = "player2";
                if (minusResult ==-1) score ="Advantage " + player2;
                else if (minusResult>=2) score = "Win for player1";
                else score ="Win for " + player2;
            }
        }
        else
        {
            for (int i=1; i<3; i++)
            {
                if (i==1) tempScore = m_score1;
                else { score+="-"; tempScore = m_score2;}
                switch(tempScore)
                {
                    case 0:
                        score+=LOVE;
                        break;
                    case 1:
                        score+=FIFTEEN;
                        break;
                    case 2:
                        score+=THIRTY;
                        break;
                    case 3:
                        score+=FORTY;
                        break;
                }
            }
        }
        return score;
    }
}

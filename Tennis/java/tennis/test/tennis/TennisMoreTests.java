package tennis;

import org.junit.Test;

import static org.junit.Assert.assertEquals;

/**
 * Created by adi on 11/27/14.
 */
public class TennisMoreTests {
    @Test
    public void COULD_BE_BUG_whenAdvantageTheNameOfThePlayerDoesNotChange(){
        TennisGame1 game = new TennisGame1("playerOne", "doesntMatter");
        game.wonPoint("playerOne");
        game.wonPoint("playerOne");
        game.wonPoint("playerOne");
        game.wonPoint("playerOne");

        String actualScore = game.getScore();

        assertEquals("Win for player1", actualScore);
        // This should happen assertEquals("Win for playerOne", actualScore);
    }
}

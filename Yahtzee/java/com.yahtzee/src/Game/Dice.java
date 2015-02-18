package Game;

import java.util.ArrayList;
import java.util.List;

public class Dice {
    private List<Integer> diceValues = new ArrayList<Integer>();

    public Dice(int d1, int d2, int d3, int d4, int d5) {
        diceValues.add(d1);
        diceValues.add(d2);
        diceValues.add(d3);
        diceValues.add(d4);
        diceValues.add(d5);
    }

    public Integer getDice(int oneBasedIndex){
        int zeroBasedIndex = oneBasedIndex - 1;
        return diceValues.get(zeroBasedIndex);
    }
}
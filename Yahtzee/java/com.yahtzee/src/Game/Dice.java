package Game;

import java.util.ArrayList;
import java.util.List;

public class Dice {
    private final int d1;
    private final int d2;
    private final int d3;
    private final int d4;
    private final int d5;
    private List<Integer> diceValues = new ArrayList<Integer>();

    public Dice(int d1, int d2, int d3, int d4, int d5) {
        diceValues.add(d1);
        diceValues.add(d2);
        diceValues.add(d3);
        diceValues.add(d4);
        diceValues.add(d5);

        this.d1 = d1;
        this.d2 = d2;
        this.d3 = d3;
        this.d4 = d4;
        this.d5 = d5;
    }

    public Integer getDice(int oneBasedIndex){
        int zeroBasedIndex = oneBasedIndex - 1;
        return diceValues.get(zeroBasedIndex);
    }
}
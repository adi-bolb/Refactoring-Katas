package com.gildedrose;
class GildedRose {
    Item[] items;

    public GildedRose(Item[] items) {
        this.items = items;
    }

    public void updateQuality() {
        for (int itemIndex = 0; itemIndex < items.length; itemIndex++) {
            String message = "Sulfuras, Hand of Ragnaros";
            String backstagePassMessage = "Backstage passes to a TAFKAL80ETC concert";
            if (!items[itemIndex].name.equals("Aged Brie")
                    && !items[itemIndex].name.equals(backstagePassMessage)) {
                if (items[itemIndex].quality > 0 && !items[itemIndex].name.equals(message)) {
                    items[itemIndex].quality = items[itemIndex].quality - 1;
                }
            } else {
                if (items[itemIndex].quality < 50) {
                    items[itemIndex].quality = items[itemIndex].quality + 1;

                    if (items[itemIndex].name.equals(backstagePassMessage)) {
                        if (items[itemIndex].sellIn < 11) {
                            if (items[itemIndex].quality < 50) {
                                items[itemIndex].quality = items[itemIndex].quality + 1;
                            }
                        }

                        if (items[itemIndex].sellIn < 6) {
                            if (items[itemIndex].quality < 50) {
                                items[itemIndex].quality = items[itemIndex].quality + 1;
                            }
                        }
                    }
                }
            }

            if (!items[itemIndex].name.equals(message)) {
                items[itemIndex].sellIn = items[itemIndex].sellIn - 1;
            }

            if (items[itemIndex].sellIn < 0) {

                if (!items[itemIndex].name.equals("Aged Brie")) {
                    if (!items[itemIndex].name.equals(backstagePassMessage)) {
                        if (items[itemIndex].quality > 0) {
                            if (!items[itemIndex].name.equals(message)) {
                                items[itemIndex].quality = items[itemIndex].quality - 1;
                            }
                        }
                    } if(items[itemIndex].name.equals(backstagePassMessage)){
                        items[itemIndex].quality = items[itemIndex].quality - items[itemIndex].quality;
                    }
                } else if (items[itemIndex].quality < 50) {
                    items[itemIndex].quality = items[itemIndex].quality + 1;
                }
            }
        }
    }
}

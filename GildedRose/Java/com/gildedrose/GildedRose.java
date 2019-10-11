package com.gildedrose;
class GildedRose {
    public static final int QUALITY_DELTA = 1;
    public static final int MAX_QUALITY = 50;
    Item[] items;

    public GildedRose(Item[] items) {
        this.items = items;
    }

    public void updateQuality() {
        for (int itemIndex = 0; itemIndex < items.length; itemIndex++) {
            String messageSulfuras = "Sulfuras, Hand of Ragnaros";
            String messageBackstagePass = "Backstage passes to a TAFKAL80ETC concert";
            String messageAgedBrie = "Aged Brie";
            if (!items[itemIndex].name.equals(messageAgedBrie)
                    && !items[itemIndex].name.equals(messageBackstagePass)) {
                if (items[itemIndex].quality > 0 && !items[itemIndex].name.equals(messageSulfuras)) {
                    decrementQuality(itemIndex, QUALITY_DELTA);
                }
            } else {
                if (items[itemIndex].quality < MAX_QUALITY) {
                    incrementQuality(itemIndex, QUALITY_DELTA);

                    if (items[itemIndex].name.equals(messageBackstagePass)) {
                        if (items[itemIndex].sellIn < 11) {
                            incrementWhenLessThanMaxQuality(itemIndex, MAX_QUALITY, QUALITY_DELTA);
                        }

                        if (items[itemIndex].sellIn < 6) {
                            incrementWhenLessThanMaxQuality(itemIndex, MAX_QUALITY, QUALITY_DELTA);
                        }
                    }
                }
            }

            if (!items[itemIndex].name.equals(messageSulfuras)) {
                items[itemIndex].sellIn = items[itemIndex].sellIn - QUALITY_DELTA;
            }

            if (items[itemIndex].sellIn < 0) {

                if (!items[itemIndex].name.equals(messageAgedBrie)) {
                    if (!items[itemIndex].name.equals(messageBackstagePass)) {
                        if (items[itemIndex].quality > 0) {
                            if (!items[itemIndex].name.equals(messageSulfuras)) {
                                decrementQuality(itemIndex, QUALITY_DELTA);
                            }
                        }
                    } if(items[itemIndex].name.equals(messageBackstagePass)){
                        decrementQuality(itemIndex, items[itemIndex].quality);
                    }
                } else incrementWhenLessThanMaxQuality(itemIndex, MAX_QUALITY, QUALITY_DELTA);
            }
        }
    }

    private void incrementWhenLessThanMaxQuality(int itemIndex, int maxQuality, int qualityDelta) {
        if (items[itemIndex].quality < maxQuality) {
            incrementQuality(itemIndex, qualityDelta);
        }
    }

    private void decrementQuality(int itemIndex, int qualityDelta) {
        items[itemIndex].quality = items[itemIndex].quality - qualityDelta;
    }

    private void incrementQuality(int itemIndex, int qualityDelta) {
        items[itemIndex].quality = items[itemIndex].quality + qualityDelta;
    }
}

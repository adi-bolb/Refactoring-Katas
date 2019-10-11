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
            if (!items[itemIndex].name.equals(messageAgedBrie)) {
                if (!items[itemIndex].name.equals(messageBackstagePass)) {
                    updateQualityWhenNotSulfuras(itemIndex, messageSulfuras);
                } else {
                    if (items[itemIndex].quality < MAX_QUALITY) {
                        incrementQuality(itemIndex, QUALITY_DELTA);

                        updateQualityWhenBackstagePass(itemIndex, messageBackstagePass);
                    }
                }
            } else {
                if (items[itemIndex].quality < MAX_QUALITY) {
                    incrementQuality(itemIndex, QUALITY_DELTA);

                    updateQualityWhenBackstagePass(itemIndex, messageBackstagePass);
                }
            }

            if (!items[itemIndex].name.equals(messageSulfuras)) {
                items[itemIndex].sellIn = items[itemIndex].sellIn - QUALITY_DELTA;
            }

            if (items[itemIndex].sellIn < 0) {

                if (!items[itemIndex].name.equals(messageAgedBrie)) {
                    if (!items[itemIndex].name.equals(messageBackstagePass)) {
                        updateQualityWhenNotSulfuras(itemIndex, messageSulfuras);
                    } if(items[itemIndex].name.equals(messageBackstagePass)){
                        decrementQuality(itemIndex, items[itemIndex].quality);
                    }
                } else incrementQualityWhenLessThanMaxQuality(itemIndex, MAX_QUALITY, QUALITY_DELTA);
            }
        }
    }

    private void updateQualityWhenBackstagePass(int itemIndex, String messageBackstagePass) {
        if (items[itemIndex].name.equals(messageBackstagePass)) {
            if (items[itemIndex].sellIn < 11) {
                incrementQualityWhenLessThanMaxQuality(itemIndex, MAX_QUALITY, QUALITY_DELTA);
            }

            if (items[itemIndex].sellIn < 6) {
                incrementQualityWhenLessThanMaxQuality(itemIndex, MAX_QUALITY, QUALITY_DELTA);
            }
        }
    }

    private void updateQualityWhenNotSulfuras(int itemIndex, String messageSulfuras) {
        if (!items[itemIndex].name.equals(messageSulfuras)) {
            decrementQualityWhenGreaterThanZeroQuality(itemIndex);
        }
    }

    private void decrementQualityWhenGreaterThanZeroQuality(int itemIndex) {
        if (items[itemIndex].quality > 0) {
            decrementQuality(itemIndex, QUALITY_DELTA);
        }
    }

    private void incrementQualityWhenLessThanMaxQuality(int itemIndex, int maxQuality, int qualityDelta) {
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

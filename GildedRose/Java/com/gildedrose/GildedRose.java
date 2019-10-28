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
            if (!compareItemNameWithMessage(messageAgedBrie, items[itemIndex])) {
                if (!compareItemNameWithMessage(messageBackstagePass, items[itemIndex])) {
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

            if (!compareItemNameWithMessage(messageSulfuras, items[itemIndex])) {
                items[itemIndex].sellIn = items[itemIndex].sellIn - QUALITY_DELTA;
            }

            if (items[itemIndex].sellIn < 0) {

                if (!compareItemNameWithMessage(messageAgedBrie, items[itemIndex])) {
                    if (!compareItemNameWithMessage(messageBackstagePass, items[itemIndex])) {
                        updateQualityWhenNotSulfuras(itemIndex, messageSulfuras);
                    } if(compareItemNameWithMessage(messageBackstagePass, items[itemIndex])){
                        decrementQuality(itemIndex, items[itemIndex].quality);
                    }
                } else incrementQualityWhenLessThanMaxQuality(itemIndex, MAX_QUALITY, QUALITY_DELTA);
            }
        }
    }

    private void updateQualityWhenBackstagePass(int itemIndex, String messageBackstagePass) {
        if (compareItemNameWithMessage(messageBackstagePass, items[itemIndex])) {
            incrementQualityWhenReachedValue(itemIndex, 11);
            incrementQualityWhenReachedValue(itemIndex, 6);
        }
    }

    private void incrementQualityWhenReachedValue(int itemIndex, int value) {
        if (itemSellingHasReachedValue(value, itemIndex)) {
            incrementQualityWhenLessThanMaxQuality(itemIndex, MAX_QUALITY, QUALITY_DELTA);
        }
    }

    private boolean itemSellingHasReachedValue(int value, int itemIndex) {
        return items[itemIndex].sellIn < value;
    }

    private void updateQualityWhenNotSulfuras(int itemIndex, String messageSulfuras) {
        if (!compareItemNameWithMessage(messageSulfuras, items[itemIndex])) {
            decrementQualityWhenGreaterThanZeroQuality(itemIndex);
        }
    }

    private boolean compareItemNameWithMessage(String message, Item item) {
        return item.name.equals(message);
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

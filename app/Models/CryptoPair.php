<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\Carbon;

class CryptoPair
{
    private string $symbol;
    private string $priceChange;
    private string $priceChangePercent;
    private string $lastPrice;
    private string $bidPrice;
    private string $askPrice;
    private string $highPrice;
    private string $lowPrice;
    private string $volume;
    private string $quoteVolume;
    private Carbon $openTime;
    private Carbon $closeTime;
    private int $count;

    public function __construct(
        string $symbol,
        string $priceChange,
        string $priceChangePercent,
        string $lastPrice,
        string $bidPrice,
        string $askPrice,
        string $highPrice,
        string $lowPrice,
        string $volume,
        string $quoteVolume,
        Carbon $openTime,
        Carbon $closeTime,
        int    $count
    )
    {
        $this->symbol = $symbol;
        $this->priceChange = $priceChange;
        $this->priceChangePercent = $priceChangePercent;
        $this->lastPrice = $lastPrice;
        $this->bidPrice = $bidPrice;
        $this->askPrice = $askPrice;
        $this->highPrice = $highPrice;
        $this->lowPrice = $lowPrice;
        $this->volume = $volume;
        $this->quoteVolume = $quoteVolume;
        $this->openTime = $openTime;
        $this->closeTime = $closeTime;
        $this->count = $count;
    }

    public function getSymbol(): string
    {
        return $this->symbol;
    }

    public function getPriceChange(): string
    {
        return $this->priceChange;
    }

    public function getPriceChangePercent(): string
    {
        return $this->priceChangePercent;
    }

    public function getLastPrice(): string
    {
        return $this->lastPrice;
    }

    public function getBidPrice(): string
    {
        return $this->bidPrice;
    }

    public function getAskPrice(): string
    {
        return $this->askPrice;
    }

    public function getHighPrice(): string
    {
        return $this->highPrice;
    }

    public function getLowPrice(): string
    {
        return $this->lowPrice;
    }

    public function getVolume(): string
    {
        return $this->volume;
    }

    public function getQuoteVolume(): string
    {
        return $this->quoteVolume;
    }

    public function getOpenTime(): Carbon
    {
        return $this->openTime;
    }

    public function getCloseTime(): Carbon
    {
        return $this->closeTime;
    }

    public function getCount(): int
    {
        return $this->count;
    }
}

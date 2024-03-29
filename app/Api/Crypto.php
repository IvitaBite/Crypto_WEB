<?php

declare(strict_types=1);

namespace App\Api;

use App\Models\CryptoPair;
use App\Models\CryptoPairCollection;
use Carbon\Carbon;
use GuzzleHttp\Client;

class Crypto
{
    private Client $client;
    private const API_URL = "https://api4.binance.com/api/v3/ticker/24hr";

    public function __construct()
    {
        $this->client = new Client();
    }

    public function getCryptoPairData(string $query = ''): CryptoPairCollection
    {
        $url = self::API_URL . ($query ? "?symbol={$query}" : '');
        $response = $this->client->get($url);
        $data = json_decode($response->getBody()->getContents());
        $cryptoPairsCollection = new CryptoPairCollection();
        foreach ($data as $cryptoPair) {
            $cryptoPairsCollection->add(new CryptoPair(
                $cryptoPair->symbol,
                $cryptoPair->priceChange,
                $cryptoPair->priceChangePercent,
                $cryptoPair->lastPrice,
                $cryptoPair->bidPrice,
                $cryptoPair->askPrice,
                $cryptoPair->highPrice,
                $cryptoPair->lowPrice,
                $cryptoPair->volume,
                $cryptoPair->quoteVolume,
                Carbon::parse($cryptoPair->openTime),
                Carbon::parse($cryptoPair->closeTime),
                $cryptoPair->count
            ));
        }
        return $cryptoPairsCollection;
    }

    public function searchCryptoPairData(string $query = ''): CryptoPairCollection
    {
        $url = self::API_URL . ($query ? "?symbol={$query}" : '');
        $response = $this->client->get($url);
        $data = json_decode($response->getBody()->getContents());
        $cryptoPairsCollection = new CryptoPairCollection();
        $cryptoPairsCollection->add(new CryptoPair(
            $data->symbol,
            $data->priceChange,
            $data->priceChangePercent,
            $data->lastPrice,
            $data->bidPrice,
            $data->askPrice,
            $data->highPrice,
            $data->lowPrice,
            $data->volume,
            $data->quoteVolume,
            Carbon::parse($data->openTime),
            Carbon::parse($data->closeTime),
            $data->count
        ));
        return $cryptoPairsCollection;
    }
}

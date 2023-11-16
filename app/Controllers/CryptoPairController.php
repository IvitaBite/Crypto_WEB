<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Api\Crypto;
use App\Response;

class CryptoPairController
{
    private Crypto $apiCrypto;

    public function __construct(Crypto $apiCrypto)
    {
        $this->apiCrypto = $apiCrypto;
    }

    public function index(): Response
    {

        $cryptoPair = $this->apiCrypto->getCryptoPairData();
        return new Response('index', [
            'cryptoPair' => array_slice($cryptoPair->getCryptoPairs(), 0, 3)
        ]);
    }

    public function search(array $vars): Response
    {
        $query = $_GET['query'] ?? '';
        $query = $this->normalizeQuery($query);
        $cryptoPair = $this->apiCrypto->getCryptoPairData($query);
        return new Response('search', [
            'cryptoPair' => $cryptoPair->getCryptoPairs()
        ]);
    }

    private function normalizeQuery(string $query): string
    {
        return preg_replace('/[^a-zA-Z0-9]/', '', mb_strtoupper($query));
    }
}

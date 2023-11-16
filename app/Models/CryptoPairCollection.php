<?php

declare(strict_types=1);

namespace App\Models;

class CryptoPairCollection
{
    private array $cryptoPairs = [];

    public function __construct(array $cryptoPairs = [])
    {
        foreach ($cryptoPairs as $cryptoPair)
            $this->add($cryptoPair);
    }

    public function add(CryptoPair $cryptoPair): void
    {
        $this->cryptoPairs[] = $cryptoPair;
    }

    public function getCryptoPairs(): array
    {
        return $this->cryptoPairs;
    }
}
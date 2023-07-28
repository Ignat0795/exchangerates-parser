<?php

namespace App\DTO;

use App\Enum\Currency;
use App\Interface\ExchangeDTOInterface;

class ExchangeLatestDTO implements ExchangeDTOInterface
{
    public string $disclaimer;
    public string $license;
    public int $timestamp;
    public string $base;
    public array $rates;


    public static function createExchangeRatesDTOFromArray(array $data): ExchangeLatestDTO
    {
        $exchangeRatesDTO = new self();
        $exchangeRatesDTO->disclaimer = $data['disclaimer'];
        $exchangeRatesDTO->license = $data['license'];
        $exchangeRatesDTO->timestamp = $data['timestamp'];
        $exchangeRatesDTO->base = $data['base'];
        $exchangeRatesDTO->rates = $data['rates'];
        return $exchangeRatesDTO;
    }


    /**
     * @return string
     */
    public function disclaimer(): string
    {
        return $this->disclaimer;
    }

    /**
     * @return string
     */
    public function license(): string
    {
        return $this->license;
    }

    /**
     * @return int
     */
    public function timestamp(): int
    {
        return $this->timestamp;
    }

    /**
     * @return array
     */
    public function rates(): array
    {
        return $this->rates;
    }

    /**
     * @return string
     */
    public function base(): string
    {
        return $this->base;
    }
}
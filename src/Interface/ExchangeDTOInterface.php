<?php

namespace App\Interface;

use App\DTO\ExchangeLatestDTO;

interface ExchangeDTOInterface
{
    public static function createExchangeRatesDTOFromArray(array $data): ExchangeDTOInterface;
}
<?php

namespace App\Service;

use App\DTO\ExchangeLatestDTO;
use App\Interface\ExchangeDTOInterface;

class LatestExchange implements \App\Interface\OpenExchangeRatesInterface
{
    public const METHOD_URL = 'https://openexchangerates.org/api/latest.json?app_id=';
    private string $appId;

    public function __construct(string $appId)
    {
        $this->appId = $appId;
    }

    public function getData(): ExchangeDTOInterface
    {
        $oxr_url = self::METHOD_URL . $this->appId;
        $ch = curl_init($oxr_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $json = curl_exec($ch);
        curl_close($ch);
        $oxrLatest = json_decode($json,true);
        return  ExchangeLatestDTO::createExchangeRatesDTOFromArray($oxrLatest);
    }
}
<?php

namespace App\Service;

use App\Interface\ExchangeDTOInterface;
use App\Interface\OpenExchangeRatesInterface;

class ExchangeManageMethodsService
{
    private OpenExchangeRatesInterface $endpoint;

    public function __construct(OpenExchangeRatesInterface $endpoint)
    {
        $this->endpoint = $endpoint;
    }

    public function getEndpointData():ExchangeDTOInterface
    {
        return $this->endpoint->getData();
    }
}
<?php

namespace App\Interface;

interface OpenExchangeRatesInterface
{
    public function getData(): ExchangeDTOInterface;
}
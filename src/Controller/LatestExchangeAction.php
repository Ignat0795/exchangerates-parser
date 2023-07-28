<?php

namespace App\Controller;

use App\Service\ExchangeManageMethodsService;
use App\Service\LatestExchange;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;


class LatestExchangeAction
{
    #[Route('/latest-exchange/{app_id}', name: 'latest_exchange', methods: ['GET'])]
    public function __invoke($app_id): \Symfony\Component\HttpFoundation\Response
    {
        $service = new ExchangeManageMethodsService(new LatestExchange($app_id));
        $dto = $service->getEndpointData();
        return new JsonResponse(['response' => $dto]);
    }
}
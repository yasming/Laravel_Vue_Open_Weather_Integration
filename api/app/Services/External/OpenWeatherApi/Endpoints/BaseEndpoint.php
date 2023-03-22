<?php

declare(strict_types=1);

namespace App\Services\External\OpenWeatherApi\Endpoints;

use App\Services\External\OpenWeatherApi\Api;

abstract class BaseEndpoint
{
    protected Api $api;

    public function __construct(Api $api)
    {
        $this->api = $api;
    }
}

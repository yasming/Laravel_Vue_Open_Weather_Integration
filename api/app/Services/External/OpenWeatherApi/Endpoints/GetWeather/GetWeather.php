<?php

declare(strict_types=1);

namespace App\Services\External\OpenWeatherApi\Endpoints\GetWeather;

use App\Models\User;
use App\Services\External\OpenWeatherApi\Endpoints\BaseEndpoint;
use Illuminate\Support\Facades\Log;

class GetWeather extends BaseEndpoint
{
    private const ENDPOINT = '/weather?lat=%s&lon=%s&units=imperial';

    public function get(User $user): array
    {
        try {
            $getWeatherEndpoint = sprintf(self::ENDPOINT, $user->latitude, $user->longitude);
            return $this->api->call($getWeatherEndpoint);
        } catch (\Throwable $e) {
            Log::info('Error calling Open weather API: '.$getWeatherEndpoint.'. '.$e->getMessage());
            return [];
        }
    }
}

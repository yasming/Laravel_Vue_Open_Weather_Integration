<?php

declare(strict_types=1);

namespace App\Services\Weather;

use App\Models\User;
use App\Services\External\OpenWeatherApi\Endpoints\BaseEndpoint;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class PutUserWeatherInformationInCache extends BaseEndpoint
{
    public const CACHE_KEY = 'user-weather-information-%s';

    public function put(User $user, array $weatherInformation): void
    {
        if ( Arr::get($weatherInformation, 'main') ) {
            Cache::put(sprintf(self::CACHE_KEY, $user->id), $weatherInformation);
        } else {
            Log::info('Information for user: '.$user->id.'. not updated at: '.now());
        }
    }
}

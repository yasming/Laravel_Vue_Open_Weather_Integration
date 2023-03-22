<?php

declare(strict_types=1);

namespace App\Services\External\OpenWeatherApi;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class Api
{
    public function __construct(private readonly string $baseUrl, private readonly string $apiKey){}

    public function call(string $queryString): array
    {
        try {
            $fullUrl = $this->getFullUrl($queryString);
            $response = Http::get($fullUrl);
            return $response->json();
        } catch (\Throwable $e) {
            Log::info('Error calling Open weather API: '.$fullUrl.'. '.$e->getMessage());
            return [];
        }
    }

    public function getFullUrl(string $queryString): String
    {
        return $this->baseUrl.$queryString.'&appid='.$this->apiKey;
    }
}

<?php

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use RefreshDatabase;

    public function mockGetWeatherResponseWithWeatherData(): array
    {
        return [
            "coord" => [
                "lon" => -38.5267,
                "lat" => -3.7319
            ],
            "weather" => [
                [
                    "id" => 802,
                    "main" => "Clouds",
                    "description" => "scattered clouds",
                    "icon" => "03d"
                ]
            ],
            "base" => "stations",
            "main" => [
                "temp" => 78.75,
                "feels_like" => 78.75,
                "temp_min" => 78.06,
                "temp_max" => 78.75,
                "pressure" => 1013,
                "humidity" => 83
            ],
            "visibility" => 10000,
            "wind" => [
                "speed" => 8.05,
                "deg" => 160
            ],
            "clouds" => [
                "all" => 40
            ],
            "dt" => 1677665723,
            "sys" => [
                "type" => 1,
                "id" => 8363,
                "country" => "BR",
                "sunrise" => 1677660079,
                "sunset" => 1677703923
            ],
            "timezone" => -10800,
            "id" => 6320062,
            "name" => "Fortaleza",
            "cod" => 200
        ];
    }
}

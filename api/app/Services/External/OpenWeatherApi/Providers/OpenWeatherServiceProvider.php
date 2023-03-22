<?php

declare(strict_types=1);

namespace App\Services\External\OpenWeatherApi\Providers;

use App\Services\External\OpenWeatherApi\Api;
use Illuminate\Support\ServiceProvider;

class OpenWeatherServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Api::class, function () {
            return new Api(
                config('open_weather_api.base_url'),
                config('open_weather_api.api_key')
            );
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    }
}

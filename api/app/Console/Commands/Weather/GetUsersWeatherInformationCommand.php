<?php

namespace App\Console\Commands\Weather;

use App\Models\User;
use App\Services\External\OpenWeatherApi\Endpoints\GetWeather\GetWeather;
use App\Services\Weather\PutUserWeatherInformationInCache;
use Illuminate\Console\Command;

class GetUsersWeatherInformationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:get-users-weather-information';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get users weather information from open weather api';

    /**
     * Execute the console command.
     */
    public function handle(GetWeather $getWeather, PutUserWeatherInformationInCache $putUserWeatherInformationInCache): void
    {
        foreach(User::all() as $user) {
            $weatherInformation = $getWeather->get($user);
            $putUserWeatherInformationInCache->put($user, $weatherInformation);
        }
    }
}

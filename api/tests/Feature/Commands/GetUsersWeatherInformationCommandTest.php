<?php

namespace Tests\Feature\Commands;

use App\Models\User;
use App\Services\External\OpenWeatherApi\Endpoints\GetWeather\GetWeather;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Mockery;
use Mockery\MockInterface;
use Tests\TestCase;

class GetUsersWeatherInformationCommandTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        User::factory(1)->create();
    }

    public function test_it_should_update_cache_with_weather_information_for_user()
    {
        $this->instance(
            GetWeather::class,
            Mockery::mock(GetWeather::class, function (MockInterface $mock) {
                $mock->shouldReceive('get')->andReturn($this->mockGetWeatherResponseWithWeatherData());
            })
        );
        Artisan::call("command:get-users-weather-information");
        $this->assertEquals($this->mockGetWeatherResponseWithWeatherData(), Cache::get('user-weather-information-'.User::first()->id));
    }

    public function test_it_should_not_update_cache_with_weather_information_for_user_when_open_weather_api_does_not_return_good_answer()
    {
        $this->instance(
            GetWeather::class,
            Mockery::mock(GetWeather::class, function (MockInterface $mock) {
                $mock->shouldReceive('get')->andReturn([]);
            })
        );
        Artisan::call("command:get-users-weather-information");
        $this->assertEquals(null, Cache::get('user-weather-information-'.User::first()->id));
    }
}

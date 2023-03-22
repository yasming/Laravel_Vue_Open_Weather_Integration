<?php

namespace Tests\Feature\Controllers\Weather;

use App\Models\User;
use App\Services\Weather\PutUserWeatherInformationInCache;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Cache;
use Tests\TestCase;

class WeatherControllerTest extends TestCase
{
    use RefreshDatabase;

    private User $user1;
    private User $user2;

    public function setUp(): void
    {
        parent::setUp();
        [$this->user1, $this->user2] = User::factory(2)->create();
        Cache::put(sprintf(PutUserWeatherInformationInCache::CACHE_KEY, $this->user1->id), $this->mockGetWeatherResponseWithWeatherData());
    }

    public function test_should_show_all_users_with_weather()
    {
        $response = $this->get('/get-users-weather-information')->assertStatus(200);
        $this->assertCount(2, $response->json()['data']);

        $this->assertEquals($this->mockGetWeatherResponseWithWeatherData(), $response->json()['data'][0]['weather_information']);
        $this->assertEquals($this->user1->id, $response->json()['data'][0]['id']);
        $this->assertEquals($this->user1->name, $response->json()['data'][0]['name']);
        $this->assertEquals($this->user1->email, $response->json()['data'][0]['email']);
        $this->assertEquals($this->user1->latitude, $response->json()['data'][0]['latitude']);
        $this->assertEquals($this->user1->longitude, $response->json()['data'][0]['longitude']);

        $this->assertEquals([], $response->json()['data'][1]['weather_information']);
        $this->assertEquals($this->user2->id, $response->json()['data'][1]['id']);
        $this->assertEquals($this->user2->name, $response->json()['data'][1]['name']);
        $this->assertEquals($this->user2->email, $response->json()['data'][1]['email']);
        $this->assertEquals($this->user2->latitude, $response->json()['data'][1]['latitude']);
        $this->assertEquals($this->user2->longitude, $response->json()['data'][1]['longitude']);
    }
}

<?php

namespace Tests\Unit\Models;

use App\Models\User;
use App\Services\Weather\PutUserWeatherInformationInCache;
use Illuminate\Support\Facades\Cache;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_should_return_empty_array_when_weather_is_not_in_cache()
    {
        $user = (new User);
        $this->assertEquals([], $user->weather);
    }

    public function test_should_return_weather_from_cache_when_it_exists()
    {
        $user = new User;
        $user->id = 1;
        Cache::put(sprintf(PutUserWeatherInformationInCache::CACHE_KEY, $user->id), 'test');
        $this->assertEquals('test', $user->weather);
    }
}

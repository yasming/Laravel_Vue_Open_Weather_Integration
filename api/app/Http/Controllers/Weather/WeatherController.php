<?php

namespace App\Http\Controllers\Weather;

use App\Http\Controllers\Controller;
use App\Http\Resources\Users\UserResource;
use App\Models\User;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class WeatherController extends Controller
{
    public function __invoke(): AnonymousResourceCollection
    {
        return UserResource::collection(User::all()->makeHidden(['email_verified_at', 'updated_at', 'created_at']));
    }
}

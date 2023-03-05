<?php

namespace App\Http\Controllers;

use App\Events\WeatherFromAPIEvent;
use App\Http\Resources\UserResource;
use App\Http\Resources\WeatherResource;
use App\Jobs\WeatherJob;
use App\Models\User;
use App\Models\Weather;
use App\Traits\WeatherTrait;

class WeatherController extends Controller
{
    use WeatherTrait;
    public static function getUsersAndPullWeather()
    {
        $users = User::all();
        foreach ($users as $user) {
            WeatherJob::dispatch($user->id, $user->latitude, $user->longitude);
        }
    }

    public function getUsers()
    {
        return response()->json([
            'status' => true,
            'message' => 'all systems are a go',
            'users' => UserResource::collection( User::with('weather_report')->get())
        ], 200);
    }
    public function processWeatherForUser($userId, $lat, $lng)
    {
        try {
            $data = $this->getCurrentWeatherByCoords($lat, $lng);
            WeatherFromAPIEvent::dispatch($userId, $data);
            return true;
        } catch (\Throwable $th) {
            false;
        }
    }
    public function getWeatherDataOfUserLocation($userId)
    {
        try {
            $weatherdata = Weather::where('user_id', $userId)->first();
            if ($weatherdata == null) {
                return response()->json(
                    [
                        'status' => false,
                        'message' => 'data not found',
                    ],
                    204
                );
            }
            return response()->json(
                [
                    'status' => true,
                    'message' => 'Success',
                    'data' => new WeatherResource($weatherdata),
                ],
                200
            );
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'status' => false,
                    'message' => $th->getMessage(),
                ],
                400
            );
        }
    }
}

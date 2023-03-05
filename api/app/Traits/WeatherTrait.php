<?php

namespace App\Traits;

/**
 * @author Kwaku Amoh-Aboagye (Twitter: @MrKwakuAmoh)
 */

use App\Models\Weather;
use Illuminate\Support\Facades\Http;

trait WeatherTrait
{
    public $baseUrl;
    public $key;

    public function __construct()
    {
        $this->baseUrl = config('weather.base_endpoint');
        $this->key = config('weather.api_key');
    }
    private function weatherHttpClient($type, $paramString)
    {
        $url =
            $this->baseUrl . $type . '.json?key=' . $this->key . $paramString;
        $response = Http::get($url);

        return json_decode($response->getBody()->getContents());
    }

    private function getCurrentWeatherByCoords($lat, $lng)
    {
        $type = 'current';
        $param = '&q=' . $lat . ',' . $lng;
        return $this->weatherHttpClient($type, $param);
    }

    /**
     * Save weather for user
     * @return bool
     */
    private function saveWeatherInfo(
        int $userId,
        object $weatherData,
        object $locationData
    ) {
        return Weather::updateOrCreate(
            [
                'user_id' => $userId,
            ],
            [
                'user_id' => $userId,
                'weather_details' => json_encode((array) $weatherData),
                'location_details' => json_encode((array) $locationData),
                'weather_date' => $weatherData->last_updated,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        );
    }
}

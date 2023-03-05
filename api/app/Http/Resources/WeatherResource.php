<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WeatherResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'location' => json_decode($this->location_details),
            'weather' => json_decode($this->weather_details),
            'last_updated' => \Carbon\Carbon::parse($this->weather_date, json_decode($this->location_details)->tz_id)->diffForHumans()
        ];
    }
}

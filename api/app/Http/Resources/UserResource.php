<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $userName = explode(" ", $this->name);
        $firstName =  $userName[0] ?? 'K'; // piece1
        $lastName =     $userName[1] ?? 'A'; // piece2
        return [
          'id' => $this->id,
          'name' => $this->name,
          'email' => $this->email,
          'email_verified_at' => $this->email_verified_at,
          'user_icon'=>'https://ui-avatars.com/api/?name='.$firstName.'+'.$lastName.'&color=7F9CF5&background=EBF4FF',
          'weather_report' => $this->weather_report == null ? NULL : new WeatherResource($this->weather_report)
        ];
    }
}

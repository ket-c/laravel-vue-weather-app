<?php

namespace App\Listeners;

use App\Events\WeatherFromAPIEvent;
use App\Traits\WeatherTrait;

class ListerSaveWeatherFromAPI
{
    use WeatherTrait;
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(WeatherFromAPIEvent $event): void
    {
        $this->saveWeatherInfo($event->userId, $event->weatherCurrentData, $event->locationData);
    }
}

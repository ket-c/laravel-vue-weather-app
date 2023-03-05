<?php

namespace App\Jobs;

use App\Http\Controllers\WeatherController;
use App\Models\User;
use App\Traits\WeatherTrait;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class WeatherJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, WeatherTrait;

    public $userId;
    public $lat;
    public $lng;
    public $con;
    /**
     * Create a new job instance.
     */
    public function __construct($userId, $lat, $lng)
    {
        $this->userId = $userId;
        $this->lat = $lat;
        $this->lng = $lng;
        $this->con = new WeatherController();
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
     $this->con->processWeatherForUser($this->userId, $this->lat, $this->lng);
    }
}

<?php

namespace Tests\Unit;

use App\Http\Controllers\WeatherController;
use Tests\TestCase;

class WeatherProcessingTest extends TestCase
{
    private $con;
    public function setUp(): void
    {
        parent::setUp();
        $this->con = new WeatherController();

    }

    public function tearDown(): void
    {
        parent::tearDown();
    }
    /** @test */
    public function weather_pull_processing_for_user_successful(): void
    {
        $this->con->processWeatherForUser(17, -8.13969700,-156.59465600);
        $this->assertTrue(true);
    }

     /** @test */
    public function get_users_and_trigger_weather_job_successful(): void
    {
        $this->con->getUsersAndPullWeather();
        $this->assertTrue(true);
    }
}

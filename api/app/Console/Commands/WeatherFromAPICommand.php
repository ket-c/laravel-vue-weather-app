<?php

namespace App\Console\Commands;

use App\Http\Controllers\WeatherController;
use Illuminate\Console\Command;

class WeatherFromAPICommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:refresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pull weather from API source and update DB record';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        WeatherController::getUsersAndPullWeather();
    }
}

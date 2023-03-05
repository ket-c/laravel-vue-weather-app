<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class WeatherFromAPIEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $userId;
    public $weatherCurrentData;
    public $locationData;
    /**
     * Create a new event instance.
     */
    public function __construct($userId, $data)
    {
        $this->userId = $userId;
        $this->weatherCurrentData = $data->current;
        $this->locationData = $data->location;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [new PrivateChannel('channel-name')];
    }
}

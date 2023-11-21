<?php

namespace App\Events;

use App\Models\Siswa;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class SiswaCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $siswa;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Siswa $siswa)
    {
        $this->siswa = $siswa;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}

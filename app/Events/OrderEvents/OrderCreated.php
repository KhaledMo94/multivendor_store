<?php

namespace App\Events\OrderEvents;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OrderCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $order;
    public $store_id;
    public $addr;
    /**
     * Create a new event instance.
     */
    public function __construct($order, $store_id, $addr)
    {
        $this->order = $order;
        $this->store_id = $store_id;
        $this->addr = $addr;
    }

}

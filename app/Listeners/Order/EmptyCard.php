<?php

namespace App\Listeners\Order;

use App\Events\OrderEvents\OrderCreated;
use App\Repositories\Cart\CartRepositoryInterface;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class EmptyCard
{
    public $cart;
    /**
     * Create the event listener.
     */
    public function __construct(CartRepositoryInterface $cart)
    {
        $this->cart = $cart;
    }

    /**
     * Handle the event.
     */
    public function handle(OrderCreated $event): void
    {
        // $this->cart->empty();
    }
}

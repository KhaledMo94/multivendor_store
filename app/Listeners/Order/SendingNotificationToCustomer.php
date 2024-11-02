<?php

namespace App\Listeners\Order;

use App\Events\OrderEvents\OrderCreated;
use App\Models\DummyUser;
use App\Models\Order_Adress;
use App\Notifications\Order\OrderCreatedNotificationToCustomer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;
use Mockery\Matcher\Ducktype;

class SendingNotificationToCustomer
{

    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(OrderCreated $event): void
    {
        $notifiable = Order_Adress::where('type','billing')
        ->where('mail',$event->addr['addr']['billing']['mail'])
        ->get();
        
        Notification::send(
            $notifiable ,
            new OrderCreatedNotificationToCustomer($event->addr['addr'] , $event->store_id , $event->order)
        );
    }
}

<?php

namespace App\Listeners\Order;

use App\Events\OrderEvents\OrderCreated;
use App\Models\OrderAdress;
use App\Notifications\Order\OrderCreatedNotificationToCustomer;

use Illuminate\Support\Facades\Notification;

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
        $notifiable = OrderAdress::where('type','billing')
        ->where('mail',$event->addr['addr']['billing']['mail'])
        ->get();

        Notification::send(
            $notifiable ,
            new OrderCreatedNotificationToCustomer($event->addr['addr'] , $event->store_id , $event->order)
        );
    }
}

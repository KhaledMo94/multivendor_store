<?php

namespace App\Listeners\Order;

use App\Events\OrderEvents\OrderCreated;
use App\Models\User;
use App\Notifications\Order\OrderCreatedNotificationsToAdmins;
use App\Repositories\Cart\CartRepositoryInterface;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class SendingNotificationToAdmins
{
    /**
     * Create the event listener.
     */

    public function __construct()
    {

    }

    /**
     * Handle the event.
     */
    public function handle(OrderCreated $event): void
    {
        $notifiables = User::role([
            'super_admin',
            'moderator',
            'delivery',
        ])->where('store_id',$event->store_id)->get();

        Notification::sendNow($notifiables , new OrderCreatedNotificationsToAdmins($event->order,  $event->addr));
    }
}

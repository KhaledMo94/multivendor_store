<?php

namespace App\Listeners\Product;

use App\Events\ProductEvents\ProductStockAlert;
use App\Models\User;
use App\Notifications\Product\ProductAlertNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class SendProductStockAlert
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ProductStockAlert $event): void
    {
        $notifiables = User::role(['moderator','super_admin'])
        ->where('store_id',$event->product->store_id)
        ->get();

        Notification::sendNow($notifiables ,new ProductAlertNotification($event->product));
    }
}

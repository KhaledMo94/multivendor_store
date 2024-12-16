<?php

namespace App\Jobs\Orders;

use App\Models\Front\Order;
use App\Models\Order_Adress;
use App\Notifications\PendingOrderNotification;
use App\Notifications\SendingPaymentMailToPendingOrders;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Notification;

class SendingMailToPaymentPendingOrders implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $notifiables = Order_Adress::where('type', 'billing')
            ->whereHas('order', function ($query) {
                $query->whereDate('created_at', '<', now()->subDays(7))
                    ->where('payment_status', 'pending');
            })->get();

        foreach ($notifiables as $notifiable) {
            Notification::send($notifiable, new PendingOrderNotification());
        }
    }
}

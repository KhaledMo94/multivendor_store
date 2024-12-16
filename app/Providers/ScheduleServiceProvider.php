<?php

namespace App\Providers;

use App\Jobs\Database\ClearReadNotifications;
use App\Jobs\Database\RemoveOldCarts;
use App\Jobs\Orders\SendingMailToPaymentPendingOrders;
use App\Notifications\PendingOrderNotification;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\ServiceProvider;

class ScheduleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(Schedule $schedule): void
    {
        $schedule->job(new ClearReadNotifications)->dailyAt('02:00');
        $schedule->job(new SendingMailToPaymentPendingOrders)->everyFiveSeconds();
        $schedule->job(new RemoveOldCarts)->everyFifteenSeconds();
    }
}

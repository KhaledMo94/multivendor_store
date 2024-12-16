<?php

namespace App\Jobs\Database;

use App\Models\Order_Adress;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schedule;

class ClearReadNotifications implements ShouldQueue
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
        Log::info("ClearReadNotifications job started.");

        $deleted = DB::table('notifications')
            ->whereNotNull('read_at')
            ->whereDate('created_at', '<', now()->subDays(7))
            ->delete();

        if ($deleted > 0) {
            Log::info("Deleted {$deleted} notifications successfully.");
        } else {
            Log::info("No notifications to delete.");
        }

    }
}

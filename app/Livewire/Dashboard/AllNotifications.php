<?php

namespace App\Livewire\Dashboard;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;

class AllNotifications extends Component
{
    public $unreadNotifications;
    public $readNotifications;

    public function markAsRead($id)
    {
        $notification = DB::table('notifications')
        ->where('id',$id)
        ->update([
            'read_at'                   =>Carbon::now(),
        ]);

    }
    public function render()
    {
        $this->unreadNotifications = Auth::user()->unreadNotifications;
        $this->readNotifications = Auth::user()->readNotifications;
        return view('livewire.dashboard.all-notifications');
    }
}

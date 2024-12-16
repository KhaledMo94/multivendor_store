<?php

namespace App\Livewire\Dashboard;

use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Notifications extends Component
{
    public $notifications;


    public function render()
    {
        $this->notifications = Auth::user()->unreadNotifications;
        return view('livewire.dashboard.notifications');
    }
}

<?php

use App\Providers\ScheduleServiceProvider;
use Srmklive\PayPal\Providers\PayPalServiceProvider;

return [
    App\Providers\AppServiceProvider::class,
    App\Providers\CartServiceProvider::class,
    App\Providers\ScheduleServiceProvider::class,
    Pharaonic\Livewire\Tagify\TagifyServiceProvider::class,
    Spatie\Permission\PermissionServiceProvider::class,
    ScheduleServiceProvider::class,
    PayPalServiceProvider::class,
    
];

<?php

namespace App\Providers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        class_alias(Carbon::class , 'Carbon');
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //Adding Carbon as component
        
        
    }
}

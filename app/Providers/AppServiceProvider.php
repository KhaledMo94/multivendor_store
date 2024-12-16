<?php

namespace App\Providers;

use App\Helpers\CurrenciesHelpers;
use Faker\Factory;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use App\Helpers\ImagesHelpers;
use App\Helpers\TimeHelpers;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        class_alias(Carbon::class , 'Carbon');
        class_alias(ImagesHelpers::class,'Image');
        class_alias(CurrenciesHelpers::class,'Currency');
        class_alias(TimeHelpers::class, 'Time');
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
    }
}

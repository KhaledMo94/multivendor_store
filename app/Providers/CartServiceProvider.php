<?php

namespace App\Providers;

use App\Repositories\Cart\CartDatabase;
use App\Repositories\Cart\CartRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class CartServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CartRepositoryInterface::class ,CartDatabase::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

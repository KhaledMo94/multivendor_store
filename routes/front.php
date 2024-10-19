<?php

use App\Http\Controllers\Front\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'index'])->name('home');

Route::get('checkout',[HomeController::class,'checkout'])
        ->name('front.checkout');

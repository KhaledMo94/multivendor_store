<?php

use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'index'])->name('home');

Route::get('checkout',[HomeController::class,'checkout'])
        ->name('front.checkout');

Route::post('order/create',[OrderController::class,'checkout'])
        ->name('create.order');

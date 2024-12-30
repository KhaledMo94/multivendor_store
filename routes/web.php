<?php

use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Payment\PaypalController;
use App\Http\Controllers\Payment\PaypalWebhookController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;



Route::get('/breeze', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('breeze');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    require __DIR__.'/dashboard.php';
});

require __DIR__.'/auth.php';
require __DIR__.'/front.php';

Route::resource('store', StoreController::class);

Route::group([
    'prefix'                    =>'paypal',
],function(){
    Route::get('payment',[PaypalController::class,'payment'])->name('paypal.payment');
    Route::get('cancel',[PaypalController::class,'cancel'])->name('paypal.cancel');
    Route::get('success',[PaypalController::class,'success'])->name('paypal.success');
    Route::post('webhook', [PaypalWebhookController::class, 'handlePaypalWebhook']);
});

Route::group([
    'prefix'                    =>'auth',
],function($provider){
    Route::get('{provider}/redirect',[GoogleController::class,'googleRedirect'])->name('socialite.redirect');
    Route::get('{provider}/callback',[GoogleController::class,'googleCallback'])->name('socialite.callback');
});



<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StoreController;
use App\Models\Dashboard\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/breeze', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('breeze');

Route::middleware('auth','verified')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    require __DIR__.'/dashboard.php';
});

require __DIR__.'/auth.php';

Route::resource('store', StoreController::class);

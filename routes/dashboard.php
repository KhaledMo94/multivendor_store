<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Dashboard;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\ProductController;

Route::group([
    'prefix'                =>'admin'
],function(){
    Route::get('dashboard',[Dashboard::class , 'index'])
    ->name('dashboard');
    
    Route::resource('categories',CategoryController::class)->names([
        'index'             =>'dashboard.categories.index',
        'create'            =>'dashboard.categories.create',
        'store'             =>'dashboard.categories.store',
        'edit'              =>'dashboard.categories.edit',
        'update'            =>'dashboard.categories.update',
        'show'              =>'dashboard.categories.show',
        'destroy'           =>'dashboard.categories.destroy',
    ]);

    Route::resource('products',ProductController::class)->names([
        'index'             =>'dashboard.products.index',
        'create'            =>'dashboard.products.create',
        'store'             =>'dashboard.products.store',
        'edit'              =>'dashboard.products.edit',
        'update'            =>'dashboard.products.update',
        'show'              =>'dashboard.products.show',
        'destroy'           =>'dashboard.products.destroy',
    ]);
});
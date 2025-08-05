<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\isAdmin;
use App\Http\Middleware\isAuth;
use App\Http\Middleware\roleRedirect;
use App\Resources\Views\Panel\Admin\carBrand;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/testTemp', function(){ 
    return view('panel.layout.app');
});

Route::get('/firat', function(){
    return 'firat';
})->middleware('kayitliMi');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])->group(function(){
    Route::get('/code23', function(){
        return view('dashboard');
    })->name('dashboard');
});
    
// Admin Routers
// group middleware, kural veya prefix için kullanılmalı

Route::group(['prefix' => 'admin', 'middleware' => 'isAdmin'], function(){
    // grup elemanlarındaki adrese ulaşmak için url de prefix i önce yazmalıyız

    Route::get('/dashboard', [AdminController::class, 'index'])->name('adminDashboard');

    // Araba Marka Rotaları
    Route::group(['prefix' => 'carBrand'], function(){
        
        Route::get('/index', [AdminController::class, 'carBrandindex'])->name('admin.CarBrandIndex');
        Route::get('/create', [AdminController::class, 'carBrandCreatePage'])->name('admin.CarBrandCreate');
        Route::post('/add', [AdminController::class, 'carBrandAdd'])->name('admin.CarBrandAdd');
        Route::get('/update/{id}', [AdminController::class, 'carBrandUpdatePage'])->name('admin.CarBrandUpdatePage');
        Route::post('/update', [AdminController::class, 'carBrandUpdate'])->name('admin.CarBrandUpdate');
        Route::get('/delete/{id}', [AdminController::class, 'carBrandDelete'])->name('admin.CarBrandDelete');
    });
});
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\isAdmin;
use App\Http\Middleware\isAuth;

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

Route::get('/testTemp',function(){ return view('panel.layout.app');});



Route::get('/firat', function(){
    return 'firat';})
    ->middleware('kayitliMi');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])->group(function(){
    Route::get('/code23',function(){
        return view('dashboard');})
        ->name('dashboard');
    });
    
    //Admin Routers
    //group middleware, kural vaya prefix için kullanılmalı
    
Route::group(['prefix'=>'admin','middleware'=> 'kayitliMi','isAdmin'],function(){//grup elemanlarındaki adrese ulaşmak için url de prefix i önce yazmalıyız

   Route::get('/dashboard' ,[AdminController::class, 'index'])->name('adminDashboard');

    //Araba Marka Rotaları
    Route::group(['prefix'=>'carBrand','name'], function(){
        Route::get('/index',[AdminController::class, 'carBrandindex']);
        Route::get('/create',[AdminConroller::class, 'carBrandCreatePage']);
        Route::get('/update',[AdminController::class,'carBrandUpdatePage']);
      
});});

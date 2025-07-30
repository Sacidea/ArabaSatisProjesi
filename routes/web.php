<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
 use Illuminate\Support\Facades\Auth;

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
    
Route::group(['prefix'=>'admin'],function(){//grup elemanlarındaki adrese ulaşmak için url de prefix i önce yazmalıyız

   Route::get('/dashboard' ,[AdminController::class, 'index']);

    //Araba Marka Rotaları
    Route::group(['prefix'=>'carBrand','name'], function(){
        Route::get('/index',[AdminController::class, 'carBrandindex']);
        Route::get('/creat',[AdminConroller::class, 'carBrandCreatePage']);
        Route::get('/index',[AdminController::class,'carBrandUpdatePage']);
      
});});

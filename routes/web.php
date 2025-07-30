<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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
        ->name('dashboard');});

    //Admin Routers
    //group middleware, kural vaya prefix için kullanılmalı
    
//Route::group([],function(){

  //  Route::get('/admin/dashboard' ,[AdminController::class, 'index']);

//});

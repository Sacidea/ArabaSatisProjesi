<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\Authenticate;

use App\Http\Middleware\isAdmin;
use App\Http\Middleware\isAuth;
use App\Http\Middleware\roleRedirect;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'kayitliMi'=>isAuth::class,
            'isAdmin'=>isAdmin::class,
            'roleRedirect'=>roleRedirect::class
        ]);
        


    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //


    })->create();

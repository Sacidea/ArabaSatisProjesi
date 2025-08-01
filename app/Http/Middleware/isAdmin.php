<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {    

          $user=auth::user();
    
        if($user->role==1){
        return $next($request);//next middleware komutu 'devam et'
        }else{
        return abort(403);;//403 hatası erişim izni olmama durumu
        }
        
    }
}

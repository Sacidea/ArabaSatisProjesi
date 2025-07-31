<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class roleRedirect
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   

        $user=Auth::user();
        if($user->role==1){
             return redirect()->route('adminDashboard');}

        elseif($user->role==1){
            return redirect()->route('Dashboard');
        }else{
        return $next($request);}
    }
}

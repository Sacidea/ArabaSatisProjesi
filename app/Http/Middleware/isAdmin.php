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
    /*handle,Middleware'lerin zorunlu ana metodudur     
    *Her middleware isteği bu metot üzerinden işler
       Closure $next
     *Sonraki middleware/controller'a geçişi sağlayan callback fonksiyon
     *$next($request) şeklinde çağrıldığında işlem zinciri devam eder
    : Response
    Metodun dönüş tipi (PHP 7.0+ tip bildirimi)
    Bir Response nesnesi döneceğini garanti eder
    Örnek dönüşler: $next($request), response(), redirect()*/
      {

        

         $user=Auth::user();//Laravel'in kimlik doğrulama sisteminden oturum açmış kullanıcıyı al ve $user değişkenine kaydet
    
        if($user->role==1){
        return $next($request);//Bir sonraki 'request' middleware'ine geçiş yap ve kontrolü ona devret
        
        }else{
        return abort(403 , 'Bu sayfaya erişim yetkiniz bulunmuyor.');//403 hatası erişim izni olmama durumu
        }
        
        
    }

}
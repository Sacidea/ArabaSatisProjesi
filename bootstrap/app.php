

<?php
/*Bu kod Laravel uygulamasının temel yapılandırma dosyasıdır. Uygulama nasıl başlatılacağını, rotalar nerede bulunacağını,
 hangi middleware'lerin hangi takma adlarla kullanılacağını ve hata yönetiminin nasıl yapılacağını tanımlar.*/
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\isAdmin;
use App\Http\Middleware\isAuth;
use App\Http\Middleware\roleRedirect;


/*Application::configure() = Yeni uygulama instance'ı(nesnesi) oluştur ve yapılandır 
basePath: dirname(__DIR__) = Uygulamanın temel dizinini ayarla (bir üst klasör)
return = Bu yapılandırılmış uygulamayı döndür*/
return Application::configure(basePath: dirname(__DIR__))

    ->withRouting(  //Routing (yönlendirme) yapılandırmasını başlat
        web: __DIR__.'/../routes/web.php', // Web rotalarının dosya yolunu belirle (routes/web.php)
        api: __DIR__.'/../routes/api.php',//: API rotalarının dosya yolunu belirle (routes/api.php)
        commands: __DIR__.'/../routes/console.php',// Console komutlarının dosya yolunu belirle (routes/console.php)
        health: '/up',// Uygulamanın çalışıp çalışmasdığını kontrol eder /up adresinden cevap verir calışırorsa 200 ok döner calışmazsa hatayı döner
    )
    ->withMiddleware(function (Middleware $middleware): void {//->withMiddleware() = Middleware yapılandırmasını başlat
                                                            //function (Middleware $middleware): void = Anonim fonksiyon tanımla, parametre olarak Middleware al, hiçbir şey döndürme
        $middleware->alias([ //Middleware takma adları (alias) tanımlama işlemini başlat
            'kayitliMi'=>isAuth::class, // 'kayitliMi' takma adını isAuth middleware'ine ata
            'isAdmin'=>isAdmin::class, // 'isAdmin' takma adını isAdmin middleware'ine ata
            'roleRedirect'=>roleRedirect::class//roleRedirect' takma adını roleRedirect middleware'ine ata
        ]);
        


    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //


    })->create();
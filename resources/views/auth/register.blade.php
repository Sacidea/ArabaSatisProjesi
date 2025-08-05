<!DOCTYPE html>
<html lang="tr">
<head><!-- bu sayfa kendi oluşturduğumuz kayıt ol sayfası jetstream ın sayfa adını değiştirdik registerOriginal olarak
    bu nedenle kayıtta bu sayfa görünecek--
    *asset leri ekledik
    *form kısmına post metodunu ve router ekledik
    *name alanlarını orjinal register elemanlarının isim ve type ları aynı olacak şekilde ayarladık
    *pasword kısmı ayrıca önemli required_autocomplete de olmalı
    *hata mesajları için if bloğu eklendi-->
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>Dashtreme Admin - Free Dashboard for Bootstrap 4 by Codervent</title>
  <!-- loader-->
  <link href="{{asset('panel/assets/css/pace.min.css')}}" rel="stylesheet"/>
  <script src="{{asset('panel/assets/js/pace.min.js')}}"></script>
  <!--favicon-->
  <link rel="icon" href="{{asset('panel/assets/images/favicon.ico')}}" type="image/x-icon">
  <!-- Bootstrap core CSS-->
  <link href="{{asset('panel/assets/css/bootstrap.min.css')}}" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="{{asset('panel/assets/css/animate.css')}}" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="{{asset('panel/assets/css/icons.css')}}" rel="stylesheet" type="text/css"/>
  <!-- Custom Style-->
  <link href="{{asset('panel/assets/css/app-style.css')}}" rel="stylesheet"/>
  
</head>

<body class="bg-theme bg-theme1">

<!-- start loader    <input type="text" class="form-control form-control-rounded" id="input-6" placeholder="Enter Your Name">-->
   <div id="pageloader-overlay" class="visible incoming"><div class="loader-wrapper-outer"><div class="loader-wrapper-inner" ><div class="loader"></div></div>
   <!-- end loader -->

<!-- Start wrapper-->
 <div id="wrapper">

	<div class="card card-authentication1 mx-auto my-4">
		<div class="card-body">
		 <div class="card-content p-2">
		 	<div class="text-center">
		 		<img src="{{asset('/panel/assets/images/logo-icon.png')}}" alt="logo icon">
		 	</div>
		  <div class="card-title text-uppercase text-center py-3">Kayıt Sayfası</div>
		<!--hata mesajları-->
			@if($errors->any())
				@foreach($errors->all() as $e)
				<ul>
					<li>
						{{$e}}
					</li>
				</ul>
				@endforeach
		    @endif

        <!--form -->
		    <form method="POST"  action="{{ route('register') }}">
                @csrf
                  
			  <div class="form-group">
			  <label for="exampleInputName" class="">İsim</label>
			   <div class="position-relative has-icon-right">
				  <input type="text" id="exampleInputName" class="form-control form-control-rounded" name="name" placeholder="Adınızı giriniz">
				  <div class="form-control-position">
					  <i class="icon-user"></i>
				  </div>
			   </div>
			  </div>

            <div class="form-group">
			  <label for="exampleInputName" class="">Soyisim</label>
			   <div class="position-relative has-icon-right">
				  <input type="text" id="exampleInputName" class="form-control form-control-rounded" name="surname" placeholder="Adınızı giriniz">
				  <div class="form-control-position">
					  <i class="icon-user"></i>
				  </div>
			   </div>
			  </div>

			  <div class="form-group">
			  <label for="exampleInputEmailId" class="">Email </label>
			   <div class="position-relative has-icon-right">
				  <input type="email" id="exampleInputEmailId" class="form-control form-control-rounded" name="email" placeholder="Eposta adresini girinmiz">
				  <div class="form-control-position">
					  <i class="icon-envelope-open"></i>
				  </div>
			   </div>
			  </div>
			  <div class="form-group">
			   <label for="exampleInputPassword" class="">Şifre</label>
			   <div class="position-relative has-icon-right">
				  <input  id="exampleInputPassword" name="password" type="password" class="form-control form-control-rounded"  required autocomplete="new-password" placeholder="Şifrenizi giriniz">
				  <div class="form-control-position">
					  <i class="icon-lock"></i>
				  </div>
			   </div>
			  </div>


               <div class="form-group">
			   <label for="exampleInputPassword" class="">Parola tekrar</label>
			   <div class="position-relative has-icon-right">
				  <input  id="exampleInputPassword" type="password" name="password_confirmation" class="form-control form-control-rounded"  placeholder="Şifrenizi tekrar giriniz">
				  <div class="form-control-position">
					  <i class="icon-lock"></i>
				  </div>
			   </div>
			  </div>
			<!--referans kodu olmayan giriş yapamayacak db ile değil kontrolu createnewuser sayfasında yapıyoruz-->   
              	  <div class="form-group">
			  <label for="referans" class="">Referans Kodu</label>
			   <div class="position-relative has-icon-right">
				  <input type="text" id="referans" class="form-control form-control-rounded"  name="referans" placeholder="Referans kodunu giriniz">
				  <div class="form-control-position">
					  <i class="fa fa-yelp"></i>
				  </div>
			   </div>
			  </div>






			   <div class="form-group">
			     <div class="icheck-material-white">
                   
			     </div>
			    </div>
			  
			 <button type="submit"  class="btn btn-info btn-block waves-effect waves-light">Kayıt Ol</button>
			  
			 <div class="form-row mt-4">
			  <div class="form-group mb-0 col-6">
			 </div>
			 <div class="form-group mb-0 col-6 text-right">
			 </div>
			</div>
			
			 </form>
		   </div>
		  </div>
		  <div class="card-footer text-center py-3">
		    <p class="text-warning mb-0">Zaten bir hesabınız var mı? <a href="{{ route('login')}}"> Giriş Yapınız</a></p>
		  </div>
	     </div>
    
     <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
	<!--start color switcher-->
   <div class="right-sidebar">
    <div class="switcher-icon">
      <i class="zmdi zmdi-settings zmdi-hc-spin"></i>
    </div>
    <div class="right-sidebar-content">

      <p class="mb-0">Gaussion Texture</p>
      <hr>
      
      <ul class="switcher">
        <li id="theme1"></li>
        <li id="theme2"></li>
        <li id="theme3"></li>
        <li id="theme4"></li>
        <li id="theme5"></li>
        <li id="theme6"></li>
      </ul>

      <p class="mb-0">Gradient Background</p>
      <hr>
      
      <ul class="switcher">
        <li id="theme7"></li>
        <li id="theme8"></li>
        <li id="theme9"></li>
        <li id="theme10"></li>
        <li id="theme11"></li>
        <li id="theme12"></li>
		<li id="theme13"></li>
        <li id="theme14"></li>
        <li id="theme15"></li>
      </ul>
      
     </div>
   </div>
  <!--end color switcher-->
	
	</div><!--wrapper-->
	
  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('panel/assets/js/jquery.min.js')}}"></script>
  <script src="{{asset('panel/assets/js/popper.min.js')}}"></script>
  <script src="{{asset('panel/assets/js/bootstrap.min.js')}}"></script>
	
  <!-- sidebar-menu js -->
  <script src="{{asset('panel/assets/js/sidebar-menu.js')}}"></script>
  
  <!-- Custom scripts -->
  <script src="{{asset('panel/ssets/js/app-script.js')}}"></script>
  
</body>
</html>

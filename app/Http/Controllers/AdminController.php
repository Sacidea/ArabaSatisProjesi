<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Public\View;
use App\Resources\Views\Panel\admin;
use Illuminate\Support\Facades\Auth;
use App\Models\CarBrand;




class AdminController extends Controller
{
    public function index(){
        return view ('panel.admin.index');
    }



    public function carBrandindex(){
        //Car listesini getir
        $brands=CarBrand::get();

        //$user=auth::user();//erişim kontrolleri middleware de yatığımız için if bloğuna gerek kalmadı
        //if($user->role==1){
        return view('panel.admin.carBrand.index', compact('brands'));
        // }else{
        //  return abort(403);
        
    }
    public function carBrandCreatePage(){

        return view('panel.admin.carBrand.create');
    }


    

    public function carBrandAdd(Request $request){ //Yeni model ekleme sayfasında form kısmında çalışacak fonksiyon formun action da belirt
        
        $request->validate([
            //Laravel'in HTTP isteklerinde gelen verileri doğrulamak için kullandığı bir metottur. Eğer doğrulama kuralları sağlanmazsa, otomatik olarak kullanıcıyı önceki sayfaya yönlendirir ve hata mesajlarını gösterir.
            'brandName'=>'required|min:3|unique:car_brands,name'//"name alanı zorunludur (required) ve minimum 3 karakter uzunluğunda olmalıdır (min:3)."
        ]);
           $brand=new CarBrand();
           $brand->name=$request->brandName;//$brand model nesnesinin name alanını form alanındaki name adı 'brandNane' inputtan gelen veriyi ata
           $brand->save();
    
         return redirect()->route('admin.CarBrandIndex')->with('Başarıyla eklendi.');

    }




    public function carBrandUpdatePage($id){//Listeden güncellenecek elemen id si ile sayfaya taşıyacak
        $brand=CarBrand::find($id);// sadece id si eşleşen elemanı bulup getirecek


        return view('panel.admin.carBrand.update', compact('brand')); //belirtilen view dosyasını render ederken, o view içinde $brand değişkeninin kullanılabilir olmasını sağlar. 
        // View dosyasında bu değişkene $brand olarak erişilebilir.

    }

    public function carBrandUpdate(Request $request){
        $request->validate([//request değişkeninin uyması gereken kuralları yazıyoruz
            'brandName'=>'required|min:3|unique:car_brands,name',//form alanından gelen değerlerin name de belirtilen adları bradName ve brandId
            'brandId'=>'required|'//required zorunlu demek 

        ]);
        $oldBrand=CarBrand::findOrFail($request->brandId);
        $oldBrand->name=$request->brandName;
        $oldBrand->save();

         return redirect()->route('admin.CarBrandIndex')->with('success', 'Başarıyla güncellendi');
        
    }

    public function carBrandDelete($id){
        $brand=CarBrand::find($id);
        $brand->delete();

        return redirect()->route('admin.CarBrandIndex')->with(['success'=> 'Başarıyla silindi']);

        
        
        
        
        }
    }
    


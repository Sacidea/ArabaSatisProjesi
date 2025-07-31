<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\public\view;
use App\Http\Controllers\AdminController;
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

        //$user=auth::user();//erişim kontrolleri middlewzre de yatığımız için if bloğuna gerek kalmadı
        //if($user->role==1){
        return view('panel.admin.carBrand.index', compact('brands'));
       // }else{
        //  return abort(403);
        
    }


    

    public function carBrandCreatePage(){
        return view('panel.admin.carBrand.create');

    }
    public function carBrandUpdatePage(){
        return view('panel.admin.carBrand.update');

    }
}

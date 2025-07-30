<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\public\view;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        return view ('panel.admin.index');
    }
    public function carBrandindex(){
        $user=auth::user();
    
        if($user->role==1){
        return view('panel.admin.carBrand.index');
        }else{
            return 'hata';
    }
}
    public function carBrandCreatePage(){
        return view('panel.admin.carBrand.create');

    }
    public function carBrandUpdatePage(){
        return view('panel.admin.carBrand.update');

    }
}

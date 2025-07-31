<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CarBrand;

class CarBrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
  
    public function run(): void
    {
    /* $brand=new CarBrand();
    $brand->name='Toyota';
    $brand->save();

    $brand=new CarBrand();
    $brand->name='BMW';
    $brand->save();*/

    CarBrand::create([
        'name'=>'Honda'
    ]);
CarBrand::create([
        'name'=>'Hundai'
 ]);
    
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarBrand extends Model
{
   use HasFactory, SoftDeletes;
   protected $table='car_brands';



    public function getMarka(){
        return $this->HasMany(CarModel::class, 'brand_id', 'id');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory,SoftDeletes;
    protected $table='car_models';


    public function getMarke(){
        return $this->belongsTo(CarBrand::class, 'brand_id', 'id');
    }
}



<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarDemage extends Model
{
    use HasFactory,SoftDeletes;
    protected $table='car_damages';
}

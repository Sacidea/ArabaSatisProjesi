<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory,SoftDeletes;
    protected $table='cars';
}

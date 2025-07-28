<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaGallery extends Model
{
    use HasFactory, SoftDeletes;
    protected $table='media_galleries';

}

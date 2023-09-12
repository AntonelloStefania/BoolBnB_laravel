<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Apartment;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = ['photo_1', 'photo_2', 'photo_3','photo_4','photo_5','photo_6','photo_7','photo_8','photo_9','photo_10','photo_11','photo_12','photo_13','photo_14','photo_15', 'apartment_id'];

    public function apartment(){
        return $this->belongsTo(Apartment::class);
    }
}

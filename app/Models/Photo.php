<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Apartment;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = ['photo_1', 'apartment_id'];

    public function apartment(){
        return $this->belongsTo(Apartment::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Apartment;

class Map extends Model
{
    use HasFactory;

    protected $fillable = ['lat', 'lon'];

    public function apartment(){
        return $this->hasOne(Apartment::class);
    }
}

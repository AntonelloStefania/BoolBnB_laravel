<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Apartment;

class Service extends Model
{
    use HasFactory;
   
    protected $fillable= ['service_1','service_2','service_3','service_4','service_5',];
    
    public function apartments(){
        return $this->belongsToMany(Apartment::class);
    }
}

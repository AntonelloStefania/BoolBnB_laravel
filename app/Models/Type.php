<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

use App\Models\Apartment;

class Type extends Model
{
    use HasFactory;
   
    protected $fillable = ['name','slug'];

    public function apartments()
    {
        return $this->hasMany(Apartment::class);
    }

    public static function generateSlug($title){
        return Str::slug($title, '-');
    }
}

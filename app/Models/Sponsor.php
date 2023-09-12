<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use App\Models\Apartment;

class Sponsor extends Model
{
    use HasFactory;

    protected $fillable = ['sponsor_type', 'sponsor_time'];

    public function apartments()
    {
        return $this->hasMany(Apartment::class);
    }
}

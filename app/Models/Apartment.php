<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sponsor;
use App\Models\Type;
use App\Models\User;
use App\Models\Map;

class Apartment extends Model
{
    use HasFactory;

    public function type(){
        return $this->belongsTo(Type::class);
    }

    public function map(){
        return $this->belongsTo(Map::class);
    }

    public function sponsor()
    {
        return $this->belongsTo(Sponsor::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }
}

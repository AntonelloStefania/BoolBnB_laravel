<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sponsor;
use App\Models\Type;
use App\Models\User;
use App\Models\Map;
use App\Models\Photo;
use App\Models\Service;

class Apartment extends Model
{
    use HasFactory;

    protected $fillable = ['n_rooms', 'n_wc' ,'mq', 'owner_id', 'type_id','sponsor_id','sponsor_start','sponsor_end','photo'];

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

    public function services(){
        return $this->belongsToMany(Service::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
}

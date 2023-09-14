<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Sponsor;
use App\Models\Type;
use App\Models\User;
use App\Models\Map;
use App\Models\Photo;
use App\Models\Service;

class Apartment extends Model
{
    use HasFactory;

    protected $fillable = ['n_rooms', 'n_wc' ,'mq', 'user_id', 'type_id','cover','title','lat','lon','address','price','visibility','description','slug'];

    public function type(){
        return $this->belongsTo(Type::class);
    }
   
    public function sponsor()
    {
        return $this->belongsToMany(Sponsor::class);
    }

    public function user()
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

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public static function generateSlug($title){
        return Str::slug($title, '-');
    }
}

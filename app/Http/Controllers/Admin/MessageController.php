<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Apartment;
use App\Models\Message;

class MessageController extends Controller
{
    public function showApartmentMessages($apartmentId)
    {
        $apartment = Apartment::with('messages')->find($apartmentId);
    
        return view('admin.messages.show', compact('apartment'));
    }
}

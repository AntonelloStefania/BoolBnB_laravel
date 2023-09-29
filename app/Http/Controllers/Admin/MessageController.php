<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Apartment;
use App\Models\Message;

class MessageController extends Controller
{
    public function showApartmentMessages($apartmentId)
    {
        $apartment = Apartment::with('messages')->find($apartmentId);
        if($apartment->user_id === Auth::id()){
            foreach ($apartment->messages as $message) {
                if (!$message->read) {
                    $message->read = true;
                    $message->save();
                }
            }
    
        return view('admin.messages.show', compact('apartment'));
        } else {
            $message='NON TI PERMETTERE DI TOCCARE GLI APPARTAMENTI ALTRUI';
            return redirect()->route('admin.errors.error', compact('message'));
        }
    }
}

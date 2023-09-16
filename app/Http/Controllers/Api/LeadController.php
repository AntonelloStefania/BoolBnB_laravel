<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\Apartment;

class LeadController extends Controller
{
    public function store(Request $request, $slug){
        $apartment = Apartment::all()->where('slug', $slug)->first();
        
        $data = $request->all();


        $validator = Validator::make($data, [
            'name'          =>  'required',
            'email'         =>  'required|email',
            'content'       =>  'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'success'   => false,
                'errors'    => $validator->errors()
            ]);
        }

        $new_lead = new Lead();
        $new_lead->fill($data);
        $new_lead->save();

        Mail::to('contact@bnb.com')->send(new NewContact($new_lead));

        return response()->json([
            'success'       => true
        ]);
    }


}

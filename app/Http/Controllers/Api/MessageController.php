<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Apartment;
use App\Mail\NewContact;


class MessageController extends Controller
{
public function store(Request $request) {
    $data = $request->all();
    $validator= Validator::make($data,[
        'apartment_id' =>'required|exists:apartments,id',
        'name'=>'required',
        'surname'=>'required',
        'email'=>'required',
        'message'=>'required'
    ]);
    if($validator->fails()){
        return response()->json([
            'success'=>false,
            'error'=>$validator->errors()
        ]);

    }else{
        $newMessage= new Message();
        $newMessage->fill($data);
        $newMessage->save();
        Mail::to('contact@bnb.com')->send(new NewContact([
            'name' =>$newMessage->name,
            'surname' => $newMessage->surname,
            'email'=>$newMessage->email,
            'message'=>$newMessage->message,
            'apartment_id'=>$newMessage->apartment_id,
        ]));

        return response()->json([
            'success'=>true
        ]);
    }
}

}

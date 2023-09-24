<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Braintree\Gateway;
use Braintree\ClientToken;

class BraintreeController extends Controller
{


    // public function token(Request $request){

    //     $gateway = new Gateway([
    //         'environment' => env('BRAINTREE_ENV'),
    //         'merchantId' => env('BRAINTREE_MERCHANT_ID'),
    //         'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
    //         'privateKey' => env('BRAINTREE_PRIVATE_KEY')
    //     ]);
    // //     $clientToken = $gateway->clientToken()->generate();
    // //     return view ('admin.apartments.braintree',['token' => $clientToken]);
    
    //     if($request->input('nonce') != null){
    //         $nonceFromTheClient = $request->input('nonce');
    
    //         $gateway->transaction()->sale([
    //             'amount' => '10.00',
    //             'paymentMethodNonce' => $nonceFromTheClient,
    //             'options' => [
    //             'submitForSettlement' => true 
    //             ]
    //         ]);
    //         // return view ('dashboard');
    //     }else{
    //         $clientToken = $gateway->clientToken()->generate();
    //         return view ('admin.apartments.braintree',['token' => $clientToken]);
    //     }
    
    //  }

    
    public function  processPayment(Request $request)
    {
        // $gateway = new Gateway([
        //     'environment' => env('BRAINTREE_ENV'),
        //     'merchantId' => env('BRAINTREE_MERCHANT_ID'),
        //     'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
        //     'privateKey' => env('BRAINTREE_PRIVATE_KEY')
        // ]);

        // $nonce = $request->input('payment_method_nonce');
        // if($request->input('nonce') != null){
        //             $nonceFromTheClient = $request->input('nonce');
           
        //             $gateway->transaction()->sale([
        //                 'amount' => '10.00',
        //                 'paymentMethodNonce' => $nonceFromTheClient,
        //                 'options' => [
        //                 'submitForSettlement' => true 
        //                 ]
        //             ]);
                    
        //            return view ('admin.apartments.index');
        //         }else{
        //             $clientToken = $gateway->clientToken()->generate();
        //             return view ('admin.apartments.braintree',['token' => $clientToken]);
        //         }
            


        $gateway = new \Braintree\Gateway([
            'environment' => env('BRAINTREE_ENV'),
            'merchantId' => env("BRAINTREE_MERCHANT_ID"),
            'publicKey' => env("BRAINTREE_PUBLIC_KEY"),
            'privateKey' => env("BRAINTREE_PRIVATE_KEY")
        ]);
    
        if($request->input('nonce') != null){
            $nonce = $request->input('nonce');
            dd($nonce);
            $gateway->transaction()->sale([
                'amount' => '10.00',
                'paymentMethodNonce' => $nonce,
                'options' => [
                'submitForSettlement' => True
                ]
            ]);
            return view ('admin.apartments.braintree');
        }else{
            $clientToken = $gateway->clientToken()->generate();
            return view ('admin.apartments.braintree',['token' => $clientToken]);
        }
    }
}


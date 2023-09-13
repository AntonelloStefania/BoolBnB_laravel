<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Apartment;
use App\Models\Type;

class ApartmentController extends Controller
{
    public function index(){
        $apartment = Apartment::all();
        return response()->json([
            'success' => true,
            'results' => $apartment
        ]);
    }

    public function show($slug){
        $apartment = Apartment::all()->where('slug', $slug);

        if($apartment){
            
            return response()->json([
                'success' => true,
                'apartment' => $apartment
            ]);

        } else{

            return response()->json([
                'success' => false,
                'error' => 'Nessun progetto trovato'
            ]);
        }
    }
}

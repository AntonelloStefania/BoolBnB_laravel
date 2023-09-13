<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Apartment;

class ApartmentController extends Controller
{
    public function index(){
        $apartment = Apartment::all();
        return response()->json([
            'success' => true,
            'results' => $apartment
        ]);
    }
}
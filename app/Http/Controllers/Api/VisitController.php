<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Visit;
use App\Models\Apartment;

class VisitController extends Controller
{
    public function store(Request $request) {
        $data = $request->all();
        $newVisit= new Visit();
        $newVisit->fill($data);
        $newVisit->save();

        return response()->json([
            'success'=>true
        ]);
    }
}

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
        $newVisit = Visit::firstOrNew(['ip' => $data['ip'], 'apartment_id' => $data['apartment_id']], $data);
        $newVisit->save();

        return response()->json([
            'success'=>true
        ]);
    }
}

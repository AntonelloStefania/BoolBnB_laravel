<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Apartment;

class ApartmentController extends Controller
{
    public function index(){
        $apartment = Apartment::with('type')->get();
        return response()->json([
            'success' => true,
            'results' => $apartment
        ]);
    }

    public function show($slug){
        $apartment = Apartment::with(['type','services','photos'])->where('slug', $slug)->first();
       
        
        if($apartment){
            
            return response()->json([
                'success' => true,
                'apartment' => $apartment
            ]);

        } else{

            return response()->json([
                'success' => false,
                'error' => 'Nessun bnb trovato'
            ]);
        }
    }

    
    //funzione recupero coordinate per marker su mappa
    public function recuperaCoordinate()
    {
        // Recupera le coordinate lat e lon degli appartamenti dal tuo database
        $coordinate = Apartment::select('lat', 'lon')->get();

        // Restituisci i dati come risposta JSON
        return response()->json([
            'success'=>true,
            'results'=>$coordinate
        ]);
        
    }

        
    //funzione recupero indirizzo per filtro su appartamenti
    public function recuperaIndirizzo(Request $request)
    {
        try {
            // Ottieni tutti i dati dalla richiesta
            $data = $request->all();
    
            // Estrai i parametri di latitudine e longitudine dai dati
            $min_lat = $data['min_lat'];
            $max_lat = $data['max_lat'];
            $min_lon = $data['min_lon'];
            $max_lon = $data['max_lon'];
    
            // Esegui la query per recuperare gli appartamenti filtrati
            $apartments = Apartment::whereBetween('lon', [$min_lon, $max_lon])
                ->whereBetween('lat', [$min_lat, $max_lat])
                ->get();
    
            // Verifica se ci sono risultati
            if ($apartments->isEmpty()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Nessun appartamento trovato con i criteri specificati.'
                ]);
            }
    
            // Restituisci i dati come risposta JSON
            return response()->json([
                'success' => true,
                'results' => $apartments
            ]);
        } catch (\Exception $e) {
            // Gestisci gli errori e restituisci una risposta di errore
            return response()->json([
                'success' => false,
                'message' => 'Si è verificato un errore durante la ricerca degli appartamenti.'
            ]);
        }
    }
    
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Facades\Support\DB;

use App\Models\Apartment;
use App\Models\Service;
use App\Models\Sponsor;

class ApartmentController extends Controller
{
    


public function index()
{
    $sponsorIds = []; 
    $sponsors = Sponsor::where('name', '!=', 'free')->get();
    $length = count($sponsors);
    for($i=0; $i<$length; $i++){
        $sponsor = $sponsors[$i];
        $sponsorIds[] = $sponsor->id;
    }

    $apartments = Apartment::where('visibility', 1)
        ->whereHas('sponsors', function ($query) use ($sponsorIds) {
            $query->whereIn('sponsor_id', $sponsorIds);
        })
        ->with(['type', 'sponsors' => function ($query) use ($sponsorIds) {
            $query->whereIn('sponsor_id', $sponsorIds);
        }])
        ->get();

    // Ordina l'array di appartamenti in base all'ID dello sponsor
    $apartments = $apartments->sortByDesc(function ($apartment) {
        return $apartment->sponsors->first()->id;
    });

    // Trasforma l'array ordinato in un array associativo
    $apartments = $apartments->values()->all();

    return response()->json([
        'success' => true,
        'results' => $apartments
    ]);
}


//METODO PER PASSARE TUTTI GLI ALLOGGI IN ORDINE DECRESCENTE DI SPONSORS.ID
public function allIndex(){
    

    $apartments = Apartment::where('visibility', 1)
     
        ->with(['type', 'sponsors'])
        ->get();

    // Ordina l'array di appartamenti in base all'ID dello sponsor
    $apartments = $apartments->sortByDesc(function ($apartment) {
        return $apartment->sponsors->first()->id;
    });

    // Trasforma l'array ordinato in un array associativo
    $apartments = $apartments->values()->all();

    return response()->json([
        'success' => true,
        'results' => $apartments
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
        $sponsorIds = []; 
        $sponsors = Sponsor::where('name', '!=', 'free')->get();
        $length = count($sponsors);
        for($i=0; $i<$length; $i++){
            $sponsor = $sponsors[$i];
            $sponsorIds[] = $sponsor->id;
        }

        // Recupera le coordinate lat e lon degli appartamenti dal tuo database
        $coordinate = Apartment::where('visibility', 1)
        ->select('lat', 'lon')
        ->whereHas('sponsors', function ($query) use ($sponsorIds) {
            $query->whereIn('sponsor_id', $sponsorIds);
        })
        ->with(['type', 'sponsors' => function ($query) use ($sponsorIds) {
            $query->whereIn('sponsor_id', $sponsorIds);
        }])
        ->get();

        // $coordinate = Apartment::select('lat', 'lon')->get();

        // Restituisci i dati come risposta JSON
        return response()->json([
            'success'=>true,
            'results'=>$coordinate
        ]);
        
    }

        
    //funzione recupero indirizzo per filtro su appartamenti
    public function recuperaTuttiIndirizzi(Request $request)
    {
        $data = $request->all();
        $validator= Validator::make($data,[
            'mq'=>'min:1|max:25',
            'rooms'=>'min:1|max:25',
            'wc'=>'min:1|max:25',
            'beds'=>'min:1|max:25',
        ]);
        if($validator->fails()){
            return response()->json([
                'success'=>false,
                'error'=>$validator->errors()
            ]);
    
        }else{
        try {
                // Ottieni tutti i dati dalla richiesta
                $min_lon = $request->input('min_lon', null);
                $max_lon = $request->input('max_lon', null);
                $min_lat = $request->input('min_lat', null);
                $max_lat = $request->input('max_lat', null);
                $wc = $request->input('wc', null);
                $rooms = $request->input('rooms', null);
                $mq = $request->input('mq', null);
                $beds = $request->input('beds', null);
                $services = $request->input('services', null);
        
                // Esegui la query per recuperare gli appartamenti filtrati
                $apartments = Apartment::where('visibility', 1)
                    ->when($min_lon !== null && $max_lon !== null, function ($query) use ($min_lon, $max_lon) {
                        return $query->whereBetween('lon', [$min_lon, $max_lon]);
                    })
                    ->when($min_lat !== null && $max_lat !== null, function ($query) use ($min_lat, $max_lat) {
                        return $query->whereBetween('lat', [$min_lat, $max_lat]);
                    })
                    ->when($wc !== null, function ($query) use ($wc) {
                        return $query->where('n_wc', '>=', $wc);
                    })
                    ->when($rooms !== null, function ($query) use ($rooms) {
                        return $query->where('n_rooms', '>=', $rooms);
                    })
                    ->when($mq !== null, function ($query) use ($mq) {
                        return $query->where('mq', '>=', $mq);
                    })
                    ->when($beds !== null, function ($query) use ($beds) {
                        return $query->where('n_beds', '>=', $beds);
                    })
                    ->when($services !== null, function ($query) use ($services) {
                        $query->whereHas('services', function ($query) use ($services) {
                            return $query->whereIn('service_id', $services);
                        }, '>=', count($services)); // aggiungi questo parametro
                    })
                    ->with('type', 'services')
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
                    'message' => 'Si è verificato un errore durante la ricerca degli appartamenti.',
                ]);
            }
        };
    }

    //Variante con solo gli appartamenti in evidenza
    public function recuperaIndirizzo(Request $request)
    {
        try {
            // Ottieni tutti i dati dalla richiesta
            $data = $request->all();
            $sponsorIds = []; 
            $sponsors = Sponsor::where('name', '!=', 'free')->get();
            $length = count($sponsors);
            for($i=0; $i<$length; $i++){
                $sponsor = $sponsors[$i];
                $sponsorIds[] = $sponsor->id;
            }
    
            // Estrai i parametri di latitudine e longitudine dai dati
            $min_lat = $data['min_lat'];
            $max_lat = $data['max_lat'];
            $min_lon = $data['min_lon'];
            $max_lon = $data['max_lon'];
    
            // Esegui la query per recuperare gli appartamenti filtrati
            $apartments = Apartment::where('visibility', 1)
            ->whereHas('sponsors', function ($query) use ($sponsorIds) {
                $query->whereIn('sponsor_id', $sponsorIds);
            })
            ->whereBetween('lon', [$min_lon, $max_lon])
            ->whereBetween('lat', [$min_lat, $max_lat])
            ->with(['type', 'sponsors' => function ($query) use ($sponsorIds) {
                $query->whereIn('sponsor_id', $sponsorIds);
            }])
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

    public function recuperaServizi(){
        $services = Service::all();

        // Restituisci i dati come risposta JSON
        return response()->json([
            'success' => true,
            'results' => $services,
        ]);
    }


    
}

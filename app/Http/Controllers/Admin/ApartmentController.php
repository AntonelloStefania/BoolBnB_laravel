<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreApartmentRequest;
use App\Http\Requests\UpdateApartmentRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;

use App\Models\Apartment;
use App\Models\Service;
use App\Models\Sponsor;
use App\Models\Photo;
use App\Models\Visit;
use App\Models\Type;
use App\Models\User;
use App\Models\Message;
use App\Models\Visit;
use Braintree\Gateway as Gateway;
use Braintree\Transaction as Transaction;
use Braintree\ClientToken;


class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {   
        
    //     if (Auth::check()){
    //         $userId = Auth::id();
    //         $apartments= Apartment::where('user_id', $userId)->get();

    //         if(!$apartments->isEmpty()){
    //             return view('admin.apartments.index', compact('apartments'));
    //         }else{
    //             return view('home');
    //         }
    //     }
    //         $apartments= Apartment::all();
            
    //         return view('admin.apartments.index', compact('apartments','types'));
       
    // }


//PROVA PASSAGGIO SPONSORS <---------- con questa recupero tutti gli sponsor fatti di un appartamento UTILE PER LE STATS

//     public function index()
// {
//     if (Auth::check()) {
//         $userId = Auth::id();
//         $apartments = Apartment::where('user_id', $userId)
//             ->with('sponsors') // Carica gli sponsor per ogni appartamento
//             ->get();

//         if (!$apartments->isEmpty()) {
//             return view('admin.apartments.index', compact('apartments'));
//         } else {
//             return view('home');
//         }
//     }

//     $apartments = Apartment::with('sponsors') // Carica gli sponsor per ogni appartamento
//         ->get();

//     return view('admin.apartments.index', compact('apartments', 'types'));
// }


//FINE PROVA PASSAGGIO SPONSORS CHE PASSA TUTTE LE SPONSORIZZAZIONI


//TERZA PROVA
public function index()
{$currentDateTime=now();
    if (Auth::check()) {
        $userId = Auth::id();
        $apartments = Apartment::where('user_id', $userId)
        ->with(['type', 'services', 'sponsors' => function ($query) use ($currentDateTime) {
            $query->where('end', '>', $currentDateTime);
        }])
        ->get();

   

        // Ottieni l'ultimo sponsor valido
       
        
        if (!$apartments->isEmpty()) {
            return view('admin.apartments.index', compact('apartments'));
        } else {
            return view('home');
        }
    }

        
    return view('admin.apartments.index', compact('apartments', 'types','sponsors'));
}

//FINE TERZA PROVA
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types=Type::all();
        $services= Service::all();
        // $sponsors=Sponsor::all();
        $user=Auth::user();
       

        return view('admin.apartments.create', compact('types','services','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreApartmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreApartmentRequest $request, User $user)
    {
        $form_data = $request->all();
        $apartment = new Apartment();
        // $sponsors = Sponsor::all();

        if($request->hasFile('cover')){
            $path=Storage::put('apartment_photos',$request->cover);
            $form_data['cover']=$path;
        }
       
        $visibility = $request->has('visibility') ? 1 : 0;
        $form_data['slug'] = Str::slug($form_data['title'],'-'); 
        $apartment->fill($form_data);
       
        $apartment->save();
        
        if($request->has('name')){
            $apartment->services()->attach($request->name);
        }
        // if($request->has('sponsor_id')){
        //     $time= '';
        //     $length= count($sponsors);
        //     for($i=0; $i<$length;  $i++){
        //         $sponsor= $sponsors[$i];

        //         if($sponsor->id == $request->sponsor_id){
        //             $time = intval($sponsor->time);
        //         }
        //     }
        //     $apartment->sponsors()->attach($request->sponsor_id, ['start' => date("m-d-Y h:i:s"),'end' => date("m-d-Y h:i:s", mktime(date('h') + $time , date("i"), date("s"), date("m"), date("d"), date("Y")))]);
        // }
        return redirect()->route('admin.apartments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment)
    {   $currentDateTime=now();
        if (Auth::check()) {
            $userId = Auth::id();
            $apartments = Apartment::where('user_id', $userId)
            ->with(['type', 'services', 'sponsors' => function ($query) use ($currentDateTime) {
                $query->where('end', '>', $currentDateTime);
            }])
            ->get();}
        if($apartment->user_id === Auth::id()){
            $photos=Photo::all();
            
            return view('admin.apartments.show', compact('apartment','photos'));
        } else {
            $message='NON TI PERMETTERE DI TOCCARE GLI APPARTAMENTI ALTRUI';
            return redirect()->route('admin.errors.error', compact('message'));
        }

       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function edit(Apartment $apartment)
    {
        if($apartment->user_id === Auth::id()){
            $types=Type::all();
            $services= Service::all();
            $sponsors=Sponsor::all();
            $user=Auth::user();
            return view('admin.apartments.edit', compact('apartment','types','services','sponsors','user'));
        } else {
            $message='NON TI PERMETTERE DI TOCCARE GLI APPARTAMENTI ALTRUI';
            return redirect()->route('admin.errors.error', compact('message'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateApartmentRequest  $request
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateApartmentRequest $request, Apartment $apartment)
    {
        $form_data = $request->all();
        $apartment->services()->detach(); 
        if($request->has('name')){
            $apartment->services()->attach($request->name);}
        if($request->hasFile('cover')){
            if($apartment->cover){
                Storage::delete($apartment->cover);
            }
            

            $path = Storage::put('apartment_photos', $request->cover);

            $form_data['cover'] = $path;
        }else {
            // Mantieni il valore esistente del campo "cover"
            $form_data['cover'] = $apartment->cover;
        }

        $form_data['slug'] = Str::slug($form_data['title'],'-'); 
        $form_data['visibility'] = intval($form_data['visibility']);
        
        $apartment->update($form_data);
        $apartment->save();
        
        if($request->has('name')){
            $apartment->services()->sync($request->name);
        }
        return redirect()->route('admin.apartments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apartment $apartment)
    {
        $photos= Photo::all();
        $messages= Message::all();
        $visits= Visit::all();
        $length= count($photos);
        $lengthMessage= count($messages);
        $lengthVisit= count($visits);
        for($i=0; $i<$length; $i++){
            $photo= $photos[$i];
            if($photo->apartment_id == $apartment->id){
                Storage::delete($photo->url);
                $photo->delete();
            }
        };
        for($i=0; $i<$lengthVisit; $i++){
            $visit= $visits[$i];
            if($visit->apartment_id == $apartment->id){
                $visit->delete();
            }
        };
        for($i=0; $i<$lengthMessage; $i++){
            $message= $messages[$i];
            if($message->apartment_id == $apartment->id){
                $message->delete();
            }
        };

        Storage::delete($apartment->cover);
        $apartment->services()->detach();
        $apartment->sponsors()->detach();

        $apartment->delete();

        return redirect()->route('admin.apartments.index');
    }




//SECONDA PROVA PAGAMENTO <-------------------------------------------FUNZIONA 
    public function showPaymentForm($apartmentId)
{
    // Recupera l'appartamento in base all'ID
    $apartment = Apartment::find($apartmentId);
    if($apartment->user_id === Auth::id()){

        $sponsors = Sponsor::where('id', '>', 1)->get();
        if (!$apartment) {
            // Gestisci il caso in cui l'appartamento non esista
        }

        // Genera il token di pagamento da Braintree
        $gateway = new Gateway([
            'environment' => env('BRAINTREE_ENV'),
            'merchantId' => env('BRAINTREE_MERCHANT_ID'),
            'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
            'privateKey' => env('BRAINTREE_PRIVATE_KEY')
        ]);

        $clientToken = $gateway->clientToken()->generate();

        return view('admin.apartments.braintree', ['apartment' => $apartment, 'clientToken' => $clientToken, 'sponsors' => $sponsors]);
        } else {
            $message='NON TI PERMETTERE DI TOCCARE GLI APPARTAMENTI ALTRUI';
            return redirect()->route('admin.errors.error', compact('message'));
        }
    }
   
public function processPayment(Request $request)
{
    // Esegui il processo di pagamento utilizzando Braintree
    // Recupera i dati del pagamento dal form inviato
    $form_data= $request->all();
   $nonce = $request->nonce;

   
   $apartmentId = $request->input('apartmentId');; // Aggiungi questa riga per recuperare l'ID dell'appartamento
    // Recupera l'appartamento
    $sponsorId = $request->input('sponsor_id');
    $apartment = Apartment::find($apartmentId);
    
    // Esegui la transazione con Braintree utilizzando $nonce
    $gateway = new Gateway([
        'environment' => env('BRAINTREE_ENV'),
        'merchantId' => env('BRAINTREE_MERCHANT_ID'),
        'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
        'privateKey' => env('BRAINTREE_PRIVATE_KEY')
    ]);
    

    // if($form_data['sponsor_id']== 1){
   if($sponsorId == 2){
    

    $result = $gateway->transaction()->sale([
        'amount' => '2.99', // Importo dell'ordine
        'paymentMethodNonce' =>  'fake-valid-nonce',
        'options' => [
            'submitForSettlement' => true
            ]
    ]);
    
    if ($result->success) {
        // Pagamento avvenuto con successo
        $apartment->sponsors()->attach($sponsorId, ['start' => now(), 'end' => now()->addHours(24)]);
        return redirect()->route('admin.apartments.index'); // Personalizza con la tua vista di successo
    } else {
        // Pagamento fallito, gestisci l'errore
        $errorMessage = $result->message;
        // Esegui il reindirizzamento a una pagina di errore
        return redirect()->route('admin.home', ['errorMessage' => $errorMessage]);
    }
    
    
}
if($sponsorId == 3){
    

    $result = $gateway->transaction()->sale([
        'amount' => '5.99', // Importo dell'ordine
        'paymentMethodNonce' =>  'fake-valid-nonce',
        'options' => [
            'submitForSettlement' => true
            ]
    ]);

    if ($result->success) {
        // Pagamento avvenuto con successo
        $apartment->sponsors()->attach($sponsorId, ['start' => now(), 'end' => now()->addHours(72)]);
        return redirect()->route('admin.apartments.index'); // Personalizza con la tua vista di successo
    } else {
        $errorMessage = $result->message;
        // Esegui il reindirizzamento a una pagina di errore
        return redirect()->route('admin.home', ['errorMessage' => $errorMessage]);
    }
    
    
}
if($sponsorId == 4){
    

    $result = $gateway->transaction()->sale([
        'amount' => '9.99', // Importo dell'ordine
        'paymentMethodNonce' =>  'fake-valid-nonce',
        'options' => [
            'submitForSettlement' => true
            ]
    ]);


    if ($result->success) {
        $apartment->sponsors()->attach($sponsorId, ['start' => now(), 'end' => now()->addHours(144)]);
        return redirect()->route('admin.apartments.index'); // Personalizza con la tua vista di successo
    } else {
        // Pagamento fallito, gestisci l'errore
        $errorMessage = $result->message;
        return redirect()->route('admin.home', ['errorMessage' => $errorMessage]);
    }
  
}
}
    public function errors(){
        return view('admin.errors.error');
    }


    //STATISTICHEZ
    public function getStats($id)
    {
        // Recupera l'appartamento specifico
        $apartment = Apartment::find($id);
    
        // Verifica se l'utente autenticato è il proprietario dell'appartamento
        if ($apartment->user_id === Auth::id()) {
            // Recupera tutti i messaggi relativi all'appartamento
            $messages = $apartment->messages;
    
            // Recupera tutti gli sponsor relativi all'appartamento
            $sponsors = $apartment->sponsors;

            $visits = $apartment->visits;
            $currentYearMessagesCount = DB::table('messages')
            ->where('apartment_id', $apartment->id)
            ->whereYear('created_at', now()->year)
            ->count();

                // Recupera il conteggio dei messaggi del mese corrente
            $currentMonthMessagesCount = DB::table('messages')
            ->where('apartment_id', $apartment->id)
            ->whereYear('created_at', now()->year)
            ->whereMonth('created_at', now()->month)
            ->count();

            // Recupera il conteggio dei messaggi dell'anno precedente
            $lastYearMessagesCount = DB::table('messages')
            ->where('apartment_id', $apartment->id)
            ->whereYear('created_at', now()->subYear()->year)
            ->count();



             // Recupera il conteggio delle visite dell'anno corrente
        $currentYearVisitsCount = DB::table('visits')
        ->where('apartment_id', $apartment->id)
        ->whereYear('created_at', now()->year)
        ->count();

        // Recupera il conteggio delle visite del mese corrente
        $currentMonthVisitsCount = DB::table('visits')
            ->where('apartment_id', $apartment->id)
            ->whereYear('created_at', now()->year)
            ->whereMonth('created_at', now()->month)
            ->count();

        // Recupera il conteggio delle visite dell'anno precedente
        $lastYearVisitsCount = DB::table('visits')
            ->where('apartment_id', $apartment->id)
            ->whereYear('created_at', now()->subYear()->year)
            ->count();


             // Recupera gli sponsor dell'anno corrente con i loro nomi
        $currentYearSponsors = DB::table('sponsors')
        ->join('apartment_sponsor', 'sponsors.id', '=', 'apartment_sponsor.sponsor_id')
        ->where('apartment_sponsor.apartment_id', $apartment->id)
        ->whereYear('apartment_sponsor.end', now()->year)
        ->count();

    // Recupera gli sponsor del mese corrente con i loro nomi
    $currentMonthSponsors = DB::table('sponsors')
        ->join('apartment_sponsor', 'sponsors.id', '=', 'apartment_sponsor.sponsor_id')
        ->where('apartment_sponsor.apartment_id', $apartment->id)
        ->whereYear('apartment_sponsor.start', now()->year)
        ->whereMonth('apartment_sponsor.start', now()->month)
        ->count();

    // Recupera gli sponsor dell'anno precedente con i loro nomi
    $lastYearSponsors = DB::table('sponsors')
        ->join('apartment_sponsor', 'sponsors.id', '=', 'apartment_sponsor.sponsor_id')
        ->where('apartment_sponsor.apartment_id', $apartment->id)
        ->whereYear('apartment_sponsor.end', now()->subYear()->year)
        ->count();


           
    
            // Ora puoi utilizzare $messages e $sponsors per le tue statistiche
            // Ad esempio, puoi contare i messaggi o analizzare gli sponsor attivi, ecc.
    
            return view('admin.apartments.stats', compact('apartment', 'messages', 'sponsors','currentYearMessagesCount','currentMonthMessagesCount','lastYearMessagesCount','currentYearVisitsCount','currentMonthVisitsCount','lastYearVisitsCount','currentYearSponsors','currentMonthSponsors','lastYearSponsors'));
        } else {
            $message = 'NON TI PERMETTERE DI TOCCARE GLI APPARTAMENTI ALTRUI';
            return redirect()->route('admin.errors.error', compact('message'));
        }
    }
    
    
    //FINE STATISTICHEZ
}







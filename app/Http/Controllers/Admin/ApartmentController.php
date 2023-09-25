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
use App\Models\Type;
use App\Models\User;
use App\Models\Message;
use Braintree\Gateway;
use Braintree_Transaction;
use Braintree\ClientToken;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
        if (Auth::check()){
            $userId = Auth::id();
            $apartments= Apartment::where('user_id', $userId)->get();

            if(!$apartments->isEmpty()){
                return view('admin.apartments.index', compact('apartments'));
            }else{
                return view('home');
            }
        }
            $apartments= Apartment::all();
            return view('admin.apartments.index', compact('apartments','types'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types=Type::all();
        $services= Service::all();
        $sponsors=Sponsor::all();
        $user=Auth::user();
       

        return view('admin.apartments.create', compact('types','services','sponsors','user'));
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
        $sponsors = Sponsor::all();

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
        if($request->has('sponsor_id')){
            $time= '';
            $length= count($sponsors);
            for($i=0; $i<$length;  $i++){
                $sponsor= $sponsors[$i];

                if($sponsor->id == $request->sponsor_id){
                    $time = intval($sponsor->time);
                }
            }
            $apartment->sponsors()->attach($request->sponsor_id, ['start' => date("m-d-Y h:i:s"),'end' => date("m-d-Y h:i:s", mktime(date('h') + $time , date("i"), date("s"), date("m"), date("d"), date("Y")))]);
        }
        return redirect()->route('admin.apartments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment)
    {   
        if($apartment->user_id === Auth::id()){
            $photos=Photo::all();
            return view('admin.apartments.show', compact('apartment','photos'));
        } else {
            $message='NON TI PERMETTERE DI TOCCARE GLI APPARTAMENTI ALTRUI';
            return redirect()->route('admin.apartments.index', compact('message'));
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
            return redirect()->route('admin.apartments.index', compact('message'));
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
        $length= count($photos);
        $lengthMessage= count($messages);
        for($i=0; $i<$length; $i++){
            $photo= $photos[$i];
            if($photo->apartment_id == $apartment->id){
                Storage::delete($photo->url);
                $photo->delete();
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




 
    //FUNZIONE PER VISUALIZZARE MESSAGGI  MESSAGGI

    // public function messages(){
    //     $messages= DB::table('apartments')
    //     ->join('messages','apartments.id','=','messages.apartment_id')
    //     ->where('apartments.user_id',Auth::id())
    //     ->orderByDesc('message.id')
    //     ->paginate(5);

    //     return view('')
    // }


//PRIMA PROVA PAGAMENTO, GESTITO MALE TOKEN INVIA CON I CAMPI VUOTI MA NON PIENI

    // public function showPaymentForm($apartmentId)
    // {
    //     // Recupera l'appartamento in base all'ID
    //     $apartment = Apartment::find($apartmentId);
    //     $sponsors = Sponsor::all();
    //     if (!$apartment) {
    //         // Gestisci il caso in cui l'appartamento non esista
    //     }

    //     // Genera il token di pagamento da Braintree
    //     $gateway = new Gateway([
    //         'environment' => env('BRAINTREE_ENV'),
    //         'merchantId' => env('BRAINTREE_MERCHANT_ID'),
    //         'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
    //         'privateKey' => env('BRAINTREE_PRIVATE_KEY')
    //     ]);

    //     $clientToken = $gateway->clientToken()->generate();

    //     return view('admin.apartments.braintree',['token' => $clientToken], compact('apartment', 'clientToken','sponsors'));
    // }
    // public function processPayment(Request $request)
    //     {
           
    //        // Esegui il processo di pagamento utilizzando Braintree
    //     // Recupera i dati del pagamento dal form inviato
    //     $nonce = $request->input('nonce');
    //    // $amount = $request->input('amount');

    //     // Esegui la transazione con Braintree utilizzando $nonce e $amount
    //     $gateway = new Gateway([
    //         'environment' => env('BRAINTREE_ENV'),
    //         'merchantId' => env('BRAINTREE_MERCHANT_ID'),
    //         'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
    //         'privateKey' => env('BRAINTREE_PRIVATE_KEY')
    //     ]);

    //     $result = $gateway->transaction()->sale([
    //         'amount' => '10.00',
    //         'paymentMethodNonce' => $nonce,
    //         'options' => [
    //         'submitForSettlement' => true
    //         ]
    //     ]);

    //     // Gestisci la risposta da Braintree e restituisci la vista appropriata
    //     if ($result->success) {
    //         // Pagamento avvenuto con successo
    //         return view ('admin.apartments.index',['token' => $clientToken]);
    //     } else {
    //         // Pagamento fallito, gestisci l'errore
    //         $errorMessage = $result->message;
    //         return redirect()->route('admin.home');
    //     }
    // }
//FINE PRIMA PROVA




//SECONDA PROVA PAGAMENTO <-------------------------------------------FUNZIONA MA RIMANDA SEMPRE IN VISTA ERRORE (IL DD DI ERSULT NON CONTIENE LA NONCE)
    public function showPaymentForm($apartmentId)
{
    // Recupera l'appartamento in base all'ID
    $apartment = Apartment::find($apartmentId);
   

    $sponsors = Sponsor::all();

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

    return view('admin.apartments.braintree', ['apartment' => $apartment, 'clientToken' => $clientToken, 'sponsors' => $sponsors]);}


public function processPayment(Request $request)
{
    // Esegui il processo di pagamento utilizzando Braintree
    // Recupera i dati del pagamento dal form inviato
   $nonce = $request->nonce;
    //$nonce = $request->payment_method_nonce;
  
    // Esegui la transazione con Braintree utilizzando $nonce
    $gateway = new Gateway([
        'environment' => env('BRAINTREE_ENV'),
        'merchantId' => env('BRAINTREE_MERCHANT_ID'),
        'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
        'privateKey' => env('BRAINTREE_PRIVATE_KEY')
    ]);
    $result = $gateway->transaction()->sale([
        'amount' => '10.00', // Importo dell'ordine
        'paymentMethodNonce' => $nonce,
        'options' => [
            'submitForSettlement' => true
            ]
    ]);
        
  //dd($result);
    // Gestisci la risposta da Braintree e restituisci la vista appropriata
    if ($result->success) {
        // Pagamento avvenuto con successo
        return view('admin.apartments.payment_success'); // Personalizza con la tua vista di successo
    } else {
        // Pagamento fallito, gestisci l'errore
        $errorMessage = $result->message;
        // Esegui il reindirizzamento a una pagina di errore
        return redirect()->route('admin.apartments.index', ['errorMessage' => $errorMessage]);
    }

}

//PROVA CON VALORI SPONSOR
// public function processPayment(Request $request)
// {
//     $selectedSponsorId = $request->input('sponsor_id');
// dd($selectedSponsorId);

// if (!$sponsor) {
//     // Gestisci il caso in cui lo sponsor non esista
// }

// // Esegui il processo di pagamento utilizzando Braintree
// // Recupera la nonce di pagamento dal form
// $nonce = $request->input('nonce');

// // Calcola l'importo dell'ordine utilizzando il prezzo dello sponsor
// $amount = $sponsor->price;

// // Esegui la transazione con Braintree utilizzando $nonce e $amount
// $gateway = new Gateway([
//     'environment' => env('BRAINTREE_ENV'),
//     'merchantId' => env('BRAINTREE_MERCHANT_ID'),
//     'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
//     'privateKey' => env('BRAINTREE_PRIVATE_KEY')
// ]);

// $result = $gateway->transaction()->sale([
//     'amount' => $amount, // Importo dell'ordine basato sul prezzo dello sponsor
//     'paymentMethodNonce' => $nonce,
//     'options' => [
//         'submitForSettlement' => true
//     ]
// ]);

// dd($result);
//     // Gestisci la risposta da Braintree e restituisci la vista appropriata
//     if ($result->success) {
//         // Pagamento avvenuto con successo
//         return view('admin.apartments.payment_success'); // Personalizza con la tua vista di successo
//     } else {
//         // Pagamento fallito, gestisci l'errore
//         $errorMessage = $result->message;
//         // Esegui il reindirizzamento a una pagina di errore
//         return redirect()->route('admin.apartments.index', ['errorMessage' => $errorMessage]);
//     }
// }
 }




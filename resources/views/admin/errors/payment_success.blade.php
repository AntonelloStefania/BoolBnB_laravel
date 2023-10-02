@extends('layouts.admin')
@section('content')
<div class="container-fluid navbar-container">
    <div class="row justify-content-between w-100">
        <div class="d-flex col-6 justify-content-center">
            <div class="col-6  py-3 d-flex  justify-content-center">
                <a href="{{route('admin.apartments.index')}}"  class=" d-flex align-items-center " style="text-decoration:none; color:#3a537e;">
                    <div class="col-auto">
                        <i class="fa-regular fa-circle-left me-2" style="color: #3a537e;"></i> 
                    </div>
                    <div class="col">
                        <span>I tuoi Annunci</span>  
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid bg-beige">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center my-5">
                <h2 class="text-center fs-2  mb-3">
                    <span class=" brand">Conferma</span> di Pagamento Sponsorizzazione Annuncio
                </h2>
                <p>
                    Grazie per aver scelto di sponsorizzare il tuo annuncio su <span class="brand">BoolBnB</span>! <br><br>
    
                    Siamo lieti di confermare che il tuo pagamento è stato elaborato con successo. Ora il tuo annuncio è in evidenza, ottenendo una maggiore visibilità per attirare potenziali acquirenti o affittuari.
                </p>
            </div>
        </div>
    </div>
</div>
<div class="container my-5">
    <div class="row">
        <div class="col-12 col-lg-6  d-flex align-items-center my-5 order-2 order-lg-1">
            <p>
                Se hai apportato modifiche all'annuncio sponsorizzato o desideri ulteriori informazioni sulle prestazioni, puoi sempre accedere alle statistiche dettagliate nella tua area personale.
                <br><br>
                Grazie per aver scelto <span class="brand">BoolBnB</span> per promuovere la tua offerta. Se hai ulteriori domande o necessiti di assistenza, non esitare a contattarci. Buona fortuna con la tua inserzione sponsorizzata!
            </p>
        </div>
        <div class="col-12 col-lg-6 text-center  my-5 order-1 order-lg-2">
            <img src="{{asset('payment_1.jpg')}}" alt="" width="350px">
        </div>
    </div>
</div>
@endsection
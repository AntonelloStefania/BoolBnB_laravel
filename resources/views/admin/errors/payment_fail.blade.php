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
                    Pagamento Sponsorizzazione <span class="brand">Non Riuscito <i class="fa-regular fa-face-sad-tear" style="color: #718DD8;"></i></span>
                </h2>
                <p>
                    Ci dispiace informarti che il pagamento per la sponsorizzazione del tuo annuncio non è andato a buon fine. Ciò potrebbe essere dovuto a vari motivi, tra cui problemi con il metodo di pagamento o informazioni errate.
                </p>
            </div>
        </div>
    </div>
</div>
<div class="container my-5">
    <div class="row">
        <div class="col-12 col-lg-6  d-flex align-items-center my-5 order-2 order-lg-1">
            <p>
                Per favore, verifica le informazioni inserite e assicurati che il tuo metodo di pagamento sia valido. Se il problema persiste o hai domande, non esitare a contattare il nostro servizio clienti per assistenza.
                <br><br>
                Grazie per la tua comprensione e speriamo che tu possa presto risolvere questo problema in modo che possiamo continuare a promuovere il tuo annuncio con successo.            </p>
        </div>
        <div class="col-12 col-lg-6 text-center  my-5 order-1 order-lg-2">
            <img src="{{asset('payment_2.jpg')}}" alt="" width="350px">
        </div>
    </div>
</div>
@endsection
<style>
   
</style>
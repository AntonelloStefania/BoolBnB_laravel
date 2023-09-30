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
        <div class="d-flex col-6 justify-content-center">
            <a href="{{route('admin.apartments.show', $apartment->id)}}"  class=" d-flex align-items-center" style="text-decoration:none; color:#3a537e;"> 
                <div class="col-auto">
                    <span>Dettagli Annuncio</span>  
                </div>
                <div class="col">
                    <i class="fa-regular fa-eye ms-2" style="color: #3a537e;"></i>
                </div>
            </a>
        </div>
    </div>
</div>
{{-- <div class="py-12">
    @csrf
    <div id="dropin-container" style="display: flex;justify-content: center;align-items: center;"></div>
    <div style="display: flex;justify-content: center;align-items: center; color: white">
        <a id="submit-button" class="btn btn-sm btn-success">Submit payment</a>
    </div>
</div>
<script>
    var button = document.querySelector('#submit-button');
        braintree.dropin.create({
            authorization: '{{$token}}',
            container: '#dropin-container'
        }, function (createErr, instance) {
            button.addEventListener('click', function () {
                instance.requestPaymentMethod(function (err,payload{
                    // Submit payload.nonce to your server
                });
        )
        });

    });
</script> --}}

{{-- SPONSOR --}}



{{-- SPONSOR --}}

<div class="py-12">
    <form method="POST" action="{{ route('admin.braintree.processPayment', ['apartmentId' => $apartment->id]) }}">
        @csrf
        <div class="container sponsor-container">
            <div class="row">
                <div class="col-12 text-center my-5 ">
                    <h2 class="mb-3 "><span class="brand">Sponsorizza</span> il tuo Annuncio!</h2>
                    <p>
                        Vuoi dare una marcia in più al tuo annuncio? Ora puoi farlo con la nostra sponsorizzazione! Oltre agli abbonamenti gratuiti, offriamo opzioni di sponsorizzazione per diverse durate: Abbonamento <span class="fw-bold">Free</span>, Abbonamento <span class="fw-bold">Base</span>, Abbonamento <span class="fw-bold">Avanzato</span> e Abbonamento <span class="fw-bold">Pro</span>. Scegli la sponsorizzazione che si adatta meglio alle tue esigenze e goditi una visibilità superiore per il tuo annuncio su <span class="brand">BoolBnB</span>. Promuovi il tuo spazio ora!
                    </p>
                </div>
                <div class="col-12 d-flex justify-content-center">
                    @foreach($sponsors as $sponsor)
                    <div class="col-6 col-lg-3 mx-3 cursor-pointer">
                        <div class="card {{ $sponsor->name === 'free' ? 'bg-c-blue' : ($sponsor->name === 'base' ? 'bg-c-green' : ($sponsor->name === 'avanzato' ? 'bg-c-yellow' : ($sponsor->name === 'pro' ? 'bg-c-pink' : ''))) }} order-card">
                            <div class="card-block">
                                <h4 class="m-b-20 fw-bold text-capitalize  mb-4">{{$sponsor->name}}</h4>
                                <h5 class="text-right mb-3"><i class="fa-regular fa-clock me-2" style="color: #5370a2;"></i><span class="fw-bold">{{$sponsor->time}} h</span></h5>
                                <input type="radio" style="appearance: none"  name="sponsor_id" class="" value="{{$sponsor->id}}" class="sponsor-radio" {{ $sponsor->name === 'free' ? 'checked' : '' }} required>
                                {{-- SE NELLA INPUT METTO NAME SPONSOR_ID E VALUE SPONSOR->ID MI RESTITUISCE L'ID SE METTO PRICE IL PREZZO, DEVO RIUSCIRE AD AVERLE ENTRAMBE --}}
                                <p class="m-b-0">Prezzo:<span class="f-right fw-bold"  id="sponsor-price-{{$sponsor->id}}">{{$sponsor->price}}&euro;</span></p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @error('sponsor')
                    <span class="text-danger d-block">{{ $message }}</span>
                    @enderror 
                </div>
            </div>
            
        </div>
        {{-- dropin pagamento --}}
        <div id="dropin-container" style="display: flex;justify-content: center;align-items: center;"  ></div>
        <input type="hidden" name="payment_method_nonce" id="payment-nonce">
        <input type="hidden" name="apartmentId" value="{{ $apartment->id }}">
        <div style="display: flex;justify-content: center;align-items: center; color: white">
            <button type="submit" class=" btn-sm  btn bg-c-yellow  p-2 border-radius-3 fw-bold border-0 mb-5"  id="submit-button">Conferma Pagamento</button>
        </div>
    </form>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-6 d-flex flex-column justify-content-center">
                <p>Benvenuto nella sezione di sponsorizzazione di annunci su <span class="brand">BoolBnB</span>! Qui puoi incrementare la visibilità del tuo annuncio e raggiungere un pubblico più vasto.</p>
                <p>Scegli tra una varietà di piani di sponsorizzazione per promuovere il tuo annuncio e ottenere risultati straordinari. Quando sponsorizzi il tuo annuncio su <span class="brand">BoolBnB</span>, hai l'opportunità di farlo apparire in evidenza tra le ricerche degli utenti e di ricevere una maggiore visibilità nella nostra community.</p>
                <p>Ricorda che ogni sponsorizzazione aiuta a sostenere il nostro servizio e a garantire un'esperienza eccezionale per tutti gli utenti di <span class="brand">BoolBnB</span>.</p>
            </div>
            <div class="col-md-6">
                <img src="{{asset('13-april.jpg')}}" width="550px" alt="">
            </div>
        </div>
    </div>
    
    <script>



        var button = document.querySelector('#submit-button');
        braintree.dropin.create({
            authorization: '{{$clientToken}}',
            container: '#dropin-container',
            local:'it_IT',
        }, function (createErr, instance) {
            button.addEventListener('click', function () {
            instance.requestPaymentMethod(function (err, payload) {

        console.log(instance)
        if (!err) {
            // La nonce di pagamento è contenuta in payload.nonce
            var paymentNonce = payload.nonce;
            
            document.getElementById('payment-nonce').value = paymentNonce;
           
            
            // Esegui una richiesta POST al tuo endpoint sul server utilizzando Axios
            axios.post('{{  route('admin.braintree.processPayment', ['apartmentId' => $apartment->id]) }}', { nonce: paymentNonce })
            console.log(paymentNonce)
            .then(function (response) {
                console.log(paymentNonce)
                // Gestisci la risposta dal server qui
                console.log('Risposta dal server:', response.data);
            })
            console.log(paymentNonce)
            .catch(function (error) {
                console.error('Errore durante l\'elaborazione del pagamento', error);
            });
        } else {
            console.log(paymentNonce)
            console.error('Errore durante la richiesta del metodo di pagamento:', err);
        }
        })
    })
        });
        
    </script>
</div>


 {{-- <div class="py-12">
//     <form method="POST" action="{{ route('admin.braintree.processPayment', ['apartmentId' => $apartment->id]) }}">
//         @csrf
//         <div id="dropin-container" style="display: flex;justify-content: center;align-items: center;"></div>
//         <input type="hidden" name="nonce" id="payment-nonce">
//         <input type="hidden" name="apartmentId" value="{{ $apartment->id }}">
//         <div style="display: flex;justify-content: center;align-items: center; color: white">
//             <button type="submit" class="btn btn-sm btn-success" id="submit-button">Submit payment</button>
//         </div>
//     </form>
//     <script>
//         var button = document.querySelector('#submit-button');
//         braintree.dropin.create({
//             authorization: '{{$token}}',
//             container: '#dropin-container'
//         }, function (createErr, instance) {
       
    //    BASE DA CUI PARTIRE
            // button.addEventListener('click', function () {
                
            //     instance.requestPaymentMethod(function (err, payload) {
            //         if (!err) {
            //     // La nonce di pagamento è contenuta in payload.nonce
            //     var paymentNonce = payload.nonce;
            //     console.log('Nonce di pagamento:', paymentNonce);

            //     // Ora puoi inviare paymentNonce al tuo server per elaborare il pagamento
            //     // Esegui un'operazione AJAX o qualsiasi altra logica di invio al server qui
            // } else {
            //     console.error('Errore durante la richiesta del metodo di pagamento:', err);
            // }
            //     });
            // });
// FINE BASE DA CUI PARTIRE

// PROVA 1

    //     button.addEventListener('click', function () {
    // instance.requestPaymentMethod(function (err, payload) {
    //     if (!err) {
    //         // La nonce di pagamento è contenuta in payload.nonce
    //         var paymentNonce = payload.nonce;

    //         // Esegui una richiesta POST al tuo endpoint sul server
    //         var xhr = new XMLHttpRequest();
    //         xhr.open('POST', '/process-payment', true);
    //         xhr.setRequestHeader('Content-Type', 'application/json');
    //         xhr.onreadystatechange = function () {
    //             if (xhr.readyState === 4 && xhr.status === 200) {
    //                 // Gestisci la risposta dal server se necessario
    //                 console.log('Pagamento elaborato con successo');
    //             } else if (xhr.readyState === 4 && xhr.status !== 200) {
    //                 console.error('Errore durante l\'elaborazione del pagamento');
    //             }
    //         };
    //         // Invia la nonce di pagamento al server
    //         var data = JSON.stringify({ nonce: paymentNonce });
    //         xhr.send(data);
    //     } else {
    //         console.error('Errore durante la richiesta del metodo di pagamento:', err);
    //     }
    // });
    // });
// FINE PROVA 1

    //PROVA AXIOS
    button.addEventListener('click', function () {
    instance.requestPaymentMethod(function (err, payload) {
        console.log(instance)
        if (!err) {
            // La nonce di pagamento è contenuta in payload.nonce
            var paymentNonce = payload.nonce;
            document.getElementById('payment-nonce').value = paymentNonce;
            console.log(paymentNonce)
            
            // Esegui una richiesta POST al tuo endpoint sul server utilizzando Axios
            axios.post('{{  route('admin.braintree.processPayment', ['apartmentId' => $apartment->id]) }}', { nonce: paymentNonce })
            console.log(response)
            .then(function (response) {
                // Gestisci la risposta dal server qui
                console.log('Risposta dal server:', response.data);
            })
            .catch(function (error) {
                console.error('Errore durante l\'elaborazione del pagamento', error);
            });
        } else {
            console.error('Errore durante la richiesta del metodo di pagamento:', err);
        }
    });
}); --}}





@endsection

<style lang="scss">
   
   
/* SPONSOR PROVA CARDS */
.order-card {
    color: #fff;
}

.bg-c-blue {
    background: linear-gradient(45deg,#aed2fc,#73b4ff);
}

.c-blue{
    color: #aed2fc
}

.bg-c-green {
    background: linear-gradient(45deg,#9ff8e6,#73e0ca);
}

.c-green{
    color:#9ff8e6
}

.bg-c-yellow {
    background: linear-gradient(45deg,#fde5c3,#f5cc92);
}

.c-yellow{
    color:#fde5c3
}
.bg-c-pink {
    background: linear-gradient(45deg,#faccd4,#f895a5);
}

.c-pink{
    color:#faccd4
}

   .card {
    border-radius: 5px;
    -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
    box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
    border: none;
    margin-bottom: 30px;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}

.card .card-block {
    padding: 25px;
}

.order-card i {
    font-size: 26px;
}

.f-left {
    float: left;
}

.f-right {
    float: right;
}

.sponsor-container{
    margin:5rem 0 ;
}

.cursor-pointer{
    cursor: pointer;
}


.selected-card{
    scale: 1.15;
    
}




#visible{
    border-radius: 1rem !important;
    height: 1.5rem !important;
    width: 2.5rem !important;
    border: 2px solid #7b97d4 !important
}
#visible:checked{
    background-color: #7b97d4 !important;
}
</style>
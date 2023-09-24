@extends('layouts.admin')

@section('content')
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
<div class="py-12">
    <form method="POST" action="{{ route('admin.processPayment') }}">
        @csrf
        <div id="dropin-container" style="display: flex;justify-content: center;align-items: center;"></div>
        <div style="display: flex;justify-content: center;align-items: center; color: white">
            <input type="hidden" name="nonce" id="payment-nonce">
            <button type="submit" class="btn btn-sm btn-success" id="submit-button">Submit payment</button>
        </div>
    </form>
    <script>
        var button = document.querySelector('#submit-button');
        braintree.dropin.create({
            authorization: '{{$token}}',
            container: '#dropin-container'
        }, function (createErr, instance) {
       
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
            axios.post('{{ route("admin.processPayment") }}', { nonce: paymentNonce })
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
});

// fine prova axios
});



    </script>
</div>



@endsection
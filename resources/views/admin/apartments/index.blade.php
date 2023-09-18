@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <a href="http://localhost:5174/" class="btn btn-success">VITE</a>
        <div class="row mb-5 home-text">
            <div class="bg-beige">
                <div class="col-12 text-center my-3 ">
                    <h2>Gestisci i Tuoi Annunci</h2>
                </div>
                <div class="col-8 offset-2 text-center fs-18 mb-5  ">
                    <p>
                        Benvenuto nella nostra pagina dedicata alla gestione dei tuoi annunci su <span class="brand">BoolBnB</span>. Qui, hai il controllo totale sulla tua esperienza di pubblicazione. Puoi visualizzare, personalizzare e ottimizzare tutti i tuoi annunci a partire da un solo luogo. Che tu voglia apportare piccole modifiche, aggiornamenti dettagliati o rimuovere un annuncio, sei nel posto giusto per gestire tutto in modo semplice ed efficace. <span class="brand">BoolBnB</span> è qui per mettere il controllo nelle tue mani e rendere la gestione degli annunci un'esperienza senza stress.
                    </p>
                </div>
            </div>
        </div>
        <div class="card-container container ">
            <div class="row justify-content-center">
                <div class="col-8">
                    @foreach($apartments as $apartment)
                    <div class="card float-right">
                        <div class="row">
                            <div class="col-md-5 ">
                                <img class="d-block w-100 m-0 m-lg-3 card-img" height="350px" src="{{ asset('storage/'.$apartment->cover) }}" alt="">
                            </div>
                          <div class="col-md-7">
                                <div class="card-block home-text">
                                    <div class="card-title">
                                        <h3 class="">{{$apartment->title}}</h3>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold me-2 d-inline"><i class="fa-solid fa-location-dot me-2 "></i>Località: </h6><span>{{$apartment->address}}</span>
                                    </div>
                                    <div>
                                        <h6 class="d-inline fw-bold">Tipologia di alloggio: </h6><img src="{{$apartment->type->icons}}" width="17rem" class="me-2" alt=""><span>{{$apartment->type->name}}</span>
                                    </div>
                                    <div class="">
                                        <p><h6 class="d-inline fw-bold">Pubblicato il: </h6>{{$apartment->created_at}}</p>
                                    </div>
                                    <div class="d-flex flex-row flex-lg-column justify-content-md-center justify-content-around align-items-center">
                                        <div class="col-md-4 col-lg-12" >
                                            <a href="{{route('admin.apartments.show', $apartment->id)}}" class="blue-btn"><i class="fa-regular fa-eye me-0 me-lg-2" style="color: #d4e1f8;"></i><span class="d-none d-lg-inline">Dettagli</span></a>
                                        </div>
                                        <div class="my-4 col-md-4 col-lg-12">
                                            <a href="{{route('admin.apartments.edit', $apartment->id)}}" class="blue-btn"><i class="fas fa-pencil me-0 me-lg-2" style="color: #d4e1f8;"></i><span class="d-none d-lg-inline">Modifica</span></a>
                                        </div>
                                        
                                        <div class="col-md-4 col-lg-12">
                                            <form action="{{route('admin.apartments.destroy', $apartment->id)}}" onsubmit="return confirm('Press ok to confirm')" class="d-block" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button class="beige-btn btn" type="submit"><i class="fas fa-trash me-0 me-lg-2" style="color: #3f3f41;"></i><span class="d-none d-lg-inline">Elimina</span></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                          </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row bg-beige p-3">
            <div class="col-12 text-center mt-4">
                <h2>Cos'è possibile fare qui:</h2>
            </div>
            <div class="col-8 offset-2 d-flex my-3">
                <div class="col-12 col-md-8">
                  <span class="fw-bold">1 - </span> Visualizza tutti i tuoi annunci: Scopri rapidamente l'elenco completo di tutti gli annunci che hai creato su <span class="brand">BoolBnB</span>. Ogni annuncio è dettagliatamente catalogato, con informazioni quali titolo, data di creazione e lo stato corrente.
                </div>
                <div class="col-4 d-md-flex d-none justify-content-center align-items-center">
                    <div class="blue-btn fake-btn"><i class="fa-regular fa-eye me-0 me-lg-2" style="color: #d4e1f8;"></i><span class="">Dettagli</span></div>
                </div>
            </div>
            <div class="col-8 offset-2 d-flex my-3">
                <div class="col-12 col-md-8">
                  <span class="fw-bold">2 - </span> Se hai apportato modifiche ai tuoi prodotti o servizi, personalizzane le informazioni direttamente da questa pagina. Aggiorna immagini, descrizioni e altro con pochi clic.
                </div>
                <div class="col-4 d-md-flex d-none justify-content-center align-items-center">
                    <div class="blue-btn fake-btn"><i class="fas fa-pencil me-0 me-lg-2" style="color: #d4e1f8;"></i><span class="">Modifica</span></div>
                </div>
            </div>
            <div class="col-8 offset-2 d-flex mt-3 mb-5">
                <div class="col-12 col-md-8">
                  <span class="fw-bold">3 - </span> Se desideri ritirare un annuncio, è semplicissimo. Effettua la rimozione direttamente da <span class="brand">BoolBnB</span> e l'annuncio verrà rimosso dalla nostra piattaforma.
                </div>
                <div class="col-4 d-md-flex d-none  justify-content-center align-items-center">
                    <div  class="beige-btn fake-btn"><i class="fas fa-trash me-0 me-lg-2" style="color: #3f3f41;"></i><span class="">Elimina</span></div>
                </div>
            </div>
        </div>
        <div class="col-8 offset-2 d-flex flex-column flex-lg-row my-5">
            <div class="col-lg-4 col-12 d-flex justify-content-center align-items-center">
                <img src="{{asset('logo_provvisorio.png')}}" alt="">
            </div>
            <div class="col-lg-8 col-12 fs-18 align-self-center">
              <span ><span class="brand">BoolBnB</span> è qui per mettere il controllo nelle tue mani. La tua esperienza di gestione degli annunci è progettata per essere intuitiva e personalizzabile, per adattarsi alle tue esigenze in modo rapido ed efficace.

                Se hai domande o hai bisogno di assistenza, il nostro team di supporto è sempre a disposizione per aiutarti a ottenere il massimo dalla tua esperienza su <span class="brand">BoolBnB</span>. Grazie per aver scelto <span class="brand">BoolBnB</span> come il tuo partner nella gestione degli annunci!</span>
            </div>
        </div>

        
        
    </div>
@endsection

<style lang="scss">
    .fake-btn{
        width: 7rem
    }
    body {
    background-color:  #eee;
    }

    .card-img{
        border-radius:3rem !important;
        /* margin:1rem; */
        box-shadow: 2px 2px 8px 0px;
        /* filter: blur(3px) */
    }

    .card-block {
        font-size: 1em;
        position: relative;
        margin: 0;
        padding: 1em;
        border: none;
      
        box-shadow: none;
        
    }
    .card {
        font-size: 1em;
        overflow: hidden;
        padding: 5;
        border: none !important;
        border-radius: .755rem !important;
        background-color: transparent !important;
        margin-top:20px;
        height: 300px;
        cursor: pointer;
      
    }

    h3{
        text-transform: uppercase;
    }
    /* .card:hover .card-img{
        filter:blur(0px)
    } */

    .card:hover h3{
        color: #718dd8;
    }

    /* .card:hover h6{
        color: #718dd8;
    } */


    .card-container{
        height: 600px;
        overflow: auto;
        margin: 5rem 0;
        scrollbar-width: none; /* Nasconde la scrollbar standard in Firefox */
        -webkit-scrollbar-width: none; /* Nasconde la scrollbar in Webkit (Chrome, Safari, etc.) */
        border: 1px solid rgb(100, 100, 100);
        border-radius: 3rem;
        
        
    }
    .card-container::-webkit-scrollbar {
    display: none; /* Nasconde la scrollbar in Webkit */
}



</style>







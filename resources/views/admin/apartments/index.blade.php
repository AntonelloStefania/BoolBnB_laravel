@extends('layouts.admin')

@section('content')
<div class="container-fluid navbar-container">
    <div class="row justify-content-between w-100">
        <div class="d-flex col-6 justify-content-center">
            <div class="col-6  py-3 d-flex  justify-content-center">
                <a href="http://localhost:5174/apartments"  class=" d-flex align-items-center " style="text-decoration:none; color:#3a537e;">
                    <div class="col-auto">
                        <i class="fa-regular fa-circle-left me-2" style="color: #3a537e;"></i> 
                    </div>
                    <div class="col">
                        <span>Ricerca Avanzata</span>  
                    </div>
                </a>
            </div>
        </div>
        <div class="d-flex col-6 justify-content-center">
            <a href="{{route('admin.apartments.create')}}"  class=" d-flex align-items-center" style="text-decoration:none; color:#3a537e;"> 
                <div class="col-auto">
                    <span>Aggiungi Annuncio</span>  
                </div>
                <div class="col">
                    <i class="fa-regular fa-circle-right ms-2" style="color: #3a537e;"></i>
                </div>
            </a>
        </div>
    </div>
</div>
    <div class="container-fluid">
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
        <div class=" container ">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-xlg-4">
                    @foreach($apartments as $apartment)
                    <div class="card float-right">
                        <div class="row">
                            <div class="col-12 col-lg-5 position-relative align-items-center ">
                                <img class="d-block w-100 m-0 m-lg-3 card-img" style="object-fit: cover" height="350px" src="{{ asset('storage/'.$apartment->cover) }}" alt="">
                                <div class="d-block ">
                                    @foreach($apartment->sponsors as $sponsor)
                                        @if($sponsor->pivot->name != 'free')
                                        <span class="sponsor-label-absolute-img   {{ $sponsor->name === 'free' ? 'bg-c-blue' : ($sponsor->name === 'base' ? 'bg-c-green' : ($sponsor->name === 'avanzato' ? 'bg-c-yellow' : ($sponsor->name === 'pro' ? 'bg-c-pink' : ''))) }}" > Sponsor <span class="upper-case">{{$sponsor->name}}</span> <span class=""> fino al: <br> {{date('d/m/Y H:i', strtotime($sponsor->pivot->end))}}</span></span>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                          <div class="col-lg-7 col-12 text-center text-lg-start">
                                <div class="card-block home-text ">
                                    <div class="card-title">
                                        <h3 class="">{{$apartment->title}}</h3>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold me-2 d-inline"><i class="fa-solid fa-location-dot me-2 "></i>Località: </h6><span>{{$apartment->address}}</span>
                                    </div>
                                   
                                    <div>
                                        <h6 class="d-inline fw-bold">Tipologia di alloggio: </h6><img src="{{$apartment->type->icons}}" width="17rem" class="me-2" alt=""><span>{{$apartment->type->name}}</span>
                                    </div>
                                    {{-- <div class="d-none d-lg-block">
                                        @foreach($apartment->sponsors as $sponsor)
                                        
                                        @if($sponsor->pivot->name != 'free')
                                        <span class="sponsor-label-absolute {{ $sponsor->name === 'free' ? 'bg-c-blue' : ($sponsor->name === 'base' ? 'bg-c-green' : ($sponsor->name === 'avanzato' ? 'bg-c-yellow' : ($sponsor->name === 'pro' ? 'bg-c-pink' : ''))) }}" >Sponsor <span class="toUpperCase">{{$sponsor->name}}</span> fino al: <br> {{$sponsor->pivot->end}}</span></span>
                                        @endif
                                        @endforeach
                                    </div> --}}
                                    <div class="">
                                        <p><h6 class="d-inline fw-bold">Pubblicato il: </h6>{{date('d/m/Y H:i', strtotime($apartment->created_at))}}</p>
                                    </div>
                                  
                                    <div class="d-flex  justify-content-around   align-items-center">
                                        <div class="my-4  col-auto" >
                                            <a href="{{route('admin.apartments.stats',  $apartment->id)}}"   class="d-flex align-items-center green-btn "><i class="fa-solid fa-ranking-star" style="color: #4c85e7;"></i><span class="d-none d-lg-inline ms-2">Statistiche</span></a>
                                        </div>
                                        <div class="my-4  col-auto" >
                                            <a href="{{route('admin.messages.show',  $apartment->id)}}" class="blue-btn position-relative">
                                                <i class="fa-solid fa-envelope" style="color: #d4e1f8;">
                                                    @if($apartment->messages->where('read',false)->count() > 0)
                                                    <span class=" text-center d-block d-lg-none  rounded-circle position-absolute mail-notification" >
                                                        {{ $apartment->messages->where('read', false)->count() }}
                                                    </span>
                                                    @endif
                                                </i>
                                                
                                                <span class="d-none d-lg-inline ms-2">Messaggi</span>
                                                @if($apartment->messages->where('read',false)->count() > 0)
                                                <span class=" text-center  rounded-circle position-absolute mail-notification" >
                                                    {{ $apartment->messages->where('read', false)->count() }}
                                                </span>
                                                @endif
                                            </a>
                                        </div>
                                        <div class=" col-auto" >
                                            <a href="{{route('admin.apartments.show', $apartment->id)}}" class="blue-btn"><i class="fa-regular fa-eye me-0 me-lg-2" style="color: #d4e1f8;"></i><span class="d-none d-lg-inline">Dettagli</span></a>
                                        </div>
                                        <div class="my-4  col-auto">
                                            <a href="{{route('admin.apartments.edit', $apartment->id)}}" class="blue-btn"><i class="fas fa-pencil me-0 me-lg-2" style="color: #d3e1f8;"></i><span class="d-none d-lg-inline">Modifica</span></a>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-center mt-5">
                                        <div class="col-md-3 col-12 ">
                                            <button class="beige-btn btn mt-3 mt-lg-0" data-bs-toggle="modal" data-bs-target="#{{$apartment->id}}" type="submit"><i class="fas fa-trash me-0 me-lg-2 apartment-delete-button" style="color: #3f3f41;" data-apartment-title={{$apartment->title}}></i><span class="d-none d-lg-inline">Elimina</span></button>  
                                            <div class="modal fade" id="{{$apartment->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Sei sicuro di voler <span class="brand">Eliminare</span> questo <span class="brand">Annuncio</span>?</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                       <span class="brand">{{$apartment->title}}</span><span> verrà Eliminato</span>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn blue-btn" data-bs-dismiss="modal">Annulla</button>
                                                        <form action="{{route('admin.apartments.destroy', $apartment->id)}}" class="d-block" method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit" class="btn beige-btn">Conferma</button>
                                                        </form>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                              
                                        </div>
                                    </div>
                                    
                                </div>
                          </div>
                        </div>
                    </div>
                    <hr>
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
            <div class="col-8 offset-2 d-flex mt-3 mb-5">
                <div class="col-12 col-md-8">
                  <span class="fw-bold">4 - </span> Accedi ai Messaggi e Controlla le tue conversazioni con gli interessati direttamente su <span class="brand">BoolBnB</span>. Gestisci le richieste, rispondi ai messaggi e mantieni un'efficace comunicazione.
                </div>
                <div class="col-4 d-md-flex d-none  justify-content-center align-items-center">
                    <div  class="blue-btn fake-btn"><i class="fa-solid fa-envelope me-0 me-lg-2" style="color: #c5dcf7;"></i><span class="">Messaggi</span></div>
                </div>
            </div>
            <div class="col-8 offset-2 d-flex mt-3 mb-5">
                <div class="col-12 col-md-8">
                  <span class="fw-bold">5 - </span> Monitora le Statistiche dei tuoi annunci su <span class="brand">BoolBnB</span>. Visualizza le visualizzazioni, i click e altre metriche chiave per migliorare la tua strategia pubblicitaria.
                </div>
                <div class="col-4 d-md-flex d-none  justify-content-center align-items-center">
                    <div  class="green-btn fake-btn"><i class="fa-solid fa-ranking-star me-0 me-lg-2" style="color: #4294F2;"></i><span class="fw-6">Stats</span></div>
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
    .mail-notification{
        background-color: rgb(250, 129, 129);
        top:-13px;
        right:-10;
        padding:0px 8px;
    }
    .fake-btn{
        width: 7rem
    }
    body {
    background-color:  #eee;
    }

    .upper-case{
        text-transform: uppercase;
        font-weight: bolder;
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

/* .sponsor-label-absolute{
  position:absolute;
  right:0px;
  bottom:30px;
  padding:5px 10px;
  border-radius:0.755rem;
  font-weight: bold;
  color: rgb(36, 36, 90);
  font-size: 12px;
  width:165px 
} */

.sponsor-label-absolute-img{
    position:absolute;
  right:10px;
  bottom:50px;
  padding:5px 10px;
  border-radius:0.755rem;
  font-weight: bold;
  color: rgb(36, 36, 90);
  font-size: 12px;
  width: 165px
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

.green-btn{
    background: linear-gradient(45deg,#9ff8e6,#73e0ca);
    color: #4294f2;
    padding: 0.5rem;
    border-radius: 2rem;
    font-weight: bold;
    text-decoration: none;
}
.green-btn:hover{
    background: linear-gradient(45deg,#9ff8e6,#25ae92);

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

</style>
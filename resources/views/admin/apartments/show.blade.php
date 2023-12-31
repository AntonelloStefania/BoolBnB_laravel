
@extends('layouts.app')
@section('content')
<div class="container-fluid navbar-container">
    <div class="row justify-content-between w-100">
        <div class="d-flex col-6 col-lg-4 justify-content-center">
            <div class="col-6 col-lg-4 py-3 d-flex justify-content-center">
                <a href="{{route('admin.apartments.index')}}" class="d-flex align-items-center" style="text-decoration:none; color:#3a537e;">
                    <div class="col-auto">
                        <i class="fa-regular fa-circle-left me-2" style="color: #3a537e;"></i> 
                    </div>
                    <div class="col">
                        <span>I tuoi Annunci</span>  
                    </div>
                </a>
            </div>
        </div>
        <div class="col-4 d-none d-lg-flex justify-content-center">
            <a href="#add-photos" class="d-flex align-items-center" style="text-decoration:none; color:#3a537e;"> 
                <div class="col">
                    <span>Aggiungi Foto</span>  
                </div>
                <div class="col-auto">
                    <i class="fa-regular fa-circle-down ms-2" style="color: #3a537e;"></i>
                </div>
            </a>
        </div>
        <div class="d-flex col-6 col-lg-4 justify-content-center">
            <a href="{{route('admin.apartments.edit', $apartment->id)}}" class="d-flex align-items-center" style="text-decoration:none; color:#3a537e;"> 
                <div class="col-auto">
                    <span>Modifica Annuncio</span>  
                </div>
                <div class="col">
                    <i class="fas fa-pencil ms-2" style="color: #3a537e;"></i>
                </div>
            </a>
        </div>
    </div>
</div>

<section class="mt-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-8 offset-2 text-center mb-5">
                <h2 class="my-3"><span class="brand">Visualizza</span> il Tuo Annuncio</h2>
                <p class="text-center">Controlla il tuo annuncio su <span class="brand">BoolBnB</span> per assicurarti che sia completo e soddisfi tutte le tue esigenze. Qui puoi vedere ogni dettaglio e foto che hai aggiunto. Se hai dimenticato qualcosa o desideri apportare modifiche, è il momento giusto per farlo. Un annuncio accurato e completo attira più ospiti, quindi assicurati che il tuo annuncio su <span class="brand">BoolBnB</span> sia perfetto</p>
            </div>
            <div class="col-11 d-flex justify-content-end me-5">
                <a href="{{route('admin.apartments.stats', $apartment->id)}}" class="d-flex align-items-center bg-c-green p-3 fw-bold" style="text-decoration:none; border-radius:0.755rem"><span class="d-none d-lg-inline brand">Visualizza Statistiche</span><i class="fa-solid ms-3 fa-2xl fa-ranking-star" style="color: #8eaff1;"></i></a>
            </div>
            <div class="container-fluid mt-4 px-0 d-flex text-center text-md-end">
                @foreach($apartment->sponsors as $sponsor)
                    @if($sponsor->pivot->end > now())
                        <span class="h-100 w-100 sponsor-label-absolute pe-5  py-3   {{ $sponsor->name === 'free' ? 'bg-c-blue' : ($sponsor->name === 'base' ? 'bg-c-green' : ($sponsor->name === 'avanzato' ? 'bg-c-yellow' : ($sponsor->name === 'pro' ? 'bg-c-pink' : ''))) }}" > Sponsor <span class="upper-case brand" >{{$sponsor->name}}</span> <span class=""> fino al: <span class="brand">{{date('d/m/Y H:i', strtotime($sponsor->pivot->end))}}</span></span></span>
                    @endif
                @endforeach
            </div>
            <div class="container-fluid px-0 d-flex text-center text-md-end">
                @if($apartment->sponsors->isEmpty() || $sponsor->pivot->end < now())
                    <span class="h-100 w-100 sponsor-label-absolute pe-5  py-3">
                        <a href="{{route('admin.apartments.braintree', $apartment->id)}}" class="pink-btn" style="text-decoration:none; color:#3a537e;">Sponsorizza il tuo Annuncio  </a>
                    </span>
                @endif
            </div>
            <div class="container-fluid bg-beige py-3">
                <div class="container">
                    <div class="col-12 text-center  mb-4">
                        <h2>
                            {{$apartment->title}}
                        </h2>
                    </div>
                    <div class="col-12 d-flex flex-column flex-lg-row">
                        <div class="col-12  col-lg-4 d-flex align-items-center order-2 order-lg-1 mx-lg-3 mb-3">
                            <img src=" {{ asset('storage/'.$apartment->cover) }}" style="border-radius:2rem; border:2px solid rgb(64, 64, 66)" width="100%" max-height="500px">
                        </div>
                        <div class="col-12 m-0 col-lg-8  text-center order-2 order-md-2  justify-content-center mb-3 " >
                            <div class="container gal-container ">
                                <div class="gal-item d-flex flex-wrap justify-content-center">
                                    @foreach($apartment->photos as $photo)
                                        @if($photo->apartment_id == $apartment->id)
                                            <div class="box col-12 col-md-5 m-2  img-container  ">
                                                <img src=" {{ asset('storage/'.$photo->url) }} " class="col-6" style="border-radius:1.25rem" max-height="300px" >
                                                <div class="btns d-flex align-items-center">
                                                    <div>
                                                        <button type="button" class="btn beige-btn" data-bs-toggle="modal" data-bs-target="#{{$photo->id}}">
                                                            <i class="fas fa-trash" style="color: #292929;"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="{{$photo->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Vuoi <span class="brand">Eliminare</span> questa <span class="brand">Foto</span>?</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <span>La Foto verrà <span class="brand">Eliminata</span> definitivamente</span>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn blue-btn" data-bs-dismiss="modal">Annulla</button>
                                                                <form action="{{route('admin.apartments.photos.destroy', [$apartment->id, $photo->id])}}"  class="d-block" method="POST">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button class="beige-btn btn" type="submit">Conferma</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center mt-2 ">
                    <span>Vuoi rendere il tuo annuncio ancora più <span class="brand">irresistibile?</span> Aggiungi alcune <span class="brand">foto</span> per mostrare tutti i dettagli che rendono il tuo alloggio speciale<button type="button"  id="add-photos" class="btn blue-btn btn-sm ms-3" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-plus "></i></button></span>
                </div>
                <div class="col-12 text-center mt-2 ">
                    <span style="font-size:12px"><span class="brand">Aggiungi </span>Foto al tuo annuncio e <span class="brand">Muoviti su di loro</span> per altre funzionalità</span>
                </div>
            </div>
        </div>
        <div class="container my-5">
            <div class="row">
                <div class="col-12 col-md-6 flex-column d-flex align-items-center d-md-block  col-lg-3 my-4 my-lg-0 text-lg-start">
                    <h5 class="mb-3 d-flex ">Il Tuo <span class="brand">Alloggio</span></h5>
                    <ul class="list-unstyled ">
                        <li class=" ">
                            <img src="{{$apartment->type->icons}}" width="25rem" class="me-2" alt="">
                            <span class="fw-bold brand">{{$apartment->type->name}}</span>
                        </li>
                        <li class="" >
                            <span class="" ><span class="brand">Grandezza</span> alloggio: </span><span class="fw-bold " >{{$apartment->mq}} <span class="fs-5">&#x33A1;</span> </span>
                        </li>
                        <li class="">
                            <span class="">Numero di <span class="brand">Stanze:</span> </span> <span class="ms-2 fw-bold ">{{$apartment->n_rooms}}<i class="fa-solid fa-building ms-2 align-self-center" style="color: #4f5153;"></i></span>
                        </li>
                        <li class="">
                            <span class="">Numero di <span class="brand">Bagni:</span> </span> <span class="ms-2 fw-bold ">{{$apartment->n_wc}}<i class="fa-solid fa-toilet-paper ms-2" style="color: #4f5153;"></i></span>
                        </li>
                        <li class="">
                            <span class="">Numero di <span class="brand">Letti:</span> </span> <span class="ms-2 fw-bold ">{{$apartment->n_beds}}<i class="fa-solid fa-bed ms-2 align-self-center" style="color: #4f5153;"></i></span>
                        </li>
                    </ul>
                </div>
                <div class="col-12 col-md-6 flex-column d-flex align-items-center d-md-block  col-lg-3 my-4 my-lg-0 text-lg-start">
                    <h5 class="mb-3">I <span class="brand">Servizi</span> che Offri</h5>
                    <ul class="list-unstyled apartment-list " >
                        @foreach($apartment->services as $service)
                            <li class="">
                                <img src="{{$service->icons}}" width="20rem" alt="">
                                <span class="">{{$service->name}}</span>
                            </li>
                        @endforeach 
                    </ul>
                </div>
                <div class="col-12  col-lg-6 text-center my-4 my-lg-0 text-md-start">
                    <h5 class="mb-3">Il <span class="brand">Pernottamento</span> che Offri</h5>
                    <ul class="list-unstyled apartment-list ">
                        <li class="">
                            <span><span class="brand">Prezzo</span> per Notte: </span><span class="ms-2 fw-bold">{{$apartment->price}}&euro;</span>
                        </li>
                        <li class="">
                            <span><span class="brand">Indirizzo</span>: </span><span class="ms-2 ">{{$apartment->address}} <i class="fa-solid fa-location-dot ms-1" style="color: #4f5153;"></i></span>
                        </li>
                        <li class="">
                            <span><span class="brand">Descrizione</span>: </span><span class="ms-2 w-break">{{$apartment->description}}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        @include('admin.photos.create')
    </div>
</section>
@endsection




<style lang="scss">
.w-break{
    overflow-wrap: break-word;
}
.img-container{
    position: relative;
    aspect-ratio: 16/9;
}
.img-container:hover{
    border-radius:1.25rem;
    .btns{
        visibility: visible;
        
    }
}
.btns{
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    display: flex;
    justify-content: space-around;
    visibility: hidden;
    background-color: rgba(0, 0, 0, 0.5);
}
.blue-btn, form{
    align-self: center;
    margin: 0;
}
.btn{
    padding: 0;
    margin: 0;
}

.gal-item .box{
	height: 250px;
    
	overflow: hidden;
}
.box img{
	height: 100%;
	width: 100%;
	object-fit:cover;
	-o-object-fit:cover;
}

.gal-container{
    height: 600px;
    overflow:auto;
    scrollbar-width: none; /* Nasconde la scrollbar standard in Firefox */
    -webkit-scrollbar-width: none; 
}

.gal-container::-webkit-scrollbar {
    display: none; /* Nasconde la scrollbar in Webkit */
}
.apartment-list li{
    min-height: 2.5rem
}


/* sponsor */
.sponsor-label-absolute{
  

  
  
  font-weight: bold;
  color: rgb(62, 62, 125);
  font-size: 18px
  
}


.bg-c-blue {
    background: linear-gradient(45deg,#aed2fc,#8abffb);
}

.c-blue{
    color: #aed2fc
}

.bg-c-green {
    background: linear-gradient(45deg,#d3fbf3,#8fe3d2b6);
}

.c-green{
    color:#9ff8e6
}

.bg-c-yellow {
    background: linear-gradient(45deg,#f6e2c6,#ffc26de9);
}

.c-yellow{
    color:#fde5c3
}
.bg-c-pink {
    background: linear-gradient(45deg,#ffe9ed,#ffafbdc3);
}

.c-pink{
    color:#faccd4
}

.upper-case{
    text-transform: uppercase
}
</style>

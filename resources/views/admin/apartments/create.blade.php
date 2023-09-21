@extends('layouts.admin')

@section('content')

<div class="container-fluid">
   <div class="row flex-column ">
       <div class="col-12 bg-beige  text-white  position-relative">
          <form action="{{ route('admin.apartments.store') }}" id="form" class="bg-beige"  style="min-height: 700px; max-height:750px;" method="POST" enctype="multipart/form-data" @submit.prevent="event.preventDefault()">
            @csrf
         {{-- slider --}}
            <div id="carouselExampleIndicators" class="carousel slide home-text " data-bs-ride="false">
                <div class="position-absolute bottom-0 col-12">

                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active carousel-btn" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" class="carousel-btn" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" class="carousel-btn" aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" class="carousel-btn" aria-label="Slide 4"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" class="carousel-btn" aria-label="Slide 5"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5" class="carousel-btn" aria-label="Slide 6"></button>
                    </div>
                </div>
                <div class="carousel-inner">
                     {{-- prima sezione TIPOLOGIA DI APPARTAMENTO --}}
                    <div class="col-12">

                        <div class="carousel-item active"  style="min-height: 700px; max-height:750px;">
                            <div class="d-flex align-items-center  w-100 flex-column">
                                {{-- PROVA CHECKBOX-2 --}}
                                <div class="card col-6 my-5">
                                    <div class="rating-container">
                                      <div class="rating-text home-text text-center my-4">
                                        <h2>Che <span class="brand">Tipologia</span> di Alloggio vuoi Affittare <span class="brand">?</span></h2>
                                      </div>
                                        <div class="rating d-flex flex-wrap justify-content-center">
                                            <form class="rating-form">
                                                @foreach($types as $type)
                                                <div class="col-4 d-flex my-3 flex-column align-items-center">
                                                    <label for="type-id-{{$type->id}}" class="position-relative d-flex change-cursor justify-content-center align-items-center {{ $type->id == old('type_id') ? 'type-bg' : '' }}" style="width:75px; height:75px;" required >
                                                        <input type="radio"  name="type_id"   style="width:65px; height:65px; appearance:none" class="radio-icons" value="{{$type->id}}" data-error-slide="1"   id="type-id-{{$type->id}}" {{ old('type_id') ? 'checked' : '' }}  required />
                                                        <img src="{{$type->icons}}"  style="width:50px; height:50px;" alt="" class=" type-icons position-absolute" >
                                                    </label>                                                    
                                                    <span class="fw-bold home-text">{{$type->name}}</span>
                                                </div>
                                                @endforeach
                                                @error('type_id')
                                                    <span class="text-danger error-message">{{ $message }}</span>
                                                @enderror 
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- FINE PROVA CHECKBOX-2 --}}
                                
                            </div>
                        </div>
                    </div>
                    
                    {{-- seconda sezione DESCRIZIONE --}}
                  

                    <div class="carousel-item " style="min-height: 700px; max-height:750px;">
                        <div class="col-12 d-flex flex-column  align-items-center">
                            <div class="my-3">
                                <h2><span class="brand">Descrivi</span> il tuo Alloggio su <span class="brand">BoolBnB</span></h2>
                            </div>
                            <div class="col-6 text-center ">
                                <p>
                                    Benvenuto nella tua opportunità di creare un'esperienza unica per i futuri ospiti su <span class="brand">BoolBnB</span>! La tua descrizione dell'alloggio è la prima impressione che gli ospiti avranno del loro soggiorno. Ecco come puoi rendere questa impressione davvero indimenticabile:                           
                                </p>
                            </div>
                           
                            <div class="col-12 d-flex flex-column align-items-center" >
                                <div class="col-12 d-lg-flex justify-content-center d-none align-items-center  ">
                                    
                                        <img src="{{asset('homepage_2.jpg')}}" class="rounded-circle" width="150px" height="150px" alt="">
                                    
                                    
                                        <img src="{{asset('homepage_6.jpg')}}" class="rounded-circle mx-3" width="250px" height="250px" alt="">
                                    
                                    
                                        <img src="{{asset('attico1.jpg')}}" class="rounded-circle" width="150px" height="150px" alt="">
                                    
                                </div>
                                <div class="col-6 mb-2 d-flex justify-content-end ">
                                    <button disabled type="button" class="rounded-circle blue-btn d-flex flex-end border-0 " data-bs-placement="right" data-bs-html="true" style="width:1.5rem; height:1.5rem"  data-bs-toggle="popover" data-bs-trigger="hover focus" title="<span class='brand'>Consigli per la descrizione</span>" data-bs-content="
                                    <ul>
                                        <li>Inizia dalla <strong class='brand'>passione</strong>: Condividi il tuo entusiasmo per il tuo spazio. Cosa lo rende speciale? Quali dettagli ami di più? Fai emergere la personalità unica del tuo alloggio.</li>
                                        <li>Menziona i <strong class='brand'>comfort e le comodità</strong>: Elenca tutte le comodità disponibili, come Wi-Fi, cucina attrezzata, lavatrice, e come questi renderanno il soggiorno dei tuoi ospiti più piacevole.</li>
                                        <li>Includi i tuoi <strong class='brand'>consigli locali</strong>: Se conosci ristoranti fantastici, luoghi da visitare o segreti nascosti nella zona, condividili con i tuoi ospiti. Questo può rendere il soggiorno ancora più memorabile.</li>
                                        <li>Sii <strong class='brand'>onesto e trasparente</strong>: La sincerità è la base della fiducia. Assicurati di rappresentare il tuo alloggio in modo accurato e di comunicare le regole chiaramente.</li>
                                    </ul>"><i class="fas fa-info align-self-center info-icon"></i></button>
                                </div>
                                <div class="col-12 d-flex justify-content-center mt-3 ">
                                    <input type="hidden" name="user_id" id="user_id" class="form-control"  value="{{ $user->id }}" > 
                                    <textarea class=" p-3"  name="description" id="" cols="30" rows="10"></textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                   
                    {{-- terza sezione TITOLO ED INDIRIZZO --}}
                    <div class="carousel-item "  style="min-height: 700px; max-height:750px;">
                        <div class="my-5">
                            <div class="my-3 col-12 text-center">
                                <h2>Un <span class="brand">Titolo</span> per un Annuncio che Sorprenda</h2>
                            </div>
                            <div class="col-12 col-md-8 offset-md-2  text-center ">
                                <p>
                                    Vuoi rendere il tuo annuncio su <span class="brand">BoolBnB</span> davvero unico? Inizia con il titolo! Fai in modo che sia breve ma descrittivo, in modo che gli ospiti possano capire immediatamente cosa rende il tuo spazio speciale. E non dimenticare di inserire con orgoglio <span class="brand">BoolBnB</span> nella tua descrizione di posizione. Questi piccoli dettagli possono fare la differenza!
                                </p>
                            </div>
                            <div class="form-group my-4 d-flex justify-content-around my-5">
                                <div class="d-flex align-items-center">
                                    <label class="control-label mb-2 fw-bold me-3">titolo: </label> 
                                    <input type="text" id="title" name="title" class="form-control" value="{{old('title')}}" data-error-slide="3" required>
                                    @error('title')
                                        <span class="text-danger error-message">{{ $message }}</span>
                                    @enderror 
                                </div>
                            </div>
                        </div>
                        <div clas="mt-5">
                            <div class="my-3 col-12 text-center">
                                     <h2><span class="brand">Dove</span> si Trova il Tuo Alloggio <span class="brand" >?</span></span></h2>
                                 </div>
                                 <div class="col-12 col-md-8 offset-md-2  text-center  ">
                                     <p>
                                         Questa è la tua opportunità per condividere l'ubicazione esatta del tuo alloggio su <span class="brand">BoolBnB</span>. Inserisci l'indirizzo completo per garantire che i potenziali ospiti possano trovare facilmente il loro prossimo luogo ideale su <span class="brand">BoolBnB</span>. L'ubicazione è fondamentale per creare fiducia e offrire una prenotazione senza intoppi. Facci sapere dove si trova il tuo alloggio su <span class="brand">BoolBnB</span> per rendere il processo più semplice per tutti!                          
                                     </p>
                                 </div>
                             
                              <div class="form-group my-4 d-flex justify-content-around my-5">
                                 <div class="d-flex align-items-center">
                                     <label class="control-label mb-2 fw-bold me-3">Indirizzo:</label>
                                     <div class="d-flex flex-column">
                                         <input list="suggestions" data-error-slide="3" type="ratio" id="address" name="address" class="form-control" placeholder="es. Via Napoli, 5, Roma" value="{{old('address')}}" required>
                                         <datalist id="suggestions">
                                         </datalist>
                                             @error('address')
                                             <span class="text-danger error-message">{{ $message }}</span>
                                         @enderror                                        
                                     </div>
                                 </div>
                                </div>
                        </div>
                    </div>
                    {{-- quarta sezione --}}
                   
                    <div class="carousel-item  " style="min-height: 700px; max-height:750px;">
                        <div class="col-12 my-5">
                            <div class="my-3 col-12 text-center">
                                <h2>Migliora il Tuo Annuncio con <span class="brand">Dettagli</span> Importanti</h2>
                            </div>
                            <div class="col-12 col-md-8 offset-md-2  text-center ">
                                <p>
                                    Per rendere il tuo annuncio su <span class="brand">BoolBnB</span> davvero speciale, vogliamo invitarti a condividere ulteriori dettagli sull'alloggio, come la grandezza, il numero di stanze e il numero di bagni. Aggiungere questi dettagli aiuta gli ospiti a trovare la sistemazione perfetta per le loro esigenze e fa sì che il tuo annuncio risalti. Non esitare a mettere a disposizione queste informazioni per offrire una migliore esperienza agli utenti di <span class="brand">BoolBnB</span>!
                                </p>
                            </div>
                            <div class="col-12 d-flex flex-wrap ">
                                <div class="col-12 col-md-6 d-flex align-items-end pe-5 flex-column">
                                    {{-- METRI QUADRI APPARTAMENTO --}}                                    
                                    <div class="mb-4 mt-5 d-flex ">
                                        <label class="control-label fw-bold me-2 " for="name">Metri quadri alloggio: </label>
                                        <input type="number" id="mq" name="mq" min="0" class="form-control" style="width:4.25rem" value="{{old('mq')}}" data-error-slide="4" required >
                                    </div>
                                                                       
                                    @error('mq')
                                    <div class="text-danger error-message">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    {{-- NUMERO BAGNI --}}
                                    <div class="my-4 d-flex ">
                                        <label class="control-label fw-bold me-2">Numero di bagni: </label>
                                        <input type="number" id="n_wc" name="n_wc"  min="0" class="form-control" style="width:4.25rem" value="{{old('n_wc')}}" required >
                                    </div>
                                    @error('n_wc')
                                    <div class="text-danger error-message">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    {{-- NUMERO STANZE --}}
                                    <div class="my-4 d-flex">
                                        <label class="control-label fw-bold me-2">Numero di stanze</label>
                                        <input type="number" id="n_rooms" name="n_rooms"  min="0" class="form-control" style="width:4.25rem" value="{{old('n_rooms')}}" required>
                                    </div>
                                    @error('n_rooms')
                                    <div class="text-danger error-message">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    {{-- INPUT LON LAT --}}
                                    <div>
                                        <input type="hidden" name="lon" id="lon" class="form-control"  value="">
                                        <input type="hidden" name="lat" id="lat" class="form-control"  value="">
                                    </div>
                                </div>
                                <div class="col-6 d-none d-md-flex mt-4 ps-4">
                                    <img src="{{asset('tent_2.jpg')}} " width="470px" height="350px" style="border-radius:2rem;" alt="">
                                </div>
                                </div>
                            </div>

                        </div>
                        
                    
                 {{-- quinta sezione --}}                   
                    <div class="col-12">

                        <div class="carousel-item "  style="min-height: 700px; max-height:750px;">
                            <div class="form-group my-4 d-flex justify-content-around my-5">
                                <div class="d-flex flex-column">
    
                                    <div class="">
                                        <label class="control-label mb-2 fw-bold me-3">Prezzo</label>
                                        <input type="text" id="price" name="price" class="form-control" value="{{old('price')}}" required>
                                    </div>
                                    @error('price')
                                     <span class="text-danger error-message d-block">{{ $message }}</span>
                                    @enderror 
                                </div>
                            </div>
                            <div class="form-group my-4 d-flex justify-content-around my-5">
                                <div class="d-flex align-items-center">
                                    <label class="control-label mb-2 fw-bold me-3">visibilità</label>
                                <span class="me-2">visibile</span> <input type="radio" id="visibility" name="visibility" value="1" class="me-3"  {{ old('visibility' ) == '1' ? 'checked' : '' }}>
                                <span class="me-2">invisibile</span> <input type="radio" id="visibility" name="visibility" value="0" class="me-3"  {{ old('visibility') == '0' ? 'checked' : '' }}>
                                @error('visibility')
                                    <span class="text-danger error-message">{{ $message }}</span>
                                @enderror    
                                </div>
                            </div>


                           <div class="d-flex flex-column align-items-center col-12 ">
                               <div class="d-flex flex-wrap justify-content-center">
                                    <div class="col-4">

                                        <label class="control-label  mb-2 fw-bold me-3">Servizi aggiuntivi</label>
                                        @foreach($services as $service)
                                            <input class="form-check-input" type="checkbox" role="switch" name="name[]" value="{{$service->id}}" id="flexSwitchCheckDefault" {{ in_array($service->id, old('name', [])) ? 'checked' : '' }} id="flexSwitchCheckDefault"  >
                                            <label class="form-check-label" for="flexSwitchCheckDefault">{{$service->name}}</label>
                                        @endforeach                                      
                                    </div>
                                    @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                               </div>
                               
                               <div class="form-group my-4  my-5">
                                   <div class="d-flex align-items-center">
                                       <label class="control-label mb-2 fw-bold me-3">Sponsor</label>
                                       <select name="sponsor_id" id="">
                                           @foreach($sponsors as $sponsor)
                                             <option value="{{$sponsor->id}}">{{$sponsor->name}} - {{$sponsor->time}}</option>
                                           @endforeach
                                        </select>
                                    </div>
                                </div>
                               @error('sponsor')
                               <div class="text-danger error-message">{{ $message }}</div>
                               @enderror
                               <div class="">
                                   <label class="control-label mb-2 fw-bold me-3">Photos</label>
                                   <input type="file" name="cover" id="cover" >
                               </div>
                               @error('cover')
                               <div class="text-danger error-message">{{ $message }}</div>
                               @enderror

                           </div>
    
                            
                            
                        </div>
                    </div>

                    {{-- sesta --}}
                    <div class="carousel-item col-12 text-center "  style="min-height: 700px; max-height:750px;">
                        <div class="col-12 justify-content-center">

                            <button id="createSubmit" class="btn btn-success" type="submit">Submit</button>
                        </div>
                    </div>
 
                </div>
                {{-- fine slider --}}
            </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class=" "  aria-hidden="true"> <i class="fa-solid fa-chevron-left fa-2xl carousel-btn-icon" ></i></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class=" "  aria-hidden="true"><i class="fa-solid fa-chevron-right fa-2xl carousel-btn-icon" ></i></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        
        </form>
    </div>

</div>

@endsection

<style class="scss">
    .info-icon{
        padding-left: 0.1rem
    }
    textarea{
        height:170px;
        width: 50%;
        border-radius: 1rem;
    }



</style>
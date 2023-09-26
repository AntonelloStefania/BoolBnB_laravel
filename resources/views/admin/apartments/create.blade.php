{{-- @extends('layouts.admin') --}}

{{-- @section('content')

<div class="container-fluid">
   <div class="row flex-column ">
       <div class="col-12 bg-beige  text-white  position-relative">
          <form action="{{ route('admin.apartments.store') }}" id="form" class="bg-beige"  style="min-height: 700px; max-height:750px;" method="POST" enctype="multipart/form-data" @submit.prevent="event.preventDefault()">
            @csrf
         {{-- slider --}}
            {{-- <div id="carouselExampleIndicators" class="carousel slide home-text " data-bs-ride="false">
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
                <div class="carousel-inner"> --}}
                     {{-- prima sezione TIPOLOGIA DI APPARTAMENTO --}}
                    {{-- <div class="col-12">

                        <div class="carousel-item active"  style="min-height: 700px; max-height:750px;">
                            <div class="d-flex align-items-center  w-100 flex-column"> --}}
                                {{-- PROVA CHECKBOX-2 --}}
                                {{-- <div class="card col-6 my-5">
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
                                                        <img src="{{$type->icons}}"  style="width:50px; height:50px;" alt="" class="position-absolute" >
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
                                </div> --}}
                                {{-- FINE PROVA CHECKBOX-2 --}}
{{--                                 
                            </div>
                        </div>
                    </div> --}}
                    
                    {{-- seconda sezione DESCRIZIONE --}}
                  

                    {{-- <div class="carousel-item " style="min-height: 700px; max-height:750px;">
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
                    </div> --}}
                   
                    {{-- terza sezione TITOLO ED INDIRIZZO --}}
                    {{-- <div class="carousel-item "  style="min-height: 700px; max-height:750px;">
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
                    </div> --}}
                    {{-- quarta sezione --}}
                   
                    {{-- <div class="carousel-item  " style="min-height: 700px; max-height:750px;">
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
                                <div class="col-12 col-md-6 d-flex align-items-end pe-5 flex-column"> --}}
                                    {{-- METRI QUADRI APPARTAMENTO --}}                                    
                                    {{-- <div class="mb-4 mt-5 d-flex ">
                                        <label class="control-label fw-bold me-2 " for="name">Metri quadri alloggio: </label>
                                        <input type="number" id="mq" name="mq" min="0" class="form-control" style="width:4.25rem" value="{{old('mq')}}" data-error-slide="4" required >
                                    </div> --}}
                                                                       
                                    {{-- @error('mq')
                                    <div class="text-danger error-message">
                                        {{ $message }}
                                    </div>
                                    @enderror --}}
                                    {{-- NUMERO BAGNI --}}
                                    {{-- <div class="my-4 d-flex ">
                                        <label class="control-label fw-bold me-2">Numero di bagni: </label>
                                        <input type="number" id="n_wc" name="n_wc"  min="0" class="form-control" style="width:4.25rem" value="{{old('n_wc')}}" required >
                                    </div>
                                    @error('n_wc')
                                    <div class="text-danger error-message">
                                        {{ $message }}
                                    </div>
                                    @enderror --}}
                                    {{-- NUMERO STANZE --}}
                                    {{-- <div class="my-4 d-flex">
                                        <label class="control-label fw-bold me-2">Numero di stanze</label>
                                        <input type="number" id="n_rooms" name="n_rooms"  min="0" class="form-control" style="width:4.25rem" value="{{old('n_rooms')}}" required>
                                    </div>
                                    @error('n_rooms')
                                    <div class="text-danger error-message">
                                        {{ $message }}
                                    </div>
                                    @enderror --}}
                                    {{-- INPUT LON LAT --}}
                                    {{-- <div>
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
                         --}}
                    
                 {{-- quinta sezione --}}                   
                    {{-- <div class="col-12">

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
                                        <div class="text-danger error-message">{{ $message }}</div>
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
                    </div> --}}

                    {{-- sesta --}}
                    {{-- <div class="carousel-item col-12 text-center "  style="min-height: 700px; max-height:750px;">
                        <div class="col-12 justify-content-center">

                            <button id="createSubmit" class="btn btn-success" type="submit">Submit</button>
                        </div>
                    </div>
 
                </div> --}}
                {{-- fine slider --}}
            {{-- </div>
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

@endsection --}}

{{-- <style class="scss">
    .info-icon{
        padding-left: 0.1rem
    }
    textarea{
        height:170px;
        width: 50%;
        border-radius: 1rem;
    }

    textarea::-webkit-scrollbar {
   display: none;
 }



</style> --}}




@extends('layouts.admin')

@section('content')
<div class="container-fluid navbar-container">
    <div class="row justify-content-between w-100">
        <div class="d-flex col-6">
            <div class="col-6 col-lg-4 py-3 d-flex justify-content-end">
                <a href="{{route('admin.apartments.index')}}"  class="" style="text-decoration:none; color:#3a537e;"><i class="fa-regular fa-circle-left" style="color: #3a537e;"></i> I tuoi Annunci  </a>
            </div>
        </div>
    </div>
</div>
<div class="container mt-5">
   <div class="row">
    {{-- TITOLO PAGINA --}}
      <div class="col-12 text-center mb-2">
            <h1 class="titolo">Benvenuto su <span class="brand">BoolBnb</span> - Crea il Tuo Annuncio! </h1>
            <div class="col-12 my-3">
                <p>
                    Sei a un passo dal condividere il tuo spazio con il mondo. Qui potrai personalizzare ogni dettaglio del tuo annuncio e renderlo unico. Rendilo attraente per i tuoi futuri ospiti fornendo tutte le informazioni necessarie e aggiungendo foto che mettano in risalto le caratteristiche del tuo spazio.                         
                </p>
                <p class="mt-5">
                    Segui i passaggi con attenzione e non esitare a inserire quante più informazioni possibili. Più dettagli fornirai, maggiore sarà l'interesse degli ospiti e la loro soddisfazione durante il soggiorno.
                </p>
            </div>
     </div>
   </div>
</div>
<div class="container-fluid bg-beige">
    <div class="row">
        <div class="col-10 offset-1">
           <div class="row">
               <div class="col-12">
                    <form action="{{ route('admin.apartments.store') }}" id="form" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                        
                        {{--1 SEZ. TITOLO/DESCRIZIONE --}}
                        <div class="row  my-5">
                            <div class="col-12 col-lg-6">
                                    <div class=" text-center">
                                        <h2><span class="brand">Titolo</span> e <span class="brand">Descrizione</span></h2>
                                    </div>
                                <div class="col-12 ">
                                    <label class="control-label mb-2 fw-bold"><span class="brand">Titolo</span> Annuncio:</label>
                                    <input type="text" id="title" name="title" class="form-control" value="{{old('title')}}">
                                    
                                </div>
                                <div>
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror 
                                </div>
                                <div class="col-12 ">
                                    <label class="control-label fw-bold mb-2 mt-5"><span class="brand">Descrizione</span> Alloggio:</label>
                                    <textarea class="form-control" name="description" id="" cols="30" rows="10">{{old('description')}}</textarea>   
                                </div>
                            </div>
                            <div class="col-12 col-lg-3 col-md-6 d-flex flex-column mt-5 mt-lg-0">
                                <div class="col-12 text-center">
                                    <h2><span class="brand">Generalità</span></h2>
                                </div>
                                {{-- METRI QUADRI APPARTAMENTO --}}
                                <div class="col-12 mb-3 text-center">
                                    <label class="control-label fw-bold mb-2  " for="name"><span class="brand">Grandezza</span> Alloggio: </label>
                                    <div class="d-flex justify-content-center">
                                        <input type="number" id="mq" name="mq" class="form-control" style="width:4.25rem" value="{{old('mq')}}"><span class="align-self-center fw-bold ms-2"> &#x33A1;</span>
                                       
                                    </div>
                                    <div>
                                        @error('mq')
                                            <span class="text-danger d-block">{{ $message }}</span>
                                        @enderror 
                                    </div>
                                </div>
                                {{-- NUMERO STANZE --}}
                                <div class="col-12 mb-3 text-center">
                                    <label class="control-label fw-bold mb-2">Numero di <span class="brand">Stanze</span></label>
                                    <div class="d-flex justify-content-center">
                                        <input type="number" id="n_rooms" name="n_rooms" class="form-control" style="width:4.25rem" value="{{old('n_rooms')}}"><i class="fa-solid fa-building ms-2 align-self-center" style="color: #4f5153;"></i>
                                       
                                    </div>
                                    <div>
                                        @error('n_rooms')
                                            <span class="text-danger d-block">{{ $message }}</span>
                                        @enderror 
                                    </div>
                                </div>

                                {{-- NUMERO BAGNI --}}
                                <div class="col-12 mb-3 text-center">
                                    <label class="control-label fw-bold mb-2">Numero di <span class="brand">Bagni</span>: </label>
                                    <div class="d-flex justify-content-center">
                                        <input type="number" id="n_wc" name="n_wc" class="form-control" style="width:4.25rem" value="{{old('n_wc')}}"><i class="fa-solid fa-toilet-paper ms-2 align-self-center" style="color: #4f5153;"></i>
                                        
                                    </div>
                                    <div>
                                        @error('n_wc')
                                            <span class="text-danger d-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- NUMERO LETTI --}}
                                <div class="col-12 mb-3 text-center">
                                    <label class="control-label fw-bold mb-2">Numero di <span class="brand">Letti</span>: </label>
                                    <div class="d-flex justify-content-center">
                                        <input type="number" id="n_beds" name="n_beds" class="form-control" style="width:4.25rem" value="{{old('n_beds')}}"><i class="fa-solid fa-bed ms-2 align-self-center" style="color: #4f5153;"></i>
                                        
                                    </div>
                                    <div>
                                        @error('n_beds')
                                            <span class="text-danger d-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-3 col-md-6 d-flex flex-column mt-5 mt-lg-0">
                                <div class="col-12 text-center">
                                    <h2><span class="brand">Indirizzo</span></h2>
                                </div>
                                {{-- indirizzo --}}
                                <div class="col-12 mb-3 text-center">
                                    
                                    <div class="d-flex justify-content-center">
                                        <input type="ratio" list="suggestions" id="address" name="address" class="form-control" value="{{old('address')}}" >   
                                        <datalist id="suggestions">
                                        </datalist>                                    
                                    </div>
                                    <div>
                                        @error('address')
                                         <span class="text-danger d-block">{{ $message }}</span>
                                        @enderror 
                                    </div>
                                      {{-- INPUT LON LAT --}}
                                      <div>
                                        <input type="hidden" name="lon" id="lon" class="form-control"  value="">
                                        <input type="hidden" name="lat" id="lat" class="form-control"  value="">
                                    </div>
                                </div>
                                <div class="col-12 text-center mt-5">
                                    <h2><span class="brand">Prezzo</span> per Notte</h2>
                                    
                                    <div class="d-flex justify-content-center">
                                        <input type="text" id="price" name="price" class="form-control" style="width:4.25rem" value="{{old('price')}}" ><span class="fw-bold d-flex align-items-center ms-2">&euro;</span>                               
                                    </div>
                                    <div>
                                        @error('price')
                                             <span class="text-danger d-block">{{ $message }}</span>
                                        @enderror 
                                    </div>
                                </div>
                           
                            </div>
                    </div>
                </div>
            </div>       
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="mb-5 my-5">
                <div class="text-center">
                    <h2>Che <span class="brand">Tipologia</span> di Alloggio vuoi Affittare <span class="brand">?</span></h2>
                    <p>
                        Scegli con attenzione la tipologia che meglio si adatta al tuo alloggio e alle tue esigenze, in modo che gli ospiti possano trovare esattamente ciò che stanno cercando su <span class="brand">BoolBnB</span>.
                    </p>
                </div>
                <div class="rating col-12 col-md-8 offset-md-2 d-flex flex-wrap justify-content-center">
                
                    @foreach($types as $type)
                    <div class="col-6 col-md-4 d-flex my-3 flex-column align-items-center">
                        <label for="type-id-{{$type->id}}" class="position-relative d-flex change-cursor justify-content-center align-items-center {{ $type->id == old('type_id') ? 'type-bg' : '' }}" style="width:75px; height:75px;">
                            <input type="radio" name="type_id" style="width:65px; height:65px; appearance:none" class="radio-icons" value="{{$type->id}}" id="type-id-{{$type->id}}" {{ old('type_id') ? 'checked' : '' }}>
                            <img src="{{$type->icons}}" style="width:50px; height:50px;" alt="" class="type-icons position-absolute" >
                        </label>
                        <span class="fw-bold">{{$type->name}}</span>
                    </div>
                    @endforeach
                    @error('type_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    
                </div>
            </div>                  
        </div>
    </div>
</div>
<div class="container-fluid bg-beige">
    <div class="container ">
        <div class="row my-5">
            <div class="col-12 text-center ">
                
                <h2 class="mt-5 mb-2"> Scegli la Tua Immagine di <span class="brand">Copertina</span></h2>
                <p>
                    L'immagine di copertina è la prima impressione che gli ospiti avranno del tuo alloggio su <span class="brand">BoolBnB</span>. Scegli con cura un'immagine che catturi l'essenza e l'atmosfera del tuo spazio. Una bella immagine di copertina può fare la differenza e attirare l'attenzione degli ospiti.
                </p>
                
            </div>
                    {{-- PROVA DROP-CONTAINER --}}
            <div>        
                <label for="images" class="drop-container  col-12 col-md-6 offset-md-3 my-4" style="min-height: 250px" id="dropcontainer">
                    
                    <span class="drop-title ">Sposta qui l'immagine</span>
                    oppure
                    <input type="file" id="images"  name="cover"  class="blue-btn" accept="image/*" >
                    @error('cover')
                        <span class="text-danger d-block">{{ $message }}</span>
                    @enderror 
                </label>
                
                {{-- FINE DROP-CONTAINER --}}
            </div>
        </div>
    </div>
</div>  
    
<div class="container">
    <div class="row">
            {{-- SERVIZI AGGIUNTIVI --}}
        <div class="col-12">
            
            <div class="text-center my-4">
                <h2 class="control-label mb-2 my-3"><span class="brand">Servizi</span> Aggiuntivi</h2>
                <p>
                    Personalizza l'esperienza per i tuoi ospiti scegliendo tra una varietà di servizi aggiuntivi per la tua struttura. Questo campo ti consente di adattare la tua offerta alle esigenze dei tuoi ospiti. Seleziona i servizi che ritieni possano arricchire il loro soggiorno e migliorare la loro esperienza. Rendi la tua struttura ancora più attraente e confortevole per i futuri ospiti.      
                </p>
            </div>                
        
            <div class="d-flex align-items-center flex-wrap col-12 col-md-8 offset-md-2 justify-content-center ">
                @foreach($services as $service)
                <div class="col-6 text-center col-md-4 d-flex my-3 flex-column align-items-center ">
                    <label class="form-check-label pb-2 position-relative d-flex change-cursor justify-content-center align-items-center " style="width:50px; height:50px;" for="flexSwitchCheck-{{$service->id}}">
                        <input class="form-check-input m-1"  type="checkbox"  role="" name="name[]" style=" border:none; background-color:transparent; width:35px; height:35px;" value='{{ $service->id }}' {{ in_array($service->id, old('name', [])) ? 'checked' : '' }} id="flexSwitchCheck-{{$service->id}}" data-service-id="{{$service->id}}" >
                        <img src="{{$service->icons}}" style="width:50px; height:50px; border: 2px solid transparent;" alt="" class="position-absolute clickable-service" data-checkbox-id="flexSwitchCheck-{{$service->id}}">
                    </label>
                    <span>{{$service->name}}</span>
                </div>
                @endforeach
                <div class="text-center col-12 mt-3">
                    @error('name')
                        <span class="text-danger d-block">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
    </div>    
</div> 
    
    {{-- SPONSOR --}}

<div class="container sponsor-container">
    <div class="row">
        <div class="col-12 text-center my-5">
            <h2 class="mb-3"><span class="brand">Sponsorizza</span> il tuo Annuncio!</h2>
            <p>
                Vuoi dare una marcia in più al tuo annuncio? Ora puoi farlo con la nostra sponsorizzazione! Oltre agli abbonamenti gratuiti, offriamo opzioni di sponsorizzazione per diverse durate: Abbonamento <span class="fw-bold">Free</span>, Abbonamento <span class="fw-bold">Base</span>, Abbonamento <span class="fw-bold">Avanzato</span> e Abbonamento <span class="fw-bold">Pro</span>. Scegli la sponsorizzazione che si adatta meglio alle tue esigenze e goditi una visibilità superiore per il tuo annuncio su <span class="brand">BoolBnB</span>. Promuovi il tuo spazio ora!
            </p>
        </div>
        @foreach($sponsors as $sponsor)
     
        <div class="col-6 col-lg-3 cursor-pointer">
            <div class="card {{ $sponsor->name === 'free' ? 'bg-c-blue' : ($sponsor->name === 'base' ? 'bg-c-green' : ($sponsor->name === 'avanzato' ? 'bg-c-yellow' : ($sponsor->name === 'pro' ? 'bg-c-pink' : ''))) }} order-card">
                <div class="card-block">
                    <h4 class="m-b-20 fw-bold text-capitalize  mb-4">{{$sponsor->name}}</h4>
                    <h5 class="text-right mb-3"><i class="fa-regular fa-clock me-2" style="color: #5370a2;"></i><span class="fw-bold">{{$sponsor->time}} h</span></h5>
                    <input type="radio" style="appearance: none"  name="sponsor_id" class="" value="{{$sponsor->id}}" {{ $sponsor->name === 'free' ? 'checked' : '' }} required>
                    <p class="m-b-0">Prezzo:<span class="f-right fw-bold">{{$sponsor->price}}&euro;</span></p>
                </div>
            </div>
        </div>
     
        @endforeach
        @error('sponsor')
        <span class="text-danger d-block">{{ $message }}</span>
        @enderror 
    </div>
</div>
    {{-- FINE SPONSOR --}}

      {{-- VISIBILITA' --}}
    <div class="container-fluid bg-beige">
        <div class="contoiner">
            <div class="row">
                <div class="form-group my-4 d-flex justify-content-around my-5">
                    <div class="d-flex align-items-center">
                        <span class="form-check-label me-3">Vuoi rendere il tuo Annuncio <span class="brand">Visibile</span> al pubblico Ora?</span>
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="visibility" id="visible"    type="checkbox" role="switch"  value="1" {{ old('visibility' ) == '1' ? 'checked' : '' }} />
                            <input type="checkbox" value="0" name="visibility" style="appearance: none" id="invisible" {{ old('visibility' ) == '0' ? 'checked' : '' }} checked >
                          </div>
                          <div>
                              @error('visibility')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror    
                          </div>
                        </div>
                    </div> 
                 </div>
                </div>
            </div>
            <input type="hidden" name="user_id" id="user_id" class="form-control"  value="{{ $user->id }}"> 
        </div>
        <div class="container my-5">
            <div class="row">
                <div class="col-12 text-center">
                    <button class="blue-btn btn" id="createSubmit" type="submit">Pubblica Annuncio</button>
                </div>
            </div>
        </div>
    </form>
        </div>
   </div>
</div>
{{-- FOOTER --}}
<footer id="footer-large">
		
	<div class="footer-container">
		
		<div class="footer-informazioni">
		 <div>
            <h1>BOOLBNB</h1>
        </div>
			
		  <p class="margin-bot-15px descrizione">I valori fondamentali di BoolBnB includono l'eccellenza nell'ospitalità, la soddisfazione del cliente e la trasparenza. BoolBnB si impegna a offrire servizi di alta qualità e alloggi ben curati per garantire un'esperienza memorabile ai suoi ospiti. La compagnia promuove la fiducia attraverso recensioni autentiche e una comunicazione aperta. Inoltre, BoolBnB abbraccia la diversità e promuove la connessione tra culture, offrendo alloggi unici in tutto il mondo per un'esperienza autentica e stimolante. 
			</p>
			
		
		</div>	
		
		<div class="footer-menu">
		<div class="menu-footer descrizione"><ul id="menu-menu-footer" class="menu">
    	<li><a href="#">Homepage</a></li>
		<li><a href="#">Appartamenti</a></li>
		<li><a href="#">Vetrina</a></li>
		<li><a href="#">Sponsorizzazioni</a></li>
		<li><a href="#">Profilo</a></li>
		</ul></div> <!-- Footer Menu -->
		</div>
		
		<div class="footer-contatti">
			
		<div class="descrizione color-secondary">Contatti</div>
		<p class="descrizione">Tel: +39 0584 000000<br/>
		Email: <a href="#">info@info.com</a><br/>
		Indirizzo: via Roma 111, Pietrasanta (LU), Italia.<br/>
        </p>
			
		<div class="social-cont">        
		<ul class="social-list">

		<li class="trans-color"><a target="_blank" href="#"><img src="https://www.chefstudio.it/img/facebook-icon.png"  title="facebook" alt="Facebook icon"><br></a></li>
		<li class="trans-color"><a target="_blank" href="#"><img src="https://www.chefstudio.it/img/instagram-icon.png" title="Instagram" alt="Instagram icon"><br></a></li>
		<li class="trans-color"><a target="_blank" href="#"><img src="https://www.chefstudio.it/img/pinterest-icon.png" title="pinterest" alt="Instagram icon"><br></a></li>

		</ul>
    	<div class="floatstop"></div>
		</div><!--/fine social cont-->
			
		</div>
		


		<div class="floatstop"></div>
		
		<div class="avvertenze-legali">
		<p>
		Informazioni legali | I testi, le informazioni e gli altri dati pubblicati in questo sito nonché i link ad altri siti presenti sul web hanno esclusivamente scopo informativo e non assumono alcun carattere di ufficialità. Non assume alcuna responsabilità per eventuali errori od omissioni di qualsiasi tipo e per qualunque tipo di danno diretto, indiretto o accidentale derivante dalla lettura o dall'impiego delle informazioni pubblicate, o di qualsiasi forma di contenuto presente nel sito o per l'accesso o l'uso del materiale contenuto in altri siti.
		</p>
		</div>			
		
			
	
</div> <!--/fine footer container -->
	
</footer>

<script>
  
</script>
@endsection

<style lang="scss">
.drop-container {
  position: relative;
  display: flex;
  gap: 10px;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  height: 200px;
  padding: 20px;
  border-radius: 10px;
  border: 2px dashed #7b97d4;
  color: #4d9cb4;
  cursor: pointer;
  transition: background .2s ease-in-out, border .2s ease-in-out;
}

.drop-container:hover {
  background: #eee;
  border-color: #111;
}

.drop-container:hover .drop-title {
  color: #222;
}

.drop-title {
  color: #444;
  font-size: 20px;
  font-weight: bold;
  text-align: center;
  transition: color .2s ease-in-out;
}

.old-cover{
    border-radius:0.5rem;
}

textarea::-webkit-scrollbar {
   display: none;
 }

 .form-check-input:checked[type=checkbox]{
    --bs-form-check-bg-image: url() !important;
 }

 .form-check-input[type=checkbox] {
     border-radius: 0 !important; 
     
}


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

/* FOOTER */
@charset "utf-8";

/* -------------reset----------------*/
html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, font, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td, video {
    margin: 0;
    padding: 0;
    border: 0;
    outline: 0;
    font-size: 100%;
    vertical-align: baseline;
    background: transparent;
}

input:focus, button:focus {outline:0;}

img {
    vertical-align: middle;
}

a{
	text-decoration:none;
}

p{
	margin-bottom:12px;
}

ul li{ 
	list-style:none;
}

html,body{
	font-family: 'Roboto Slab', serif;
	color:#666 /*color-text*/;
	height:100%;
	width:100%;
}

h1{
	font-size: 1.5em;
	text-align:left;
	font-weight: bold;
	color:#718dd8/* primary color*/;
}

/* -----------------contenitore e contenuto ------------------ */

.descrizione{
    font-size: 0.9rem;
}

.contenitore .contenuto{
	max-width:1200px;
	margin:auto;
	padding: 70px 10px;
	padding-bottom: 70px;
}

/* -----------------footer html-----------------*/

#footer-large a{
	color:white; /* seconday color*/
}

#footer-large a:hover{
	color:#FFADA6; /* light seconday color*/	
}

#footer-large .credits {
	max-width:300px;
	margin:auto;
}

#footer-large .credits a img {
  -o-transition: opacity .2 ease-in;
  -ms-transition: opacity .2s ease-in;
  -moz-transition: opacity .2s ease-in;
  -webkit-transition: opacity .2s ease-in;
  transition: opacity .2s ease
}

#footer-large .credits a img:hover {
	opacity:0.6;
}

#footer-large .social-cont .social-list {
	list-style-type: none;
	margin: 0 auto;
	padding: 10px 0;
}

#footer-large .social-cont .social-list > li {
	margin: 8px 8px 8px 0;
	display: inline-block;
	vertical-align: top;
	height: 32px;
	width: 32px;
	border-radius: 6em;
	background-color:#e49c96; /* secondary-color*/
}

#footer-large .social-cont .social-list li img {
	width: 32px
}

#footer-large .social-cont .social-list > li:hover {
background:#718dd8; /* light seconday color*/		
}

/* -----------------footer-large------------------ */
#footer-large{
	width: 100%;
	border-top: 1px solid #718dd8;
	padding-top: 20px;
	background-color: #718dd8;/* primary color*/
	color: #fff;
}

#footer-large p{
	line-height: normal;
}

#footer-large .footer-informazioni{
	padding: 0 0 15px 0;
	border-bottom: 1px solid #718dd8;
	border-left: 10px solid #718dd8;
    border-right: 10px solid #718dd8;/* primary color*/
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -ms-box-sizing: border-box;
    box-sizing: border-box;
	border-top: 1px solid #718dd8;
}

#footer-large .footer-menu{
	padding: 15px 0;
	border-bottom: 1px solid #e49c96;
		border-left: 10px solid #718dd8;/* primary color*/
    border-right: 10px solid #718dd8;/* primary color*/
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -ms-box-sizing: border-box;
    box-sizing: border-box;
	line-height: 1.5em;
	
}

#footer-large .footer-contatti{
	padding: 15px 0;
	border-left: 10px solid #718dd8;/* primary color*/
    border-right: 10px solid #718dd8;/* primary color*/
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -ms-box-sizing: border-box;
    box-sizing: border-box;
}

.avvertenze-legali p {
    font-size: 12px;
    line-height: 18px;
    margin: 10px 10px 0 10px;
    text-align: justify;
    border-top: 1px solid #e49c96; /* light seconday color*/;
    padding: 26px 0;
	border-bottom: 1px solid #e49c96;
	display: inline-block;
}

.credits {
	text-align: center;
    padding-top: 24px;
    padding-bottom: 50px;
    font-size: 14px;
}
	
@media screen and (min-width: 672px){

#footer-large .footer-informazioni{
	padding: 0 0 15px 0;
	border-bottom: none;
	border-left: 10px solid #718dd8;
    border-right: 10px solid #718dd8;/* primary color*/
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -ms-box-sizing: border-box;
    box-sizing: border-box;
}
	
#footer-large{
	display:inline-block;	
}
	
#footer-large .footer-menu{
	width: 50%;
	float: left;
	border-bottom: none;
	border-top: 1px solid #718dd8;
}

#footer-large .footer-contatti{
	width: 50%;
	float: left;
	border-bottom: none;
	border-top: 1px solid #718dd8;
}
	
}

@media screen and (min-width: 1280px){
	
#footer-large{
	display:inline-block;
}
	
#footer-large .footer-container{
		max-width: 1300px;
		margin: auto;
}

#footer-large .footer-informazioni{
	width: 50%;
	float: left;
	border-bottom: none;
}

#footer-large .footer-menu{
	width: 25%;
	float: left;
}

#footer-large .footer-contatti{
	width: 25%;
	float: left;
}
	
}

</style>
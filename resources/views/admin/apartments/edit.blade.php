@extends('layouts.admin')

@section('content')

<div class="container">
   <div class="my-4 d-flex justify-content-start">
      <a href="{{route('admin.apartments.index')}}" class="btn btn-sm back-button"><i class="fa-regular fa-circle-left fa-l me-2" style="color: #161616;"></i>Torna agli annunci</a>
  </div>
   <div class="row">
    {{-- TITOLO PAGINA --}}
      <div class="col-12 text-center mb-5">
            <h1 class="titolo">Modifica il tuo annuncio su <span class="brand">BoolBnb</span> </h1>
            <div class="col-12 my-3">
                <p>
                    Benvenuto alla pagina di <span class="brand">modifica</span> dei tuoi annunci. Qui puoi apportare modifiche e aggiornamenti alle 
                    informazioni e alle caratteristiche dei tuoi appartamenti. <span class="brand">Ottimizza le descrizioni</span>, caricate nuove foto e 
                    assicurati che i tuoi annunci siano sempre al massimo delle prestazioni per attirare potenziali inquilini. 
                    <span class="brand">Personalizza</span> e gestisci in modo efficace le informazioni sui tuoi appartamenti per massimizzare il vostro successo nel settore immobiliare.                         
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
                    <form action="{{ route('admin.apartments.update', $apartment->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                        
                        {{--1 SEZ. TITOLO/DESCRIZIONE --}}
                        <div class="row  my-5">
                            <div class="col-12 col-lg-6">
                                    <div class=" text-center">
                                        <h2><span class="brand">Titolo</span> e <span class="brand">Descrizione</span></h2>
                                    </div>
                                <div class="col-12 ">
                                    <label class="control-label mb-2 fw-bold"><span class="brand">Titolo</span> Annuncio:</label>
                                    <input type="text" id="title" name="title" class="form-control" value="{{old('title') ?? $apartment->title}}">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror 
                                </div>
                                <div class="col-12 ">
                                    <label class="control-label fw-bold mb-2 mt-5"><span class="brand">Descrizione</span> Alloggio:</label>
                                    <textarea class="form-control" name="description" id="" cols="30" rows="10">{{old('description') ?? $apartment->description }}</textarea>   
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
                                        <input type="number" id="mq" name="mq" class="form-control" style="width:4.25rem" value="{{old('mq') ?? $apartment->mq}}"><span class="align-self-center fw-bold ms-2"> &#x33A1;</span>
                                        @error('mq')
                                            <span class="text-danger d-block">{{ $message }}</span>
                                        @enderror 
                                    </div>
                                </div>
                                {{-- NUMERO STANZE --}}
                                <div class="col-12 mb-3 text-center">
                                    <label class="control-label fw-bold mb-2">Numero di <span class="brand">Stanze</span></label>
                                    <div class="d-flex justify-content-center">
                                        <input type="number" id="n_rooms" name="n_rooms" class="form-control" style="width:4.25rem" value="{{old('n_rooms') ?? $apartment->n_rooms}}"><i class="fa-solid fa-bed ms-2 align-self-center" style="color: #4f5153;"></i>
                                        @error('n_rooms')
                                            <span class="text-danger d-block">{{ $message }}</span>
                                        @enderror 
                                    </div>
                                </div>

                                {{-- NUMERO BAGNI --}}
                                <div class="col-12 mb-3 text-center">
                                    <label class="control-label fw-bold mb-2">Numero di <span class="brand">Bagni</span>: </label>
                                    <div class="d-flex justify-content-center">
                                        <input type="number" id="n_wc" name="n_wc" class="form-control" style="width:4.25rem" value="{{old('n_wc') ?? $apartment->n_wc}}"><i class="fa-solid fa-toilet-paper ms-2 align-self-center" style="color: #4f5153;"></i>
                                        @error('n_wc')
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
                                        <input type="ratio" id="address" name="address" class="form-control" value="{{old('address') ?? $apartment->address}}" >                                       
                                    </div>
                                    @error('address')
                                     <span class="text-danger d-block">{{ $message }}</span>
                                    @enderror 
                                </div>
                                <div class="col-12 text-center mt-5">
                                    <h2><span class="brand">Prezzo</span> per Notte</h2>
                                    
                                    <div class="d-flex justify-content-center">
                                        <input type="text" id="price" name="price" class="form-control" style="width:4.25rem" value="{{old('price') ?? $apartment->price}}" ><span class="fw-bold d-flex align-items-center ms-2">&euro;</span>                                    </div>
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
                        <h2>Modifica la <span class="brand">Tipologia</span> dell'Alloggio</h2>
                        <p>
                            Hai apportato modifiche alla tua struttura o desideri offrire una nuova tipologia di alloggio? Aggiorna il tuo annuncio su <span class="brand">BoolBnB</span> per far conoscere ai viaggiatori le tue ultime novità. Mantieni sempre aggiornate le tue offerte e attira più ospiti con le tue offerte rinnovate su <span class="brand">BoolBnB</span>!
                        </p>
                    </div>
                    <div class="rating col-12 col-md-8 offset-md-2 d-flex flex-wrap justify-content-center">
                    
                        @foreach($types as $type)
                        <div class="col-6 col-md-4 d-flex my-3 flex-column align-items-center">
                            <label for="type-id-{{$type->id}}" class="position-relative d-flex change-cursor justify-content-center align-items-center {{ $type->id == old('type_id', $apartment->type_id) ? 'type-bg' : '' }}" style="width:75px; height:75px;">
                                <input type="radio" name="type_id" style="width:65px; height:65px; appearance:none" class="radio-icons" value="{{$type->id}}" id="type-id-{{$type->id}}" {{ $type->id == old('type_id', $apartment->type_id) ? 'checked' : '' }}>
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
                    
                    <h2 class="my-5">Aggiorna l'Immagine di Copertina su <span class="brand">BoolBnB</span></h2>
                    <p>
                        L'immagine di copertina è la prima impressione che gli ospiti avranno del tuo alloggio su <span class="brand">BoolBnB</span>. Cambiala periodicamente per rendere il tuo annuncio sempre fresco e attraente. Cattura l'attenzione con nuove foto che mostrano al meglio le caratteristiche uniche della tua struttura e accogli i tuoi futuri ospiti con uno sguardo invitante su <span class="brand">BoolBnB</span>.
                    </p>
                   
                </div>
                <div class="col-12 d-flex my-5 flex-column flex-md-row">
                    <div class="col-12 col-md-6 mb-5 mb-md-0 d-flex flex-column align-items-center ">
                        <h3 class="">Copertina <span class="brand">Precedente</span></h3>
                        @if ($apartment->cover)
                        
                            <img src="{{ asset('storage/' . $apartment->cover) }}" alt="Immagine precedente" class="old-cover" style="width: 18rem;">
                        
                        @endif
                    </div>
                    <div class="col-12 col-md-6 d-flex flex-column align-items-center">
    
                        {{-- PROVA DROP-CONTAINER --}}
                        <h3><span class="brand">Nuova</span> Copertina</h3>
                        <label for="images" class="drop-container h-100" id="dropcontainer">
                            
                            <span class="drop-title">Sposta qui l'immagine</span>
                            oppure
                            <input type="file" id="images"  name="cover" value="{{ $apartment->cover }}" class="blue-btn" accept="image/*" >
                            @error('cover')
                                <span class="text-danger d-block">{{ $message }}</span>
                            @enderror 
                        </label>
                    
                    {{-- FINE DROP-CONTAINER --}}
                    </div>
                </div>
            </div>
        </div>  
    </div>
    <div class="container">
        <div class="row">
               {{-- SERVIZI AGGIUNTIVI --}}
               <div class="col-12">
                   
                    <div class="text-center my-4">
                        <h2 class="control-label mb-2 fw-bold my-3"><span class="brand">Servizi</span> Aggiuntivi</h2>
                        <p>
                            Personalizza l'esperienza per i tuoi ospiti scegliendo tra una varietà di servizi aggiuntivi per la tua struttura. Questo campo ti consente di adattare la tua offerta alle esigenze dei tuoi ospiti. Seleziona i servizi che ritieni possano arricchire il loro soggiorno e migliorare la loro esperienza. Rendi la tua struttura ancora più attraente e confortevole per i futuri ospiti.      
                        </p>
                    </div>                
                    {{-- <div class="d-flex align-items-center flex-wrap ">
                        @foreach($services as $service)
                            <input class="form-check-input m-1" type="checkbox" role="switch" name="name[]" value='{{ $service->id }}' {{$errors->any() ? (in_array($service->id, old('services', [])) ? 'checked' : '') : ($apartment->services->contains($service) ? 'checked' : '') }} id="flexSwitchCheckDefault" >
                            <label class="form-check-label " for="flexSwitchCheckDefault">{{$service->name}}</label>
                        @endforeach --}}

                        {{-- @foreach($services as $service)
                            <div class="col-6 col-md-4 d-flex my-3 flex-column align-items-center">
                                <label for="service-id-{{$service->id}}" class="position-relative d-flex change-cursor justify-content-center align-items-center {{ $service->id == old('service_id', $apartment->service_id) ? 'type-bg' : '' }}" style="width:75px; height:75px;">
                                    <input type="checkbox" name="service_name[]" role="switch" style="width:65px; height:65px; appearance:none" class="radio-icons" value="{{$service->id}}" id="service-id-{{$service->id}}"{{$errors->any() ? (in_array($service->id, old('services', [])) ? 'checked' : '') : ($apartment->services->contains($service) ? 'checked' : '') }} >
                                    <img src="{{$service->icons}}" style="width:50px; height:50px;" alt="" class="service-icons position-absolute" >
                                </label>
                                <span class="fw-bold">{{$service->name}}</span>
                            </div>
                        @endforeach
                        @error('service')
                          <span class="text-danger d-block">{{ $message }}</span>
                        @enderror  --}}
                <div class="d-flex align-items-center flex-wrap ">
                        @foreach($services as $service)
                        <div class="col-6 col-md-4 d-flex my-5 flex-column align-items-center ">
                            <label class="form-check-label" for="flexSwitchCheck-{{$service->id}}">
                                <input class="form-check-input m-1"  type="checkbox" role="switch" name="service_name[]" value='{{ $service->id }}' {{$errors->any() ? (in_array($service->id, old('name', [])) ? 'checked' : '') : ($apartment->services->contains($service) ? 'checked' : '') }} id="flexSwitchCheck-{{$service->id}}" data-service-id="{{$service->id}}" >
                                <img src="{{$service->icons}}" alt="Service Icon" data-service-id="{{$service->id}}" class="service-icon position-absolute" style="cursor: pointer;">
                            </label>
                            <span>{{$service->name}}</span>
                        </div>
                    @endforeach
                    @error('service_name')
                        <span class="text-danger d-block">{{ $message }}</span>
                    @enderror
                       
                </div>
               
            </div>    
    </div>                                                
                 {{-- PREZZO E SPONSOR --}}
                    <div class="col-12">
                        {{-- prezzo --}}
                        <div class="">        
                            <div class="">
                                
                                
                            </div>
                            @error('price')
                            <span class="text-danger d-block">{{ $message }}</span>
                            @enderror 
                        </div>
                        {{-- SPONSOR --}}
                        <div class="d-flex align-items-center">
                            <label class="control-label mb-2 fw-bold me-3">Sponsor</label>
                            <select name="sponsor_id" id="">
                                @foreach($sponsors as $sponsor)
                                <option value="{{$sponsor->id}}" {{ $sponsor->id == old('sponsor_id', $apartment->sponsor_id) ? 'selected' : ''}}>{{$sponsor->name}} - {{$sponsor->time}}</option>
                                @endforeach
                            </select>
                            @error('sponsor')
                            <span class="text-danger d-block">{{ $message }}</span>
                           @enderror 
                       </div>
                    </div>
                   {{-- visibilità --}}
                <div class="form-group my-4 d-flex justify-content-around my-5">
                    <div class="d-flex align-items-center">
                        <label class="control-label mb-2 fw-bold me-3">visibilità</label>
                    <span class="me-2">visibile</span> <input type="radio" id="visibility" name="visibility" value="1" class="me-3" {{ old('visibility', $apartment->visibility) == '1' ? 'checked' : '' }}>
                    <span class="me-2">invisibile</span> <input type="radio" id="visibility" name="visibility" value="0" class="me-3" {{ old('visibility', $apartment->visibility) == '0' ? 'checked' : '' }} >
                    @error('visibility')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror    
                    </div>
                </div> 
                <div class="col-12 text-center mb-5">
                
                    <button class="blue-btn btn" type="submit">Submit</button>
                </div>       
           </form>
        </div>
   </div>
</div>
 {{-- <input type="hidden" name="user_id" id="user_id" class="form-control"  value="{{ $user->id }}">  --}}
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
</style>
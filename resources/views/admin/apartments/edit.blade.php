@extends('layouts.admin')

@section('content')

<div class="container">
   <div class="my-4 d-flex justify-content-start">
      <a href="{{route('admin.apartments.index')}}" class="btn btn-sm back-button"><i class="fa-regular fa-circle-left fa-l me-2" style="color: #161616;"></i>Torna agli annunci</a>
  </div>
   <div class="row">
    {{-- TITOLO PAGINA --}}
      <div class="col-12 d-flex flex-column  align-items-center">
            <h2 class="titolo">Modifica il tuo annuncio su 
                <span class="brand">BoolBnb</span>
            </h2>
            <div class="col-8 offset-2 d-flex my-3">
                <p>
                    Benvenuto alla pagina di modifica dei tuoi annunci. Qui puoi apportare modifiche e aggiornamenti alle 
                    informazioni e alle caratteristiche dei tuoi appartamenti. Ottimizza le descrizioni, caricate nuove foto e 
                    assicurati che i tuoi annunci siano sempre al massimo delle prestazioni per attirare più potenziali inquilini. 
                    Personalizza e gestisci in modo efficace le informazioni sui tuoi appartamenti per massimizzare il vostro successo nel settore immobiliare.                         
                </p>
            </div>
     </div>
       
       <div class="col-12">
           <form action="{{ route('admin.apartments.update', $apartment->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-12">
                    {{--1 SEZ. TITOLO/DESCRIZIONE --}}
                    <div class="row bg-beige my-4 mb-5">
                        <div class="col-8">
                            <div class="">
                                <label class="control-label mb-2 fw-bold me-3">Titolo</label>
                                <input type="text" id="title" name="title" class="form-control" value="{{old('title') ?? $apartment->title}}">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror 
                            </div>
                            <div class="">
                                <label class="control-label fw-bold mb-4">Descrizione</label>
                                <textarea class="form-control" name="description" id="" cols="30" rows="10">{{old('description') ?? $apartment->description }}</textarea>   
                            </div>
                        </div>
                        <div class="col-4">
                            <p>
                              Questa sezione ti permette di aggiornare il titolo e la descrizione del tuo annuncio.
                                Ricorda che il titolo dovrebbe essere accattivante e descrittivo per attirare l'attenzione degli utenti.            
                                Fornisci dettagli aggiuntivi sull'appartamento, come le caratteristiche uniche e le comodità offerte.
                                Una descrizione ben scritta può aumentare l'interesse degli utenti e le probabilità di affittare l'appartamento.
                                Assicurati di fare modifiche accurate e interessanti in queste sezioni per massimizzare l'efficacia del tuo annuncio.
                            </p>
                        </div>
                    </div>
                </div>
                {{-- 2SEZ. TIPOLOGIA --}}
                <div class="mb-5 my-5">
                    <div class="text-center">
                        <h2>Modifica la tipologia dell'appartamento</h2>
                        <p>
                            Personalizza l'esperienza per i tuoi ospiti scegliendo tra una varietà di servizi aggiuntivi per la tua struttura. Questo campo ti consente di adattare la tua offerta alle esigenze dei tuoi ospiti. Seleziona i servizi che ritieni possano arricchire il loro soggiorno e migliorare la loro esperienza. Rendi la tua struttura ancora più attraente e confortevole per i futuri ospiti.
                        </p>
                    </div>
                    <div class="rating d-flex flex-wrap justify-content-center">
                        <form class="rating-form">
                            @foreach($types as $type)
                            <div class="col-4 d-flex my-3 flex-column align-items-center">
                                <label for="type-id-{{$type->id}}" class="position-relative d-flex change-cursor justify-content-center align-items-center" style="width:75px; height:75px;" {{ $type->id == old('type_id', $apartment->type_id) }}>
                                    <input type="radio" name="type_id" style="width:65px; height:65px; appearance:none" class="radio-icons" value="{{$type->id}}" id="type-id-{{$type->id}}" 
                                    >
                                    <img src="{{$type->icons}}" style="width:50px; height:50px;" alt="" class="type-icons position-absolute" >
                                </label>
                                <span class="fw-bold">{{$type->name}}</span>
                            </div>
                            @endforeach
                            @error('type_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </form>
                    </div>
                </div>                  
                {{-- SEZ. 3 --}}
                    <div class="">
                         {{-- indirizzo --}}
                        <div class="form-group my-4 d-flex justify-content-around my-5">                       
                            <div class="d-flex justify-content-center m-5 p-5">
                                {{-- TIPOLOGIA APPARTAMENTO --}}
                                {{-- <div class="px-4">
                                    <label class="control-label fw-bold">Tipologia di alloggio</label>
                                    <select name="type_id" id="" class="form-control " style="width:12rem">
                                        @foreach($types as $type)
                                        <option value="{{$type->id}}" {{ $type->id == old('type_id', $apartment->type_id) ? 'selected' : ''}}> {{$type->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('type')
                                    <span class="text-danger d-block">{{ $message }}</span>
                                    @enderror 
                                </div> --}}   
                                {{-- NUMERO BAGNI --}}
                                <div class="px-4 ">
                                    <label class="control-label fw-bold ">Numero di bagni: </label>
                                    <input type="number" id="n_wc" name="n_wc" class="form-control" style="width:4.25rem" value="{{old('n_wc') ?? $apartment->n_wc}}">
                                    @error('n_wc')
                                        <span class="text-danger d-block">{{ $message }}</span>
                                    @enderror 
                                </div>
                                {{-- NUMERO STANZE --}}
                                <div class="px-4 ">
                                    <label class="control-label fw-bold ">Numero di stanze</label>
                                    <input type="number" id="n_rooms" name="n_rooms" class="form-control" style="width:4.25rem" value="{{old('n_rooms') ?? $apartment->n_rooms}}">
                                    @error('n_rooms')
                                        <span class="text-danger d-block">{{ $message }}</span>
                                    @enderror 
                                </div>
                                {{-- METRI QUADRI APPARTAMENTO --}}
                                <div class="px-4">
                                    <label class="control-label fw-bold " for="name">Metri quadri alloggio: </label>
                                    <input type="number" id="mq" name="mq" class="form-control" style="width:4.25rem" value="{{old('mq') ?? $apartment->mq}}">
                                        @error('mq')
                                        <span class="text-danger d-block">{{ $message }}</span>
                                    @enderror 
                                </div>
                                {{-- indirizzo --}}
                                <div class="d-flex flex-column">        
                                    <div class="px-4">
                                        <label class="control-label mb-2 fw-bold me-3">Indirizzo</label>
                                    <input type="ratio" id="address" name="address" class="form-control" value="{{old('address') ?? $apartment->address}}" >
                                    </div>
                                    @error('address')
                                    <span class="text-danger d-block">{{ $message }}</span>
                                    @enderror 
                                </div>                            
                           </div>
                        </div>
                    </div>                                                    
                   {{-- 4SEZ. IMG COPERTINA --}}
                   <div class="row bg-beige">
                        <div class="col-8 ">
                            <div class="d-flex flex-column">
                                <label class="control-label mb-2 fw-bold me-3">Immagine di copertina</label>
                                <p>
                                    L'immagine di copertina è la prima immagine che gli utenti vedranno quando visualizzeranno il tuo annuncio.
                                    Assicurati di selezionare un'immagine di alta qualità che mostri al meglio l'aspetto dell'appartamento.
                                    Carica un'immagine accattivante per catturare l'attenzione degli utenti e aumentare le probabilità di successo del tuo annuncio
                                </p>
                                <input type="file" name="cover" id="cover" value="{{ $apartment->cover }}">
                                @error('cover')
                                <span class="text-danger d-block">{{ $message }}</span>
                            @enderror 
                            </div>
                        </div>
                        <div class="col-4">
                            @if ($apartment->cover)
                                <div class="d-flex flex-column text-center align-items-center">
                                    <label class="control-label mb-2 fw-bold me-3">Immagine precedente</label>
                                    <img src="{{ asset('storage/' . $apartment->cover) }}" alt="Immagine precedente" style="width: 18rem;">
                                </div>
                            @endif
                        </div>
                    </div>  
                   </div>
                 {{--5SEZ. SERVIZI AGGIUNTIVI --}}
                    <div class="col">
                        <div>
                            <div class="text-center my-4">
                                <label class="control-label mb-2 fw-bold my-3">Servizi aggiuntivi</label>
                                <p>
                                    Personalizza l'esperienza per i tuoi ospiti scegliendo tra una varietà di servizi aggiuntivi per la tua struttura. Questo campo ti consente di adattare la tua offerta alle esigenze dei tuoi ospiti. Seleziona i servizi che ritieni possano arricchire il loro soggiorno e migliorare la loro esperienza. Rendi la tua struttura ancora più attraente e confortevole per i futuri ospiti.      
                                </p>
                            </div>                
                            <div class="d-flex align-items-center ">
                                @foreach($services as $service)
                                    <input class="form-check-input m-1" type="checkbox" role="switch" name="name[]" value='{{ $service->id }}' {{$errors->any() ? (in_array($service->id, old('services', [])) ? 'checked' : '') : ($apartment->services->contains($service) ? 'checked' : '') }} id="flexSwitchCheckDefault" >
                                    <label class="form-check-label " for="flexSwitchCheckDefault">{{$service->name}}</label>
                                @endforeach
                                @error('services')
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
                                <label class="control-label mb-2 fw-bold me-3">Prezzo</label>
                                <input type="text" id="price" name="price" class="form-control" value="{{old('price') ?? $apartment->price}}" >
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
                    <button class="btn btn-success" type="submit">Submit</button>
                </div>        
           </form>
        </div>
   </div>
</div>
 {{-- <input type="hidden" name="user_id" id="user_id" class="form-control"  value="{{ $user->id }}">  --}}
@endsection

<style lang="scss">

</style>
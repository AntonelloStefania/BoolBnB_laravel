@extends('layouts.admin')

@section('content')

<div class="container">
   <div class="my-4 d-flex justify-content-start">
      <a href="{{route('admin.apartments.index')}}" class="btn btn-sm back-button"><i class="fa-regular fa-circle-left fa-l me-2" style="color: #161616;"></i>Torna agli annunci</a>
  </div>
   <div class="row">
      <div class="col my-4 text-center">
         <h2 class="">Aggiungi un nuovo annuncio</h2>
     </div>
      
       <div class="col-12">
            <h2>Caratteristiche alloggio</h2>
           <form action="{{ route('admin.apartments.update', $apartment->id) }}" method="POST" enctype="multipart/form-data">
             @csrf
             @method('PUT')
            <div class="col-12">
                <input type="hidden" name="user_id" id="user_id" class="form-control"  value="{{ $user->id }}"> 
                <div class="form-group "> 
                    {{-- TITOLO ANNUNCIO --}}
                    <div class="form-group my-4 d-flex justify-content-around my-5">
                        <div class="">
                            <label class="control-label mb-2 fw-bold me-3">titolo</label>
                            <input type="text" id="title" name="title" class="form-control" value="{{old('title') ?? $apartment->title}}">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror 
                        </div>
                    </div>
                    {{-- TIPOLOGIA APPARTAMENTO --}}
                    <div class="">
                        <label class="control-label fw-bold">Tipologia di alloggio</label>
                        <select name="type_id" id="" class="form-control " style="width:12rem">
                            @foreach($types as $type)
                             <option value="{{$type->id}}" {{ $type->id == old('type_id', $apartment->type_id) ? 'selected' : ''}}> {{$type->name}}</option>
                             @endforeach
                        </select>
                    </div>
                    {{-- METRI QUADRI APPARTAMENTO --}}
                    <div class=" ">
                      <label class="control-label fw-bold " for="name">Metri quadri alloggio: </label>
                      <input type="number" id="mq" name="mq" class="form-control" style="width:4.25rem" value="{{old('mq') ?? $apartment->mq}}">
                    </div>
                    {{-- NUMERO BAGNI --}}
                    <div class=" ">
                        <label class="control-label fw-bold ">Numero di bagni: </label>
                        <input type="number" id="n_wc" name="n_wc" class="form-control" style="width:4.25rem" value="{{old('n_wc') ?? $apartment->n_wc}}">
                    </div>
                    {{-- NUMERO STANZE --}}
                    <div class=" ">
                        <label class="control-label fw-bold ">Numero di stanze</label>
                        <input type="number" id="n_rooms" name="n_rooms" class="form-control" style="width:4.25rem" value="{{old('n_rooms') ?? $apartment->n_rooms}}">
                    </div>
                </div>  
            </div>
            <div class="col-12">
                <label class="control-label fw-bold ">Descrizione</label>
                <textarea class="col-8 col-md-6 offset-md-3 p-3 offset-2 " name="description" id="" cols="30" rows="10">{{old('description') ?? $apartment->description }}</textarea>
            </div>
           <div class="d-flex align-items-center">
            <label class="control-label mb-2 fw-bold me-3">Servizi aggiuntivi</label>
                @foreach($services as $service)
                    <input class="form-check-input" type="checkbox" role="switch" name="name[]" value='{{ $service->id }}' {{$errors->any() ? (in_array($service->id, old('services', [])) ? 'checked' : '') : ($apartment->services->contains($service) ? 'checked' : '') }} id="flexSwitchCheckDefault" >
                    <label class="form-check-label" for="flexSwitchCheckDefault">{{$service->name}}</label>
                @endforeach
            </div>
           <div class="form-group my-4 d-flex justify-content-around my-5">
            <div class="d-flex align-items-center">
                <label class="control-label mb-2 fw-bold me-3">Sponsor</label>
                <select name="sponsor_id" id="">
                    @foreach($sponsors as $sponsor)
                     <option value="{{$sponsor->id}}" {{ $sponsor->id == old('sponsor_id', $apartment->sponsor_id) ? 'selected' : ''}}>{{$sponsor->name}} - {{$sponsor->time}}</option>
                     @endforeach
                </select>
            </div>
            <div class="d-flex align-items-center">
                <label class="control-label mb-2 fw-bold me-3">Photos</label>
                <input type="file" name="cover" id="cover">
            </div>
            <button class="btn btn-success" type="submit">Submit</button>
        </div>
        
        
        
    </form>
        
          
      </div>
   </div>
</div>

@endsection

<script lang="scss">

</script>
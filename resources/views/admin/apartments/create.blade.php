@extends('layouts.admin')

@section('content')

<div class="container">
   <div class="my-4 d-flex justify-content-start">
      <a href="{{route('admin.dashboard')}}" class="btn btn-sm back-button"><i class="fa-regular fa-circle-left fa-l me-2" style="color: #ad4e1a;"></i>Dashboard</a>
  </div>
   <div class="row">
      <div class="col my-4 text-center">
         <h2 class="">Add <span style="color: #1f615f">Pet</span><i class="fas fa-paw ms-2 " style="color: #1f615f"></i> Record</h2>
     </div>
      
       <div class="col-12">
          <form action="{{ route('admin.apartments.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- id del proprietario --}}
            <input type="hidden" name="user_id" id="user_id" class="form-control"  value="{{ $user->id }}"> 
            <div class="form-group my-4 d-flex justify-content-around my-5">
                <div class="d-flex align-items-center">
                    <label class="control-label mb-2 fw-bold me-3">titolo</label>
                    <input type="text" id="title" name="title" class="form-control">
                </div>
            </div> 
            <div class="form-group my-4 d-flex justify-content-around my-5">
                <div class="d-flex align-items-center">
                    <label class="control-label mb-2 fw-bold me-3">Prezzo</label>
                    <input type="text" id="price" name="price" class="form-control">
                </div>
            </div>
            <div class="form-group my-4 d-flex justify-content-around my-5">
                <div class="d-flex align-items-center">
                    <label class="control-label mb-2 fw-bold me-3">visibilità</label>
                   <span class="me-2">visibile</span> <input type="radio" id="visibility" name="visibility" value="1" class="me-3">
                   <span class="me-2">invisibile</span> <input type="radio" id="visibility" name="visibility" value="0" class="me-3">
                </div>
            </div>   
            <div class="form-group my-4 d-flex justify-content-around my-5">
                <div class="d-flex align-items-center">
                    <label class="control-label mb-2 fw-bold me-3">Indirizzo</label>
                    <input type="ratio" id="address" name="address" class="form-control">
                </div>
            </div>   
           
                {{-- TIPOLOGIA APPARTAMENTO --}}
                <div class="">
                    <label class="control-label fw-bold">Tipologia di alloggio</label>
                    <select name="type_id" id="" class="form-control " style="width:12rem">
                        @foreach($types as $type)
                         <option value="{{$type->id}}">{{$type->name}}</option>
                         @endforeach
                    </select>
                </div>
             
              
                    {{-- METRI QUADRI APPARTAMENTO --}}
                    <div class=" ">
                        <label class="control-label fw-bold " for="name">Metri quadri alloggio: </label>
                        <input type="number" id="mq" name="mq" class="form-control" style="width:4.25rem">
                      </div>
                      {{-- NUMERO BAGNI --}}
                      <div class=" ">
                          <label class="control-label fw-bold ">Numero di bagni: </label>
                          <input type="number" id="n_wc" name="n_wc" class="form-control" style="width:4.25rem">
                      </div>
                      {{-- NUMERO STANZE --}}
                      <div class=" ">
                          <label class="control-label fw-bold ">Numero di stanze</label>
                          <input type="number" id="n_rooms" name="n_rooms" class="form-control" style="width:4.25rem">
                      </div>
           <div class="d-flex align-items-center">
                <label class="control-label mb-2 fw-bold me-3">Servizi aggiuntivi</label>
                @foreach($services as $service)
                    <input class="form-check-input" type="checkbox" role="switch" name="name[]" value="{{$service->id}}" id="flexSwitchCheckDefault">
                    <label class="form-check-label" for="flexSwitchCheckDefault">{{$service->name}}</label>
                @endforeach
            </div>
           <div class="form-group my-4 d-flex justify-content-around my-5">
            <div class="d-flex align-items-center">
                <label class="control-label mb-2 fw-bold me-3">Sponsor</label>
                <select name="sponsor_id" id="">
                    @foreach($sponsors as $sponsor)
                     <option value="{{$sponsor->id}}">{{$sponsor->name}} - {{$sponsor->time}}</option>
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

{{-- SCRIPT --}}
<script>
   // Funzione per applicare l'autocapitalizzazione delle parole a un input
   function applyAutoCapitalize(inputId) {
       var inputElement = document.getElementById(inputId);

       inputElement.addEventListener('input', function() {
           var inputValue = inputElement.value;
           var formattedValue = inputValue.replace(/\b\w/g, function(match) {
               return match.toUpperCase();
           });
           inputElement.value = formattedValue;
       });
   }

   // Applica l'autocapitalizzazione agli input desiderati
   applyAutoCapitalize('name');
   applyAutoCapitalize('specie');
   applyAutoCapitalize('owner');
   applyAutoCapitalize('notes');
</script>
@endsection


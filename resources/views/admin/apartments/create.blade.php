@extends('layouts.admin')

@section('content')

<div class="container-fluid">
   <div class="my-4 d-flex justify-content-start">
      <a href="{{route('admin.dashboard')}}" class="btn btn-sm back-button"><i class="fa-regular fa-circle-left fa-l me-2" style="color: #ad4e1a;"></i>Dashboard</a>
  </div>
   <div class="row flex-column ">
        <div class="col my-4 text-center">
            <h2 class="">Add <span style="color: #1f615f">Pet</span><i class="fas fa-paw ms-2 " style="color: #1f615f"></i> Record</h2>
        </div>
       <div class="col-12 bg-dark text-white  position-relative">
          <form action="{{ route('admin.apartments.store') }}" class="bg-dark"  style="min-height: 500px; max-height:750px;" method="POST" enctype="multipart/form-data" >
            @csrf
         
            <div id="carouselExampleIndicators" class="carousel slide  " data-bs-ride="false">
                <div class="position-absolute bottom-0 col-12">

                    <div class="carousel-indicators ">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
                    </div>
                </div>
                <div class="carousel-inner">
                    {{-- prima sezione --}}
                    <div class="carousel-item active"  style="min-height: 500px; max-height:750px;">
                        <input type="hidden" name="user_id" id="user_id" class="form-control"  value="{{ $user->id }}"> 
                        <div class="form-group my-4 d-flex justify-content-around my-5">
                            <div class="">
                                <label class="control-label mb-2 fw-bold me-3">titolo</label>
                                <input type="text" id="title" name="title" class="form-control" required>
                            </div>
                        </div> 
                        <div class="form-group my-4 d-flex justify-content-around my-5">
                            <div class="d-flex align-items-center">
                                <label class="control-label mb-2 fw-bold me-3">Prezzo</label>
                                <input type="text" id="price" name="price" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group my-4 d-flex justify-content-around my-5">
                            <div class="d-flex align-items-center">
                                <label class="control-label mb-2 fw-bold me-3">visibilità</label>
                            <span class="me-2">visibile</span> <input type="radio" id="visibility" name="visibility" value="1" class="me-3">
                            <span class="me-2">invisibile</span> <input type="radio" id="visibility" name="visibility" value="0" class="me-3" >
                            </div>
                        </div>   
                        <div class="form-group my-4 d-flex justify-content-around my-5">
                            <div class="d-flex align-items-center">
                                <label class="control-label mb-2 fw-bold me-3">Indirizzo</label>
                                <input type="ratio" id="address" name="address" class="form-control" required>
                            </div>
                        </div>
                    </div>
                   
                    {{-- seconda sezione --}}
                    <div class="col-12">

                        <div class="carousel-item "  style="min-height: 500px; max-height:750px;">
                            <div class="d-flex align-items-center w-100 flex-column">
                                {{-- PROVA CHECKBOX-2 --}}
                                <div class="card col-8">
                                    <div class="rating-container">
                                      <div class="rating-text text-center">
                                        <p>TIPOLOGIA ALLOGGI</p>
                                      </div>
                                        <div class="rating d-flex flex-wrap justify-content-center">
                                            <form class="rating-form">
                                                @foreach($types as $type)
                                                <div class="col-3 m-2">
                                                    <label for="{{$type->id}}" class="position-relative d-flex" style="width:50px; height:50px;">
                                                        <input type="radio"  name="type_id"  style="width:45px; height:45px; appearance:none" class="radio-icons" value="{{$type->id}}"  id="{{$type->id}}" required />
                                                        <img src="{{$type->icons}}"  style="width:50px; height:50px;" alt="" class=" type-icons position-absolute" >
                                                    </label>
                                                </div>
                                                @endforeach
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- FINE PROVA CHECKBOX-2 --}}
                                
                            </div>
                        </div>
                    </div>
                    {{-- terza sezione --}}
                    <div  class="col-12">

                        <div class="carousel-item " style="min-height: 500px; max-height:750px;">
                            <div class="d-flex justify-content-center">

                                {{-- METRI QUADRI APPARTAMENTO --}}
                            <div class=" ">
                                <label class="control-label fw-bold " for="name">Metri quadri alloggio: </label>
                                <input type="number" id="mq" name="mq" class="form-control" style="width:4.25rem" required>
                            </div>
                            {{-- NUMERO BAGNI --}}
                            <div class=" ">
                                <label class="control-label fw-bold ">Numero di bagni: </label>
                                <input type="number" id="n_wc" name="n_wc" class="form-control" style="width:4.25rem" required>
                            </div>
                            {{-- NUMERO STANZE --}}
                            <div class=" ">
                                <label class="control-label fw-bold ">Numero di stanze</label>
                                <input type="number" id="n_rooms" name="n_rooms" class="form-control" style="width:4.25rem" required>
                            </div>
                        </div>
                            </div>
                    </div>
                 {{-- quarta sezione --}}                   
                    <div class="col-12">

                        <div class="carousel-item "  style="min-height: 500px; max-height:750px;">
                           <div class="d-flex flex-column align-items-center col-12 ">
                               <div class="d-flex flex-wrap justify-content-center">
                                    <div class="col-4">

                                        <label class="control-label  mb-2 fw-bold me-3">Servizi aggiuntivi</label>
                                        @foreach($services as $service)
                                            <input class="form-check-input" type="checkbox" role="switch" name="name[]" value="{{$service->id}}" id="flexSwitchCheckDefault" >
                                            <label class="form-check-label" for="flexSwitchCheckDefault">{{$service->name}}</label>
                                        @endforeach
                                    </div>
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
                               <div class="">
                                   <label class="control-label mb-2 fw-bold me-3">Photos</label>
                                   <input type="file" name="cover" id="cover" required>
                               </div>
                           </div>
    
                            
                            
                        </div>
                    </div>

                    {{-- QUARTA SEZIONE --}}
                    <div class="carousel-item col-12 text-center "  style="min-height: 500px; max-height:750px;">
                        <div class="col-12 justify-content-center">

                            <button class="btn btn-success" type="submit">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        
        </form>
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

  
</script>

@endsection


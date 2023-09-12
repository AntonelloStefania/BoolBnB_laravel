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
            <input type="hidden" name="owner_id" id="owner_id" class="form-control"  value="{{ $user->id }}"> 
          
             
              <div class="form-group d-flex justify-content-around"> 
                <div class="d-flex me-3">
                    <label class="control-label fw-bold mb-2 me-2" for="name">Mq: </label>
                    <input type="number" id="mq" name="mq" class="form-control">
                </div>
                <div class="d-flex me-3">
                    <label class="control-label mb-2 fw-bold me-2">n° bagni: </label>
                    <input type="number" id="n_wc" name="n_wc" class="form-control">
                </div>

           </div>
           <div class="form-group my-4 d-flex justify-content-around my-5">
               <div class="d-flex align-items-center">
                   <label class="control-label mb-2 fw-bold me-3">n° stanze</label>
                   <input type="number" id="n_rooms" name="n_rooms" class="form-control">
               </div>
           </div>  
           <div class="form-group my-4 d-flex justify-content-around my-5">
                <div class="d-flex align-items-center">
                    <label class="control-label mb-2 fw-bold me-3">Type</label>
                    <select name="type_id" id="">
                        @foreach($types as $type)
                         <option value="{{$type->id}}">{{$type->type}}</option>
                         @endforeach
                    </select>
                </div>
           </div>
           <div class="form-group my-4 d-flex justify-content-around my-5">
            <div class="d-flex align-items-center">
                <label class="control-label mb-2 fw-bold me-3">Sponsor</label>
                <select name="sponsor_id" id="">
                    @foreach($sponsors as $sponsor)
                     <option value="{{$sponsor->id}}">{{$sponsor->sponsor_type}} - {{$sponsor->sponsor_time}}</option>
                     @endforeach
                </select>
            </div>
            <div class="d-flex align-items-center">
                <label class="control-label mb-2 fw-bold me-3">Photos</label>
                <input type="file" name="photo" id="photo">
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


{{-- @extends('layouts.admin')

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
          <form action="{{ route('admin.apartments.photos.update',['apartment' => $id, 'photo' => $id_2]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            {{-- id del proprietario --}}
             {{-- <input type="hidden" name="apartment_id"  class="form-control"  value="{{ $apartment->id }}">   --}}
          
             
            {{-- <div class="d-flex align-items-center">
                <label class="control-label mb-2 fw-bold me-3">Cambia la fotoooooooo</label>
                <input type="file" name="url" id="url">
            </div>
            <button class="btn btn-success" type="submit">Submit</button>
        </div>
        
        
        
    </form>
        
          
      </div>
   </div>
</div>


@endsection --}}



<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content bg-beige p-3">
         <div class="col-12 text-center my-3">
            <h2 class="mb-4"><span class="brand">Rinnova</span> l'Aspetto del Tuo Alloggio con una <span class="brand">Foto</span> Aggiornata!</h2>
         </div>
         <div class="col-12 d-flex justify-content-center">
            <img id="imagePreview" src="{{ asset('storage/' . $photo->url) }}" alt="Anteprima dell'immagine" class="my-4" style="max-width: 80%; border-radius:1.35rem">
         </div>
         <div class="col-12 text-center">
            <form action="{{ route('admin.apartments.photos.update',[$apartment->id, $photo->id]) }}" method="POST" enctype="multipart/form-data">
               @csrf
               @method('PUT')
               {{-- id del proprietario --}}
                {{-- <input type="hidden" name="apartment_id"  class="form-control"  value="{{ $apartment->id }}">   --}}
            
                {{-- PROVA DROP-CONTAINER --}}
                  <h3>Sostituisci Questa <span class="brand mb-3">Foto</span></h3>
                  <label for="images" class="drop-container h-100" id="dropcontainer">
                     
                  <span class="drop-title">Sposta qui le immagini</span>
                  oppure
                  <input class="col-8 blue-btn" type="file" name="url" id="photo" >
                     
                  </label>
                   
                   {{-- FINE DROP-CONTAINER --}}
               <button class="btn blue-btn my-4" type="submit">Conferma</button>
            </form>
         </div>
     </div>  
   </div>
</div>



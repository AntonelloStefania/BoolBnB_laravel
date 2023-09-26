

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content bg-beige p-3">
         <div class="col-12 text-center my-3">
            <h2 class="mb-4">Rendi il tuo annuncio su <span class="brand">BoolBnB</span> ancora più attraente con delle foto straordinarie!</h2>
            <p>
               Un'immagine vale più di mille parole, e aggiungere foto al tuo annuncio su <span class="brand">BoolBnB</span> può fare la differenza. Gli ospiti amano vedere cosa li aspetta e le foto sono il modo migliore per mostrare la bellezza e le caratteristiche uniche del tuo alloggio.
            </p>
         </div>
         <div class="col-12 text-center">

            <form action="{{ route('admin.apartments.photos.store', $apartment->id) }}" method="POST" enctype="multipart/form-data">
               @csrf
            
                {{-- PROVA DROP-CONTAINER --}}
                  <h3>Aggiunti <span class="brand mb-3">Foto</span></h3>
                  <label for="images" class="drop-container h-100" id="dropcontainer">
                     
                  <span class="drop-title">Sposta qui le immagini</span>
                  oppure
                  <input type="file" name="url[]" id="photo" multiple>
                     
                  </label>
                   
                   {{-- FINE DROP-CONTAINER --}}
               <button class="btn blue-btn my-4" type="submit">Conferma</button>
            </form>
         </div>
     </div>  
   </div>
</div>



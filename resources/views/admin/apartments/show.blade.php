@extends('layouts.admin')

@section('content')
    <section class="">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center my-3">
                        <div>
                            @auth
                            <a href="{{ route('admin.apartments.index') }} " class="btn btn-sm blue-btn">I tuoi gli appartamenti</a>
                            @endauth
                        </div>
                    </div>
                </div>
                <div class="col-8 offset-2 text-center mb-5">
                    <h2 class="my-3"><span class="brand">Visualizza</span> il Tuo Annuncio</h2>
                    <p class="text-center">Controlla il tuo annuncio su <span class="brand">BoolBnB</span> per assicurarti che sia completo e soddisfi tutte le tue esigenze. Qui puoi vedere ogni dettaglio e foto che hai aggiunto. Se hai dimenticato qualcosa o desideri apportare modifiche, è il momento giusto per farlo. Un annuncio accurato e completo attira più ospiti, quindi assicurati che il tuo annuncio su <span class="brand">BoolBnB</span> sia perfetto</p>
                </div>
                <div class="container-fluid bg-beige py-3 ">
                    <div class="container">
                        <div class="col-12 text-center mt-2 mb-4">
                            <h2>
                                {{$apartment->title}}
                            </h2>
                        </div>
                        <div class="col-12 d-flex flex-column flex-md-row ">
                            <div class="col-12  col-md-4 d-flex align-items-center order-2 order-md-1 mx-md-3 mb-3">
                                <img src=" {{ asset('storage/'.$apartment->cover) }}" style="border-radius:2rem;" width="100%" height="500px">
                            </div>
                            <div class="col-12 m-0 col-md-8  text-center order-1 order-md-2  justify-content-center mb-3" >
                                <div class="container gal-container ">
                                    <div class="gal-item d-flex flex-wrap justify-content-center">
                                        @foreach($photos as $photo)
                                        @if($photo->apartment_id === $apartment->id)
                                        <div class="box col-5 m-2 img-container ">
                                            <img src=" {{ asset('storage/'.$photo->url) }} " class="col-6" style="border-radius:1.25rem" >
                                        
                                            <div class="btns">
                                                <a href="{{route('admin.apartments.photos.edit', [$apartment->id, $photo->id])}}" class="blue-btn"><i class="fas fa-pencil" style="color: #d4e1f8;"></i></a>
                                                <form action="{{route('admin.apartments.photos.destroy', [$apartment->id, $photo->id])}}" onsubmit="return confirm('Press ok to confirm')" class="d-block" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="beige-btn btn" type="submit"><i class="fas fa-trash" style="color: #3f3f41;"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 text-center mt-2 ">
                
                        <span>Vuoi rendere il tuo annuncio ancora più <span class="brand">irresistibile?</span> Aggiungi alcune <span class="brand">foto</span> per mostrare tutti i dettagli che rendono il tuo alloggio speciale<a href="{{route('admin.apartments.photos.create', $apartment->id)}}" class="btn blue-btn btn-sm ms-3"><i class="fas fa-plus "></i></a></span>
                    </div>    
                </div>
                
            </div>
        </div>
    </section>
@endsection

<style lang="scss">
.img-container{
    position: relative;
    aspect-ratio: 16/9;
}
.img-container:hover{
    .btns{
        visibility: visible;
    }
}
.btns{
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    display: flex;
    justify-content: space-around;
    visibility: hidden;
    background-color: rgba(0, 0, 0, 0.5);
}
.blue-btn, form{
    align-self: center;
    margin: 0;
}
.btn{
    padding: 0;
    margin: 0;
}

.gal-item .box{
	height: 250px;
    
	overflow: hidden;
}
.box img{
	height: 100%;
	width: 100%;
	object-fit:cover;
	-o-object-fit:cover;
}

.gal-container{
    height: 600px;
    overflow:auto;
    scrollbar-width: none; /* Nasconde la scrollbar standard in Firefox */
    -webkit-scrollbar-width: none; 
}

.gal-container::-webkit-scrollbar {
    display: none; /* Nasconde la scrollbar in Webkit */
}
</style>

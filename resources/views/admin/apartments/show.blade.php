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
                        <div class="col-12 d-flex flex-column flex-md-row ">
                            <div class="col-12  col-md-6 d-flex order-2 order-md-1 justify-content-center mb-3">
                                <img src=" {{ asset('storage/'.$apartment->cover) }}" style="border-radius:2rem;" width="300px" height="500px">
                            </div>
                            <div class="col-12 m-0  text-center order-1 order-md-2  col-md-6  justify-content-center mb-3" >
                               <h3> {{$apartment->title}}</h3>
                               <p class="mt-3">{{$apartment->description}}</p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row p">
                    <div class="col-12 d-flex mb-3">
                        @foreach($photos as $photo)
                            @if($photo->apartment_id === $apartment->id)
                        
                                <div class="img-container mx-1 ">
                                        <img src=" {{ asset('storage/'.$photo->url) }} " width="180px" style="object-fit: cover" height="100px">
                                    
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
                   
                    <span><a href="{{route('admin.apartments.photos.create', $apartment->id)}}" class="btn btn-primary btn-sm">Aggiungi foto</a></span>
                </div>    
                
            </div>
        </div>
    </section>
@endsection

<style lang="scss">
.img-container{
    position: relative;
    aspect-ratio: 16/9;
    height: 100px;
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
</style>

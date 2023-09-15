@extends('layouts.admin')

@section('content')
    <div class="container">
        <a href="http://localhost:5174/" class="btn btn-success">VITE</a>
        <div class="row mb-5">
            <div class="col-12 text-center ">
                <h2>Gestisci i Tuoi Annunci</h2>
            </div>
            <div class="col-12 text-center">
                <p>
                    Benvenuto nella pagina di gestione dei tuoi annunci su <span class="brand">BoolBnB</span>. Qui puoi avere il controllo completo su tutti gli annunci che hai creato sulla nostra piattaforma. Sia che tu stia cercando di apportare modifiche, aggiornamenti o rimuovere un annuncio, sei nel posto giusto.
                </p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-8">
                @foreach($apartments as $apartment)
                <div class="card float-right">
                    <div class="row">
                        <div class="col-sm-5 ">
                            <img class="d-block w-100 card-img" height="350px" src="{{ asset('storage/'.$apartment->cover) }}" alt="">
                        </div>
                      <div class="col-sm-7">
                            <div class="card-block">
                                <div class="card-title">
                                    <h3 class="brand">{{$apartment->title}}</h3>
                                </div>
                                <div>
                                    <span class="fw-bold me-2"><i class="fa-solid fa-location-dot me-2 "></i>Località: </span><span>{{$apartment->address}}</span>
                                </div>
                                <div>
                                    <span>Tipologia di alloggio: </span><img src="{{$apartment->type->icons}}" width="17rem" class="me-2" alt=""><span>{{$apartment->type->name}}</span>
                                </div>
                                <div class="">
                                    <p><span>Pubblicato il: </span>{{$apartment->created_at}}</p>
                                    <p>Change around the content for awsomenes</p>
                                </div>
                                <div>
                                    <a href="#" class="btn btn-primary btn-sm float-right">Read More</a>
                                </div>
                            </div>
                      </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        
        
    </div>
@endsection

<style lang="scss">

    body {
    background-color:  #eee;
    }

    .card-img{
        border-radius:3rem !important;
        margin:1rem;
        box-shadow: 2px 2px 8px 0px;
    }

    .card-block {
        font-size: 1em;
        position: relative;
        margin: 0;
        padding: 1em;
        border: none;
      
        box-shadow: none;
        
    }
    .card {
        font-size: 1em;
        overflow: hidden;
        padding: 5;
        border: none !important;
        border-radius: .755rem !important;
        
        margin-top:20px;
        height: 300px;
    }



</style>







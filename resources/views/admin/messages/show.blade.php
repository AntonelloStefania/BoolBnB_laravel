@extends('layouts.admin')

@section('content')
<div class="container-fluid navbar-container">
    <div class="row justify-content-between w-100">
        <div class="d-flex col-6 justify-content-center">
            <div class="col-6  py-3 d-flex  justify-content-center">
                <a href="{{route('admin.apartments.index')}}"  class=" d-flex align-items-center " style="text-decoration:none; color:#3a537e;">
                    <div class="col-auto">
                        <i class="fa-regular fa-circle-left me-2" style="color: #3a537e;"></i> 
                    </div>
                    <div class="col">
                        <span>I tuoi Annunci</span>  
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Messaggi per {{ $apartment->title }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
        <ul>
            @foreach ($apartment->messages as $message)
            <li class="list-unstyled my-4">
                    <strong>Mittente:</strong> {{ $message->name }} {{ $message->surname }}
                    <br> 
                    <strong>Email:</strong> {{ $message->email }}
                    <br>
                    <strong>Messaggio:</strong> {{ $message->message }}
            </li>
            @endforeach
        </ul>
        </div>
    </div>
</div>

@endsection
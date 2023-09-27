@extends('layouts.admin')

@section('content')
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
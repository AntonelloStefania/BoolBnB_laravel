@extends('layouts.admin')

@section('content')
    <div class="container">
        
        <div class="row justify-content-center">
            <div class="col-8">
            
                <table class="table table-hover">
                    <thead>
                        <tr>
                            
                            <th scope="col">Copertina</th>
                            <th scope="col">Titolo Annuncio</th>
                            <th scope="col">Indirizzo</th>
                            <th scope="col">Prezzo pernottamento</th>
                            <th scope="col">Modifica</th>
                            <th scope="col">Mostra altro</th>
                            <th scope="col">Elimina</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($apartments as $apartment)
                        <tr class="text-center">
                            
                            <td><img src="{{ asset('storage/'.$apartment->cover) }} " alt="" width="60px"></td>
                            <td>{{$apartment->title}}</td>
                            <td>{{$apartment->address}}</td>
                            <td>{{$apartment->price}}€</td>
                            <td><a href="{{route('admin.apartments.edit', $apartment->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-pencil"></i></a></td>
                            <td><a href="{{route('admin.apartments.show', $apartment->id)}}" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a></td>
                            <td>
                                <form class="d-inline-block" action=" {{route('admin.apartments.destroy', $apartment->id)}} " onsubmit="return confirm('Sei sicuro di voler cancellare questo post?')" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form> 
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
@endsection







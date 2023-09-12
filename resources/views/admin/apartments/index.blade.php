@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            @foreach($apartments as $apartment)
            <div class="card">
                <span>{{$apartment->mq}} metri quadri</span>
                <span><a href="{{route('admin.apartments.edit', $apartment->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-pencil"></i></a></span>
                <span><a href="{{route('admin.apartments.show', $apartment->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-eye"></i></a></span>
                <form class="d-inline-block" action=" {{route('admin.apartments.destroy', $apartment->id)}} " onsubmit="return confirm('Sei sicuro di voler cancellare questo post?')" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </form>
            </div>  
            @endforeach
        </div>
    </div>
</div>
@endsection
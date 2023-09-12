@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            @foreach($apartments as $apartment)
            <div class="card">
                <span>{{$apartment->mq}}</span>
                <span><a href="{{route('admin.apartments.edit', $apartment->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-pencil"></i></a></span>
                <span><a href="{{route('admin.apartments.show', $apartment->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-eye"></i></a></span>
            </div>  
            @endforeach
        </div>
    </div>
</div>
@endsection
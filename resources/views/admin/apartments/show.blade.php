@extends('layouts.admin')

@section('content')
    <section class="bg-white">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center my-3">
                        <div>
                            <span> {{ $apartment->mq }} </span>
                            <span> {{ $apartment->start }} </span>
                            <span> {{ $apartment->end }} </span>

                        </div>
                        <div>
                            @auth
                            <a href="{{ route('admin.apartments.index') }} " class="btn btn-sm btn-primary">Tutti gli appartamenti</a>
                            @endauth
                            @guest
                            <a href="{{ route('apartments.index') }} " class="btn btn-sm btn-primary">Tutti gli appartamenti</a>
                            @endguest
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <img src=" {{ asset('storage/'.$apartment->cover) }} ">
                    @foreach($photos as $photo)
                        @if($photo->apartment_id === $apartment->id)
                        @auth
                            <a href="{{route('admin.apartments.photos.edit', ['apartment' => $apartment->id, 'photo' => $photo->id])}}">
                                <img src=" {{ asset('storage/'.$photo->url) }} ">
                            </a>
                        @endauth
                        @guest
                        <img src=" {{ asset('storage/'.$photo->url) }} ">
                        @endguest
                        @endif
                    @endforeach
                    @auth
                    <span><a href="{{route('admin.apartments.photos.create', $apartment->id)}}" class="btn btn-primary btn-sm">Aggiungi foto</a></span>
                    @endauth
                </div>
            </div>
        </div>
    </section>
@endsection

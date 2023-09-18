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
                            <div class="img-container">
                                <img src=" {{ asset('storage/'.$photo->url) }} " max-width="100px" height="100px">
                                <div>
                                    <div class="my-4 col-md-4 col-lg-12">
                                        <a href="{{route('admin.apartments.photos.edit', [$apartment->id, $photo->id])}}" class="blue-btn"><i class="fas fa-pencil me-0 me-lg-2" style="color: #d4e1f8;"></i></a>
                                    </div>
                                    <form action="{{route('admin.apartments.photos.destroy', [$apartment->id, $photo->id])}}" onsubmit="return confirm('Press ok to confirm')" class="d-block" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="beige-btn btn" type="submit"><i class="fas fa-trash me-0 me-lg-2" style="color: #3f3f41;"></i></button>
                                    </form>
                                </div>
                            </div>
                        @endauth
                        @guest
                        <img src=" {{ asset('storage/'.$photo->url) }} " max-width="100px" height="100px">
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

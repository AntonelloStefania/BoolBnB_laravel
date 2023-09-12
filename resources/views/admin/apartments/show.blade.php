@extends('layouts.admin')

@section('content')
    <section class="bg-white">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center my-3">
                        <div>
                            <h1> {{ $apartment->mq }} </h1>
                        </div>
                        <div>
                            <a href="{{ route('admin.apartments.index') }} " class="btn btn-sm btn-primary">Tutti gli appartamenti</a>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <img src=" {{ asset('storage/'.$apartment->photo) }} ">
                </div>
            </div>
        </div>
    </section>
@endsection
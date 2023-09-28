@extends('layouts.admin')

@section('content')
    <div class="container-fluid bg-beige h-100vh">
        <div class="row h-100">
            <div class="col-12 d-flex justify-content-center h-100">
                <div class="content text-center mt-5">
                    <h3>
                        {{request('message')}}
                    </h3>
                    <a class="btn btn-success my-5"  href="{{  route('admin.apartments.index')  }}">
                        Torna ai miei annunci
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
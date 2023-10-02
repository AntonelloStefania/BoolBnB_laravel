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
    <div class="container-fluid bg-beige h-100vh">
        <div class="row h-100">
            <div class="col-12 d-flex justify-content-center h-100">
                <div class="content text-center mt-5">
                    <h3>
                        {{request('message')}}
                    </h3>
                   
                </div>
            </div>
        </div>
    </div>
@endsection
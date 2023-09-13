@extends('layouts.admin')

@section('content')

<div class="container">
   <div class="my-4 d-flex justify-content-start">
      <a href="{{route('admin.dashboard')}}" class="btn btn-sm back-button"><i class="fa-regular fa-circle-left fa-l me-2" style="color: #ad4e1a;"></i>Dashboard</a>
  </div>
   <div class="row">
      <div class="col my-4 text-center">
         <h2 class="">Add <span style="color: #1f615f">Pet</span><i class="fas fa-paw ms-2 " style="color: #1f615f"></i> Record</h2>
     </div>
      
       <div class="col-12">
          <form action="{{ route('admin.apartments.update', $apartment->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            {{-- id del proprietario --}}
            <input type="hidden" name="user_id" id="user_id" class="form-control"  value="{{ $user->id }}"> 
          
             
              <div class="form-group d-flex justify-content-around"> 
                <div class="d-flex me-3">
                    <label class="control-label fw-bold mb-2 me-2" for="name">Mq: </label>
                    <input type="number" id="mq" name="mq" class="form-control">
                </div>
                <div class="d-flex me-3">
                    <label class="control-label mb-2 fw-bold me-2">n° bagni: </label>
                    <input type="number" id="n_wc" name="n_wc" class="form-control">
                </div>

           </div>
           <div class="form-group my-4 d-flex justify-content-around my-5">
               <div class="d-flex align-items-center">
                   <label class="control-label mb-2 fw-bold me-3">n° stanze</label>
                   <input type="number" id="n_rooms" name="n_rooms" class="form-control">
               </div>
           </div>  
           <div class="form-group my-4 d-flex justify-content-around my-5">
                <div class="d-flex align-items-center">
                    <label class="control-label mb-2 fw-bold me-3">Type</label>
                    <select name="type_id" id="">
                        @foreach($types as $type)
                         <option value="{{$type->id}}">{{$type->name}}</option>
                         @endforeach
                    </select>
                </div>
           </div>
           <div class="d-flex align-items-center">
            <label class="control-label mb-2 fw-bold me-3">Servizi aggiuntivi</label>
                @foreach($services as $service)
                    <input class="form-check-input" type="checkbox" role="switch" name="name[]" value="{{$service->id}}" id="flexSwitchCheckDefault">
                    <label class="form-check-label" for="flexSwitchCheckDefault">{{$service->name}}</label>
                @endforeach
            </div>
           <div class="form-group my-4 d-flex justify-content-around my-5">
            <div class="d-flex align-items-center">
                <label class="control-label mb-2 fw-bold me-3">Sponsor</label>
                <select name="sponsor_id" id="">
                    @foreach($sponsors as $sponsor)
                     <option value="{{$sponsor->id}}">{{$sponsor->name}} - {{$sponsor->time}}</option>
                     @endforeach
                </select>
            </div>
            <div class="d-flex align-items-center">
                <label class="control-label mb-2 fw-bold me-3">Photos</label>
                <input type="file" name="cover" id="cover">
            </div>
            <button class="btn btn-success" type="submit">Submit</button>
        </div>
        
        
        
    </form>
        
          
      </div>
   </div>
</div>

@endsection


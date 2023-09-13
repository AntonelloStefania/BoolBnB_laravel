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
          <form action="{{ route('admin.apartments.photos.store', $apartment->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- id del proprietario --}}
            {{-- <input type="hidden" name="owner_id" id="owner_id" class="form-control"  value="{{ $user->id }}">  --}}
          
            <div class="d-flex align-items-center">
                <label class="control-label mb-2 fw-bold me-3">Photos</label>
                <input type="file" name="url[]" id="photo" multiple>
            </div>
           
            <button class="btn btn-success" type="submit">Submit</button>
        </div>
        
        
        
    </form>
        
          
      </div>
   </div>
</div>


@endsection


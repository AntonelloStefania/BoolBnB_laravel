@extends('layouts.admin')

@section('content')
    <div class="container">
        <a href="http://localhost:5174/" class="btn btn-success">VITE</a>
        <div class="row justify-content-center">
            <div class="col-8">
            
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col" class="home-text">Copertina</th>
                            <th scope="col">Titolo Annuncio</th>
                            <th scope="col">Indirizzo</th>
                            <th scope="col">Tipologia</th>
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
                            <td class="d-flex flex-column align-items-center"><img src="{{$apartment->type->icons}}" width="25px" alt=""><span style="font-size:10px">{{$apartment->type->name}}</span></td>
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
        {{-- card-1 --}}
        @foreach($apartments as $apartment)
        <article class="postcard light blue">
			<a class="postcard__img_link" href="#">
				<img class="postcard__img" src="{{ asset('storage/'.$apartment->cover) }} " alt="" width="60px">
			</a>
			<div class="postcard__text t-dark">
				<h1 class="postcard__title blue"><a href="#">{{$apartment->title}}</a></h1>
				<div class="postcard__subtitle small">
					{{$apartment->address}}
				</div>
				<div>
                    <img src="{{$apartment->type->icons}}" width="25px" alt="">
                    <span style="font-size:10px">{{$apartment->type->name}}</span>
                    <span>{{$apartment->price}}€ a notte</span>
                </div>
				<div class="postcard__preview-txt">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi, fugiat asperiores inventore beatae accusamus odit minima enim, commodi quia, doloribus eius! Ducimus nemo accusantium maiores velit corrupti tempora reiciendis molestiae repellat vero. Eveniet ipsam adipisci illo iusto quibusdam, sunt neque nulla unde ipsum dolores nobis enim quidem excepturi, illum quos!</div>
				<ul class="postcard__tagbox">
					<li class="tag__item"><i class="fas fa-tag mr-2"></i>Podcast</li>
					<li class="tag__item"><i class="fas fa-clock mr-2"></i>55 mins.</li>
					<li class="tag__item play blue">
						<a href="#"><i class="fas fa-play mr-2"></i>Play Episode</a>
					</li>
				</ul>
			</div>
		</article>
        @endforeach

        
        
    </div>
@endsection

<style lang="scss">
    
</style>







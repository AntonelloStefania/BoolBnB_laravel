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
				<h1 class="brand"><a href="#">{{$apartment->title}}</a></h1>
				<div class="postcard__subtitle small">
					{{$apartment->address}}
				</div>
				<div>
                    <img src="{{$apartment->type->icons}}" width="25px" alt="">
                    <span style="font-size:10px">{{$apartment->type->name}}</span> <br>
                    <span>{{$apartment->price}}€ a notte</span>
                </div>
				<div class="postcard__preview-txt">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi, fugiat asperiores inventore beatae accusamus odit minima enim, commodi quia, doloribus eius! Ducimus nemo accusantium maiores velit corrupti tempora reiciendis molestiae repellat vero. Eveniet ipsam adipisci illo iusto quibusdam, sunt neque nulla unde ipsum dolores nobis enim quidem excepturi, illum quos!</div>
				<ul class="postcard__tagbox">
					<li class="tag__item"><a href="{{route('admin.apartments.edit', $apartment->id)}}" class="btn btn-sm edit"><i class="fas fa-pencil"></i></a></li>
					<li class="tag__item"><a href="{{route('admin.apartments.show', $apartment->id)}}" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a></li>
					<li class="tag__item play blue">
						<form class="d-inline-block" action=" {{route('admin.apartments.destroy', $apartment->id)}} " onsubmit="return confirm('Sei sicuro di voler cancellare questo post?')" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form> 
					</li>
				</ul>
			</div>
		</article>
        @endforeach

        
        
    </div>
@endsection

<style lang="scss">
/* TASTI EDIT SHOW DELETE */

.edit{
    background-color: #718dd8;
    color: white;
}

/* COSE CARD DA VEDERE */

a, a:hover {
	text-decoration: none;
	transition: color 0.3s ease-in-out;
}

#pageHeaderTitle {
	margin: 2rem 0;
	text-transform: uppercase;
	text-align: center;
	font-size: 2.5rem;
}

.postcard {
  flex-wrap: wrap;
  display: flex;
  background-color: #f7e4b4;
  box-shadow: 0 4px 21px -12px rgba(0, 0, 0, 0.66);
  border-radius: 10px;
  margin: 0 0 2rem 0;
  overflow: hidden;
  position: relative;
  color: #ffffff;

	
	.t-dark {
		color: #18151f;
	}
	
  a {
    color: inherit;
  }
	
	h1,	.h1 {
		margin-bottom: 0.5rem;
		font-weight: 500;
		line-height: 1.2;
	}
	
	.small {
		font-size: 80%;
	}

  .postcard__title {
    font-size: 1.75rem;
  }

  .postcard__img {
    max-height: 180px;
    width: 100%;
    object-fit: cover;
    position: relative;
  }

  .postcard__img_link {
    display: contents;
  }

  .postcard__bar {
    width: 50px;
    height: 10px;
    margin: 10px 0;
    border-radius: 5px;
    transition: width 0.2s ease;
  }

  .postcard__text {
    padding: 1.5rem;
    position: relative;
    display: flex;
    flex-direction: column;
  }

  .postcard__preview-txt {
    overflow: hidden;
    text-overflow: ellipsis;
    text-align: justify;
    height: 100%;
  }

  .postcard__tagbox {
    display: flex;
    flex-flow: row wrap;
    font-size: 14px;
    margin: 20px 0 0 0;
		padding: 0;
    justify-content: center;

    .tag__item {
      display: inline-block;
      border-radius: 3px;
      padding: 2.5px 10px;
      margin: 0 5px 5px 0;
      cursor: default;
      user-select: none;
      transition: background-color 0.3s;

    }
  }

  &:before {
    content: "";
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background-image: linear-gradient(-70deg, #424242, transparent 50%);
    opacity: 1;
    border-radius: 10px;
  }

  &:hover .postcard__bar {
    width: 100px;
  }
}

@media screen and (min-width: 769px) {
  .postcard {
    flex-wrap: inherit;

    .postcard__title {
      font-size: 2rem;
    }

    .postcard__tagbox {
      justify-content: start;
    }

    .postcard__img {
      max-width: 300px;
      max-height: 100%;
      transition: transform 0.3s ease;
    }

    .postcard__text {
      padding: 3rem;
      width: 100%;
    }

    .media.postcard__text:before {
      content: "";
      position: absolute;
      display: block;
      background: #18151f;
      top: -20%;
      height: 130%;
      width: 55px;
    }

    &:hover .postcard__img {
      transform: scale(1.1);
    }

    &:nth-child(2n+1) {
      flex-direction: row;
    }

    &:nth-child(2n+0) {
      flex-direction: row-reverse;
    }

    &:nth-child(2n+1) .postcard__text::before {
      left: -12px !important;
      transform: rotate(4deg);
    }

    &:nth-child(2n+0) .postcard__text::before {
      right: -12px !important;
      transform: rotate(-4deg);
    }
  }
}
@media screen and (min-width: 1024px){
		.postcard__text {
      padding: 2rem 3.5rem;
    }
		
		.postcard__text:before {
      content: "";
      position: absolute;
      display: block;
      
      top: -20%;
      height: 130%;
      width: 55px;
    }
	
  .postcard.dark {
		.postcard__text:before {
			background: #18151f;
		}
  }
	.postcard.light {
		.postcard__text:before {
			background: #e1e5ea;
		}
  }
}
.postcard .postcard__tagbox .green.play:hover {
	background: $main-green;
	color: black;
}
.green .postcard__title:hover {
	color: $main-green;
}
.green .postcard__bar {
	background-color: $main-green;
}
.green::before {
	background-image: linear-gradient(
		-30deg,
		$main-green-rgb-015,
		transparent 50%
	);
}
.green:nth-child(2n)::before {
	background-image: linear-gradient(30deg, $main-green-rgb-015, transparent 50%);
}

.postcard .postcard__tagbox .blue.play:hover {
	background: $main-blue;
}
.blue .postcard__title:hover {
	color: $main-blue;
}
.blue .postcard__bar {
	background-color: $main-blue;
}
.blue::before {
	background-image: linear-gradient(-30deg, $main-blue-rgb-015, transparent 50%);
}
.blue:nth-child(2n)::before {
	background-image: linear-gradient(30deg, $main-blue-rgb-015, transparent 50%);
}

.postcard .postcard__tagbox .red.play:hover {
	background: $main-red;
}
.red .postcard__title:hover {
	color: $main-red;
}
.red .postcard__bar {
	background-color: $main-red;
}
.red::before {
	background-image: linear-gradient(-30deg, $main-red-rgb-015, transparent 50%);
}
.red:nth-child(2n)::before {
	background-image: linear-gradient(30deg, $main-red-rgb-015, transparent 50%);
}

.postcard .postcard__tagbox .yellow.play:hover {
	background: $main-yellow;
	color: black;
}
.yellow .postcard__title:hover {
	color: $main-yellow;
}
.yellow .postcard__bar {
	background-color: $main-yellow;
}
.yellow::before {
	background-image: linear-gradient(
		-30deg,
		$main-yellow-rgb-015,
		transparent 50%
	);
}
.yellow:nth-child(2n)::before {
	background-image: linear-gradient(
		30deg,
		$main-yellow-rgb-015,
		transparent 50%
	);
}

@media screen and (min-width: 769px) {
	.green::before {
		background-image: linear-gradient(
			-80deg,
			$main-green-rgb-015,
			transparent 50%
		);
	}
	.green:nth-child(2n)::before {
		background-image: linear-gradient(
			80deg,
			$main-green-rgb-015,
			transparent 50%
		);
	}

	.blue::before {
		background-image: linear-gradient(
			-80deg,
			$main-blue-rgb-015,
			transparent 50%
		);
	}
	.blue:nth-child(2n)::before {
		background-image: linear-gradient(80deg, $main-blue-rgb-015, transparent 50%);
	}

	.red::before {
		background-image: linear-gradient(-80deg, $main-red-rgb-015, transparent 50%);
	}
	.red:nth-child(2n)::before {
		background-image: linear-gradient(80deg, $main-red-rgb-015, transparent 50%);
	}
	
	.yellow::before {
		background-image: linear-gradient(
			-80deg,
			$main-yellow-rgb-015,
			transparent 50%
		);
	}
	.yellow:nth-child(2n)::before {
		background-image: linear-gradient(
			80deg,
			$main-yellow-rgb-015,
			transparent 50%
		);
	}
}

</style>







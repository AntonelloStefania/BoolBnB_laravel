<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    {{-- <script src="https://js.braintreegateway.com/web/dropin/1.8.1/js/dropin.min.js"></script> --}}
    <script src="https://js.braintreegateway.com/web/dropin/1.24.0/js/dropin.min.js"></script>
    <script src="http://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.5.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}


    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">


        <nav class="navbar navbar-expand-md navbar-light bg-white pt-4 mb-5">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                    <div class="logo">
                        <img src="{{asset('logo_provvisorio.png')}}"  width="128px"s alt="">
                    </div>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href=" http://localhost:5174/">Home</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name ?? Auth::user()->email }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{  route('admin.dashboard')  }}">{{__('Dashboard')}}</a>
                                <a class="dropdown-item" href="{{ url('profile') }}">{{__('Profile')}}</a>
                                <a class="dropdown-item" href="http://localhost:5174/" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <a href="{{route('admin.apartments.create')}}" class="dropdown-item">Create</a>
                                <a href="{{route('admin.apartments.index')}}" class="dropdown-item">index</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="">
            @yield('content')
          
        </main>
                {{-- FOOTER --}}
<footer id="footer-large">
		
	<div class="footer-container">
		
		<div class="footer-informazioni">
		 <div>
            <h2>BoolBnB</h2>
        </div>
			
		  <p class="margin-bot-15px descrizione">I valori fondamentali di BoolBnB includono l'eccellenza nell'ospitalità, la soddisfazione del cliente e la trasparenza. BoolBnB si impegna a offrire servizi di alta qualità e alloggi ben curati per garantire un'esperienza memorabile ai suoi ospiti. La compagnia promuove la fiducia attraverso recensioni autentiche e una comunicazione aperta. Inoltre, BoolBnB abbraccia la diversità e promuove la connessione tra culture, offrendo alloggi unici in tutto il mondo per un'esperienza autentica e stimolante. 
			</p>
			
		
		</div>	
		
		<div class="footer-menu">
            <div class="menu-footer descrizione"><ul id="menu-menu-footer" class="menu">
                <li><a href="#">Homepage</a></li>
                <li><a href="#">Appartamenti</a></li>
                <li><a href="#">Vetrina</a></li>
                <li><a href="#">Sponsorizzazioni</a></li>
                <li><a href="#">Profilo</a></li>
                </ul>
            </div> <!-- Footer Menu -->
		</div>
		
		<div class="footer-contatti">
			
		<div class="descrizione color-secondary">Contatti</div>
		<p class="descrizione">Tel: +39 0584 000000<br/>
		Email: <a href="#">info@info.com</a><br/>
		Indirizzo: via Roma 111, Pietrasanta (LU), Italia.<br/>
        </p>
			
		<div class="social-cont">        
		<ul class="social-list">

		<li class="trans-color"><a target="_blank" href="#"><img src="https://www.chefstudio.it/img/facebook-icon.png"  title="facebook" alt="Facebook icon"><br></a></li>
		<li class="trans-color"><a target="_blank" href="#"><img src="https://www.chefstudio.it/img/instagram-icon.png" title="Instagram" alt="Instagram icon"><br></a></li>
		<li class="trans-color"><a target="_blank" href="#"><img src="https://www.chefstudio.it/img/pinterest-icon.png" title="pinterest" alt="Instagram icon"><br></a></li>

		</ul>
    	<div class="floatstop"></div>
		</div><!--/fine social cont-->
			
		</div>
		


		<div class="floatstop"></div>
		
		<div class="avvertenze-legali">
		<p>
		Informazioni legali | I testi, le informazioni e gli altri dati pubblicati in questo sito nonché i link ad altri siti presenti sul web hanno esclusivamente scopo informativo e non assumono alcun carattere di ufficialità. Non assume alcuna responsabilità per eventuali errori od omissioni di qualsiasi tipo e per qualunque tipo di danno diretto, indiretto o accidentale derivante dalla lettura o dall'impiego delle informazioni pubblicate, o di qualsiasi forma di contenuto presente nel sito o per l'accesso o l'uso del materiale contenuto in altri siti.
		</p>
		</div>			
		
			
	
</div> <!--/fine footer container -->
	
</footer>
    </div>
</body>

</html>

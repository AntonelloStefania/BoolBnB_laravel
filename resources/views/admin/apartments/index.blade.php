@extends('layouts.admin')

@section('content')
<div class="container-fluid navbar-container">
    <div class="row justify-content-between w-100">
        <div class="d-flex col-6">
            <div class="col-3 py-3 d-flex justify-content-end">
                <a href="http://localhost:5174"  class="d-none d-lg-block" style="text-decoration:none; color:#3a537e;"><i class="fa-regular fa-circle-left" style="color: #3a537e;"></i> Annunci in Evidenza  </a>
            </div>
            <div class="col-3 py-3 d-flex justify-content-end">
                <a href="http://localhost:5174/apartments"  class="" style="text-decoration:none; color:#3a537e;"><i class="fa-regular fa-circle-left" style="color: #3a537e;"></i> Ricerca Avanzata  </a>
            </div>
        </div>
        <div class="d-flex col-6 justify-content-end">
            <div class=" col-4 py-3 d-flex justify-content-start">
                <a href="{{route('admin.apartments.create')}}"  class="" style="text-decoration:none; color:#3a537e;">Aggiungi Annuncio  <i class="fa-regular fa-circle-right" style="color: #3a537e;"></i></a>
            </div>
        </div>
    </div>
</div>
    <div class="container-fluid">
        <div class="row mb-5 home-text">
            <div class="bg-beige">
                <div class="col-12 text-center my-3 ">
                    <h2>Gestisci i Tuoi Annunci</h2>
                </div>
                <div class="col-8 offset-2 text-center fs-18 mb-5  ">
                    <p>
                        Benvenuto nella nostra pagina dedicata alla gestione dei tuoi annunci su <span class="brand">BoolBnB</span>. Qui, hai il controllo totale sulla tua esperienza di pubblicazione. Puoi visualizzare, personalizzare e ottimizzare tutti i tuoi annunci a partire da un solo luogo. Che tu voglia apportare piccole modifiche, aggiornamenti dettagliati o rimuovere un annuncio, sei nel posto giusto per gestire tutto in modo semplice ed efficace. <span class="brand">BoolBnB</span> è qui per mettere il controllo nelle tue mani e rendere la gestione degli annunci un'esperienza senza stress.
                    </p>
                </div>
            </div>
        </div>
        <div class="card-container container ">
            <div class="row justify-content-center">
                <div class="col-8">
                    @foreach($apartments as $apartment)
                    <div class="card float-right">
                        <div class="row">
                            <div class="col-md-5 ">
                                <img class="d-block w-100 m-0 m-lg-3 card-img" height="350px" src="{{ asset('storage/'.$apartment->cover) }}" alt="">
                            </div>
                          <div class="col-md-7">
                                <div class="card-block home-text">
                                    <div class="card-title">
                                        <h3 class="">{{$apartment->title}}</h3>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold me-2 d-inline"><i class="fa-solid fa-location-dot me-2 "></i>Località: </h6><span>{{$apartment->address}}</span>
                                    </div>
                                    <div>
                                        <h6 class="d-inline fw-bold">Tipologia di alloggio: </h6><img src="{{$apartment->type->icons}}" width="17rem" class="me-2" alt=""><span>{{$apartment->type->name}}</span>
                                    </div>
                                    <div class="">
                                        <p><h6 class="d-inline fw-bold">Pubblicato il: </h6>{{$apartment->created_at}}</p>
                                    </div>
                                    <div class="d-flex flex-row flex-lg-column justify-content-md-center justify-content-around align-items-center">
                                        <div class="col-md-4 col-lg-12" >
                                            <a href="{{route('admin.apartments.show', $apartment->id)}}" class="blue-btn"><i class="fa-regular fa-eye me-0 me-lg-2" style="color: #d4e1f8;"></i><span class="d-none d-lg-inline">Dettagli</span></a>
                                        </div>
                                        <div class="my-4 col-md-4 col-lg-12">
                                            <a href="{{route('admin.apartments.edit', $apartment->id)}}" class="blue-btn"><i class="fas fa-pencil me-0 me-lg-2" style="color: #d4e1f8;"></i><span class="d-none d-lg-inline">Modifica</span></a>
                                        </div>
                                        
                                        <div class="col-md-4 col-lg-12">
                                            <form action="{{route('admin.apartments.destroy', $apartment->id)}}" onsubmit="return confirm('Press ok to confirm')" class="d-block" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button class="beige-btn btn mt-3 mt-lg-0" type="submit"><i class="fas fa-trash me-0 me-lg-2" style="color: #3f3f41;"></i><span class="d-none d-lg-inline">Elimina</span></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                          </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row bg-beige p-3">
            <div class="col-12 text-center mt-4">
                <h2>Cos'è possibile fare qui:</h2>
            </div>
            <div class="col-8 offset-2 d-flex my-3">
                <div class="col-12 col-md-8">
                  <span class="fw-bold">1 - </span> Visualizza tutti i tuoi annunci: Scopri rapidamente l'elenco completo di tutti gli annunci che hai creato su <span class="brand">BoolBnB</span>. Ogni annuncio è dettagliatamente catalogato, con informazioni quali titolo, data di creazione e lo stato corrente.
                </div>
                <div class="col-4 d-md-flex d-none justify-content-center align-items-center">
                    <div class="blue-btn fake-btn"><i class="fa-regular fa-eye me-0 me-lg-2" style="color: #d4e1f8;"></i><span class="">Dettagli</span></div>
                </div>
            </div>
            <div class="col-8 offset-2 d-flex my-3">
                <div class="col-12 col-md-8">
                  <span class="fw-bold">2 - </span> Se hai apportato modifiche ai tuoi prodotti o servizi, personalizzane le informazioni direttamente da questa pagina. Aggiorna immagini, descrizioni e altro con pochi clic.
                </div>
                <div class="col-4 d-md-flex d-none justify-content-center align-items-center">
                    <div class="blue-btn fake-btn"><i class="fas fa-pencil me-0 me-lg-2" style="color: #d4e1f8;"></i><span class="">Modifica</span></div>
                </div>
            </div>
            <div class="col-8 offset-2 d-flex mt-3 mb-5">
                <div class="col-12 col-md-8">
                  <span class="fw-bold">3 - </span> Se desideri ritirare un annuncio, è semplicissimo. Effettua la rimozione direttamente da <span class="brand">BoolBnB</span> e l'annuncio verrà rimosso dalla nostra piattaforma.
                </div>
                <div class="col-4 d-md-flex d-none  justify-content-center align-items-center">
                    <div  class="beige-btn fake-btn"><i class="fas fa-trash me-0 me-lg-2" style="color: #3f3f41;"></i><span class="">Elimina</span></div>
                </div>
            </div>
        </div>
        <div class="col-8 offset-2 d-flex flex-column flex-lg-row my-5">
            <div class="col-lg-4 col-12 d-flex justify-content-center align-items-center">
                <img src="{{asset('logo_provvisorio.png')}}" alt="">
            </div>
            <div class="col-lg-8 col-12 fs-18 align-self-center">
              <span ><span class="brand">BoolBnB</span> è qui per mettere il controllo nelle tue mani. La tua esperienza di gestione degli annunci è progettata per essere intuitiva e personalizzabile, per adattarsi alle tue esigenze in modo rapido ed efficace.

                Se hai domande o hai bisogno di assistenza, il nostro team di supporto è sempre a disposizione per aiutarti a ottenere il massimo dalla tua esperienza su <span class="brand">BoolBnB</span>. Grazie per aver scelto <span class="brand">BoolBnB</span> come il tuo partner nella gestione degli annunci!</span>
            </div>
        </div>

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
		</ul></div> <!-- Footer Menu -->
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
@endsection

<style lang="scss">
    .fake-btn{
        width: 7rem
    }
    body {
    background-color:  #eee;
    }

    .card-img{
        border-radius:3rem !important;
        /* margin:1rem; */
        box-shadow: 2px 2px 8px 0px;
        /* filter: blur(3px) */
    }

    .card-block {
        font-size: 1em;
        position: relative;
        margin: 0;
        padding: 1em;
        border: none;
      
        box-shadow: none;
        
    }
    .card {
        font-size: 1em;
        overflow: hidden;
        padding: 5;
        border: none !important;
        border-radius: .755rem !important;
        background-color: transparent !important;
        margin-top:20px;
        height: 300px;
        cursor: pointer;
      
    }

    h3{
        text-transform: uppercase;
    }
    /* .card:hover .card-img{
        filter:blur(0px)
    } */

    .card:hover h3{
        color: #718dd8;
    }

    /* .card:hover h6{
        color: #718dd8;
    } */


    .card-container{
        height: 600px;
        overflow: auto;
        margin: 5rem 0;
        scrollbar-width: none; /* Nasconde la scrollbar standard in Firefox */
        -webkit-scrollbar-width: none; /* Nasconde la scrollbar in Webkit (Chrome, Safari, etc.) */
        border: 1px solid rgb(100, 100, 100);
        border-radius: 3rem;
        
        
    }
    .card-container::-webkit-scrollbar {
    display: none; /* Nasconde la scrollbar in Webkit */
}


/* FOOTER */
@charset "utf-8";

/* -------------reset----------------*/
html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, font, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td, video {
    margin: 0;
    padding: 0;
    border: 0;
    outline: 0;
    font-size: 100%;
    vertical-align: baseline;
    background: transparent;
}

input:focus, button:focus {outline:0;}

img {
    vertical-align: middle;
}

a{
	text-decoration:none;
}

p{
	margin-bottom:12px;
}

ul li{ 
	list-style:none;
}

html,body{
	color:#666 /*color-text*/;
	height:100%;
	width:100%;
}

h1{
	font-size: 1.5em;
	text-align:left;
	font-weight: bold;
	color:#718dd8/* primary color*/;
}

/* -----------------contenitore e contenuto ------------------ */

.descrizione{
    font-size: 0.9rem;
}

.contenitore .contenuto{
	max-width:1200px;
	margin:auto;
	padding: 70px 10px;
	padding-bottom: 70px;
}

/* -----------------footer html-----------------*/

#footer-large a{
	color:white; /* seconday color*/
}

#footer-large a:hover{
	color:#ebb098; /* light seconday color*/	
}

#footer-large .credits {
	max-width:300px;
	margin:auto;
}

#footer-large .credits a img {
  -o-transition: opacity .2 ease-in;
  -ms-transition: opacity .2s ease-in;
  -moz-transition: opacity .2s ease-in;
  -webkit-transition: opacity .2s ease-in;
  transition: opacity .2s ease
}

#footer-large .credits a img:hover {
	opacity:0.6;
}

#footer-large .social-cont .social-list {
	list-style-type: none;
	margin: 0 auto;
	padding: 10px 0;
}

#footer-large .social-cont .social-list > li {
	margin: 8px 8px 8px 0;
	display: inline-block;
	vertical-align: top;
	height: 32px;
	width: 32px;
	border-radius: 6em;
	background-color:#ebb098; /* secondary-color*/
}

#footer-large .social-cont .social-list li img {
	width: 32px
}

#footer-large .social-cont .social-list > li:hover {
background:#718dd8; /* light seconday color*/		
}

/* -----------------footer-large------------------ */
#footer-large{
	width: 100%;
	border-top: 1px solid #718dd8;
	padding-top: 20px;
	background-color: #718dd8;/* primary color*/
	color: #fff;
}

#footer-large p{
	line-height: normal;
}

#footer-large .footer-informazioni{
	padding: 0 0 15px 0;
	border-bottom: 1px solid #718dd8;
	border-left: 10px solid #718dd8;
    border-right: 10px solid #718dd8;/* primary color*/
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -ms-box-sizing: border-box;
    box-sizing: border-box;
	border-top: 1px solid #718dd8;
}

#footer-large .footer-menu{
	padding: 15px 0;
	border-bottom: 1px solid #ebb098;
		border-left: 10px solid #718dd8;/* primary color*/
    border-right: 10px solid #718dd8;/* primary color*/
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -ms-box-sizing: border-box;
    box-sizing: border-box;
	line-height: 1.5em;
	
}

#footer-large .footer-contatti{
	padding: 15px 0;
	border-left: 10px solid #718dd8;/* primary color*/
    border-right: 10px solid #718dd8;/* primary color*/
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -ms-box-sizing: border-box;
    box-sizing: border-box;
}

.avvertenze-legali p {
    font-size: 12px;
    line-height: 18px;
    margin: 10px 10px 0 10px;
    text-align: justify;
    border-top: 1px solid #e49c96; /* light seconday color*/;
    padding: 26px 0;
	border-bottom: 1px solid #e49c96;
	display: inline-block;
}

.credits {
	text-align: center;
    padding-top: 24px;
    padding-bottom: 50px;
    font-size: 14px;
}
	
@media screen and (min-width: 672px){

#footer-large .footer-informazioni{
	padding: 0 0 15px 0;
	border-bottom: none;
	border-left: 10px solid #718dd8;
    border-right: 10px solid #718dd8;/* primary color*/
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -ms-box-sizing: border-box;
    box-sizing: border-box;
}
	
#footer-large{
	display:inline-block;	
}
	
#footer-large .footer-menu{
	width: 50%;
	float: left;
	border-bottom: none;
	border-top: 1px solid #718dd8;
}

#footer-large .footer-contatti{
	width: 50%;
	float: left;
	border-bottom: none;
	border-top: 1px solid #718dd8;
}
	
}

@media screen and (min-width: 1280px){
	
#footer-large{
	display:inline-block;
}
	
#footer-large .footer-container{
		max-width: 1300px;
		margin: auto;
}

#footer-large .footer-informazioni{
	width: 50%;
	float: left;
	border-bottom: none;
}

#footer-large .footer-menu{
	width: 25%;
	float: left;
}

#footer-large .footer-contatti{
	width: 25%;
	float: left;
}
	
}


</style>







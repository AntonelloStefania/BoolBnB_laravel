@extends('layouts.admin')

@section('content')
<div class="container-fluid navbar-container">
    <div class="row justify-content-between w-100">
        <div class="d-flex col-6">
            <div class="col-6 col-lg-4 py-3 d-flex justify-content-end">
                <a href="{{route('admin.apartments.index')}}"  class="" style="text-decoration:none; color:#3a537e;"><i class="fa-regular fa-circle-left" style="color: #3a537e;"></i> I tuoi Annunci  </a>
            </div>
            <div class="col-6 col-lg-4 py-3 d-flex justify-content-end">
                <a href="{{route('admin.apartments.braintree', $apartment->id)}}"  class="" style="text-decoration:none; color:#3a537e;"><i class="fa-regular fa-circle-left" style="color: #3a537e;"></i> Sponsor  </a>
            </div>
        </div>
        <div class="d-flex col-6 justify-content-end">
            <div class=" col-6 col-lg-4 py-3 d-lg-flex justify-content-start d-none">
                <a href="#add-photos"  class="" style="text-decoration:none; color:#3a537e;">Aggiungi Foto  <i class="fa-regular fa-circle-down" style="color: #3a537e;"></i></a>
            </div>
            <div class=" col-4 py-3 d-flex justify-content-start">
                <a href="{{route('admin.apartments.edit', $apartment->id)}}"  class="" style="text-decoration:none; color:#3a537e;">Modifica Annuncio  <i class="fa-regular fa-circle-right" style="color: #3a537e;"></i></a>
            </div>
        </div>
    </div>
</div>
    <section class="mt-5">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-8 offset-2 text-center mb-5">
                    <h2 class="my-3"><span class="brand">Visualizza</span> il Tuo Annuncio</h2>
                    <p class="text-center">Controlla il tuo annuncio su <span class="brand">BoolBnB</span> per assicurarti che sia completo e soddisfi tutte le tue esigenze. Qui puoi vedere ogni dettaglio e foto che hai aggiunto. Se hai dimenticato qualcosa o desideri apportare modifiche, è il momento giusto per farlo. Un annuncio accurato e completo attira più ospiti, quindi assicurati che il tuo annuncio su <span class="brand">BoolBnB</span> sia perfetto</p>
                </div>
                <div class="container-fluid bg-beige py-3 ">
                    <div class="container">
                        <div class="col-12 text-center mt-2 mb-4">
                            <h2>
                                {{$apartment->title}}
                            </h2>
                        </div>
                        <div class="col-12 d-flex flex-column flex-md-row ">
                            <div class="col-12  col-md-4 d-flex align-items-center order-2 order-md-1 mx-md-3 mb-3">
                                <img src=" {{ asset('storage/'.$apartment->cover) }}" style="border-radius:2rem; border:2px solid rgb(64, 64, 66)" width="100%" height="500px">
                            </div>
                            <div class="col-12 m-0 col-md-8  text-center order-2 order-md-2  justify-content-center mb-3 " >
                                <div class="container gal-container ">
                                    <div class="gal-item d-flex flex-wrap justify-content-center">
                                        @foreach($photos as $photo)
                                        @if($photo->apartment_id === $apartment->id)
                                        <div class="box col-12 col-md-5 m-2  img-container  " id="add-photos">
                                            <img src=" {{ asset('storage/'.$photo->url) }} " class="col-6" style="border-radius:1.25rem" >
                                        
                                            <div class="btns">
                                                <a href="{{route('admin.apartments.photos.edit', [$apartment->id, $photo->id])}}" class="blue-btn"><i class="fas fa-pencil" style="color: #d4e1f8;"></i></a>
                                                <form action="{{route('admin.apartments.photos.destroy', [$apartment->id, $photo->id])}}" onsubmit="return confirm('Press ok to confirm')" class="d-block" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="beige-btn btn" type="submit"><i class="fas fa-trash" style="color: #3f3f41;"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    

                    <div class="col-12 text-center mt-2 ">
                
                        <span>Vuoi rendere il tuo annuncio ancora più <span class="brand">irresistibile?</span> Aggiungi alcune <span class="brand">foto</span> per mostrare tutti i dettagli che rendono il tuo alloggio speciale<a href="{{route('admin.apartments.photos.create', $apartment->id)}}" class="btn blue-btn btn-sm ms-3"><i class="fas fa-plus "></i></a></span>
                    </div>
                    <div class="col-12 text-center mt-2 ">
                
                        <span style="font-size:12px"><span class="brand">Aggiungi </span>Foto al tuo annuncio e <span class="brand">Muoviti su di loro</span> per altre funzionalità</span>
                    </div>
                </div>
            </div>
        </div>
        {{-- FINE SEZIONE IMMAGINI --}}
        <div class="container my-5">
            <div class="row">
                <div class="col-12 col-md-6 flex-column d-flex align-items-center d-md-block  col-lg-3 my-4 my-lg-0 text-lg-start">
                    <h5 class="mb-3 d-flex ">Il Tuo <span class="brand">Alloggio</span></h5>
                        <ul class="list-unstyled ">
                            <li class=" ">
                              <img src="{{$apartment->type->icons}}" width="25rem" class="me-2" alt="">
                              <span class="fw-bold brand">{{$apartment->type->name}}</span>
                            </li>
                            <li class="" >
                                <span class="" ><span class="brand">Grandezza</span> alloggio: </span><span class="fw-bold " >{{$apartment->mq}} <span class="fs-5">&#x33A1;</span> </span>
                            </li>
                            <li class="">
                                <span class="">Numero di <span class="brand">Stanze:</span> </span> <span class="ms-2 fw-bold ">{{$apartment->n_rooms}}<i class="fa-solid fa-building ms-2 align-self-center" style="color: #4f5153;"></i></span>
                            </li>
                            <li class="">
                                <span class="">Numero di <span class="brand">Bagni:</span> </span> <span class="ms-2 fw-bold ">{{$apartment->n_wc}}<i class="fa-solid fa-toilet-paper ms-2" style="color: #4f5153;"></i></span>
                            </li>
                            <li class="">
                                <span class="">Numero di <span class="brand">Letti:</span> </span> <span class="ms-2 fw-bold ">{{$apartment->n_beds}}<i class="fa-solid fa-bed ms-2 align-self-center" style="color: #4f5153;"></i></span>
                            </li>
                        </ul>
                    
                </div>
                <div class="col-12 col-md-6 flex-column d-flex align-items-center d-md-block  col-lg-3 my-4 my-lg-0 text-lg-start">
                    <h5 class="mb-3">I <span class="brand">Servizi</span> che Offri</h5>
                    <ul class="list-unstyled apartment-list " >
                        @foreach($apartment->services as $service)
                            <li class="">
                                <img src="{{$service->icons}}" width="20rem" alt="">
                                <span class="">{{$service->name}}</span>
                            </li>
                        @endforeach 
                    </ul>
                </div>
                <div class="col-12  col-lg-6 text-center my-4 my-lg-0 text-md-start">
                    <h5 class="mb-3">Il <span class="brand">Pernottamento</span> che Offri</h5>
                   
                        <ul class="list-unstyled apartment-list ">
                            <li class="">
                               <span><span class="brand">Prezzo</span> per Notte: </span><span class="ms-2 fw-bold">{{$apartment->price}}&euro;</span>
                            </li>
                            <li class="">
                               <span><span class="brand">Indirizzo</span>: </span><span class="ms-2 ">{{$apartment->address}} <i class="fa-solid fa-location-dot ms-1" style="color: #4f5153;"></i></span>
                            </li>
                            <li class="">
                                <span><span class="brand">Descrizione</span>: </span><span class="ms-2 w-break">{{$apartment->description}}</span>
                             </li>
                        </ul>
                   
                </div>
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
    </section>
@endsection

<style lang="scss">
.w-break{
    overflow-wrap: break-word;
}
.img-container{
    position: relative;
    aspect-ratio: 16/9;
}
.img-container:hover{
    border-radius:1.25rem;
    .btns{
        visibility: visible;
        
    }
}
.btns{
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    display: flex;
    justify-content: space-around;
    visibility: hidden;
    background-color: rgba(0, 0, 0, 0.5);
}
.blue-btn, form{
    align-self: center;
    margin: 0;
}
.btn{
    padding: 0;
    margin: 0;
}

.gal-item .box{
	height: 250px;
    
	overflow: hidden;
}
.box img{
	height: 100%;
	width: 100%;
	object-fit:cover;
	-o-object-fit:cover;
}

.gal-container{
    height: 600px;
    overflow:auto;
    scrollbar-width: none; /* Nasconde la scrollbar standard in Firefox */
    -webkit-scrollbar-width: none; 
}

.gal-container::-webkit-scrollbar {
    display: none; /* Nasconde la scrollbar in Webkit */
}
.apartment-list li{
    min-height: 2.5rem
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

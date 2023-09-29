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
        <div class="d-flex col-6 justify-content-center">
            <a href="{{route('admin.apartments.show', $apartment->id)}}"  class=" d-flex align-items-center" style="text-decoration:none; color:#3a537e;"> 
                <div class="col-auto">
                    <span>Dettagli Annuncio</span>  
                </div>
                <div class="col">
                    <i class="fa-regular fa-eye ms-2" style="color: #3a537e;"></i>
                </div>
            </a>
        </div>
    </div>
</div>
<div class="container mt-5">
   <div class="row">
    {{-- TITOLO PAGINA --}}
      <div class="col-12 text-center mb-5">
            <h1 class="titolo">Modifica il tuo annuncio su <span class="brand">BoolBnb</span> </h1>
            <div class="col-12 my-3">
                <p>
                    Benvenuto alla pagina di <span class="brand">modifica</span> dei tuoi annunci. Qui puoi apportare modifiche e aggiornamenti alle 
                    informazioni e alle caratteristiche dei tuoi appartamenti. <span class="brand">Ottimizza le descrizioni</span>, caricate nuove foto e 
                    assicurati che i tuoi annunci siano sempre al massimo delle prestazioni per attirare potenziali inquilini. 
                    <span class="brand">Personalizza</span> e gestisci in modo efficace le informazioni sui tuoi appartamenti per massimizzare il vostro successo nel settore immobiliare.                         
                </p>
            </div>
     </div>
   </div>
</div>
<div class="container-fluid bg-beige">
    <div class="row">

        <div class="col-10 offset-1">
           <div class="row">
               <div class="col-12">
                    <form action="{{ route('admin.apartments.update', $apartment->id) }}" id="form" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                        
                        {{--1 SEZ. TITOLO/DESCRIZIONE --}}
                        <div class="row  my-5">
                            <div class="col-12 col-lg-6">
                                    <div class=" text-center">
                                        <h2><span class="brand">Titolo</span> e <span class="brand">Descrizione</span></h2>
                                    </div>
                                <div class="col-12 ">
                                    <label class="control-label mb-2 fw-bold"><span class="brand">Titolo</span> Annuncio:</label>
                                    <input type="text" id="title" name="title" class="form-control border-0 bg-light" value="{{old('title') ?? $apartment->title}}">
                                    
                                </div>
                                <div>
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror 
                                </div>
                                <div class="col-12 ">
                                    <label class="control-label fw-bold mb-2 mt-5"><span class="brand">Descrizione</span> Alloggio:</label>
                                    <textarea class="form-control border-0 bg-light" name="description" id="" cols="30" rows="10">{{old('description') ?? $apartment->description }}</textarea>   
                                </div>
                            </div>
                            <div class="col-12 col-lg-3 col-md-6 d-flex flex-column mt-5 mt-lg-0">
                                <div class="col-12 text-center">
                                    <h2><span class="brand">Generalità</span></h2>
                                </div>
                                {{-- METRI QUADRI APPARTAMENTO --}}
                                <div class="col-12 mb-3 text-center">
                                    <label class="control-label fw-bold mb-2  " for="name"><span class="brand">Grandezza</span> Alloggio: </label>
                                    <div class="d-flex justify-content-center">
                                        <input type="number" id="mq" name="mq" class="form-control border-0 bg-light" style="width:4.25rem" value="{{old('mq') ?? $apartment->mq}}"><span class="align-self-center fw-bold ms-2"> &#x33A1;</span>
                                       
                                    </div>
                                    <div>
                                        @error('mq')
                                            <span class="text-danger d-block">{{ $message }}</span>
                                        @enderror 
                                    </div>
                                </div>
                                {{-- NUMERO STANZE --}}
                                <div class="col-12 mb-3 text-center">
                                    <label class="control-label fw-bold mb-2">Numero di <span class="brand">Stanze</span></label>
                                    <div class="d-flex justify-content-center">
                                        <input type="number" id="n_rooms" name="n_rooms" class="form-control border-0 bg-light" style="width:4.25rem" value="{{old('n_rooms') ?? $apartment->n_rooms}}"><i class="fa-solid fa-building ms-2 align-self-center" style="color: #4f5153; "></i>
                                       
                                    </div>
                                    <div>
                                        @error('n_rooms')
                                            <span class="text-danger d-block">{{ $message }}</span>
                                        @enderror 
                                    </div>
                                </div>

                                {{-- NUMERO BAGNI --}}
                                <div class="col-12 mb-3 text-center">
                                    <label class="control-label fw-bold mb-2">Numero di <span class="brand">Bagni</span>: </label>
                                    <div class="d-flex justify-content-center">
                                        <input type="number" id="n_wc" name="n_wc" class="form-control border-0 bg-light" style="width:4.25rem" value="{{old('n_wc') ?? $apartment->n_wc}}"><i class="fa-solid fa-toilet-paper ms-2 align-self-center" style="color: #4f5153;"></i>
                                        
                                    </div>
                                    <div>
                                        @error('n_wc')
                                            <span class="text-danger d-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- NUMERO LETTI --}}
                                <div class="col-12 mb-3 text-center">
                                    <label class="control-label fw-bold mb-2">Numero di <span class="brand">Letti</span>: </label>
                                    <div class="d-flex justify-content-center">
                                        <input type="number" id="n_beds" name="n_beds" class="form-control border-0 bg-light" style="width:4.25rem" value="{{old('n_beds') ?? $apartment->n_beds}}"><i class="fa-solid fa-bed ms-2 align-self-center" style="color: #4f5153;"></i>
                                    </div>
                                    <div>
                                        @error('n_beds')
                                            <span class="text-danger d-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-3 col-md-6 d-flex flex-column mt-5 mt-lg-0">
                                <div class="col-12 text-center">
                                    <h2><span class="brand">Indirizzo</span></h2>
                                </div>
                                {{-- indirizzo --}}
                                <div class="col-12 mb-3 text-center">
                                    
                                    <div class="d-flex justify-content-center">
                                        <input type="ratio" list="suggestions" id="address" name="address" class="form-control border-0 bg-light" value="{{old('address') ?? $apartment->address}}" >   
                                        <datalist id="suggestions">
                                        </datalist>                                    
                                    </div>
                                    <div>
                                        @error('address')
                                         <span class="text-danger d-block">{{ $message }}</span>
                                        @enderror 
                                    </div>
                                      {{-- INPUT LON LAT --}}
                                      <div>
                                        <input type="hidden" name="lon" id="lon" class="form-control"  value="">
                                        <input type="hidden" name="lat" id="lat" class="form-control"  value="">
                                    </div>
                                </div>
                                <div class="col-12 text-center mt-5">
                                    <h2><span class="brand">Prezzo</span> per Notte</h2>
                                    
                                    <div class="d-flex justify-content-center">
                                        <input type="text" id="price" name="price" class="form-control border-0 bg-light" style="width:4.25rem" value="{{old('price') ?? $apartment->price}}" ><span class="fw-bold d-flex align-items-center ms-2">&euro;</span>                               
                                    </div>
                                    <div>
                                        @error('price')
                                             <span class="text-danger d-block">{{ $message }}</span>
                                        @enderror 
                                    </div>
                                </div>
                           
                            </div>
                    </div>
                </div>
            </div>       
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="mb-5 my-5">
                <div class="text-center">
                    <h2>Modifica la <span class="brand">Tipologia</span> dell'Alloggio</h2>
                    <p>
                        Hai apportato modifiche alla tua struttura o desideri offrire una nuova tipologia di alloggio? Aggiorna il tuo annuncio su <span class="brand">BoolBnB</span> per far conoscere ai viaggiatori le tue ultime novità. Mantieni sempre aggiornate le tue offerte e attira più ospiti con le tue offerte rinnovate su <span class="brand">BoolBnB</span>!
                    </p>
                </div>
                <div class="rating col-12 col-md-8 offset-md-2 d-flex flex-wrap justify-content-center">
                
                    @foreach($types as $type)
                    <div class="col-6 col-md-4 d-flex my-3 flex-column align-items-center">
                        <label for="type-id-{{$type->id}}" class="position-relative d-flex change-cursor justify-content-center align-items-center {{ $type->id == old('type_id', $apartment->type_id) ? 'type-bg' : '' }}" style="width:75px; height:75px;">
                            <input type="radio" name="type_id" style="width:65px; height:65px; appearance:none" class="radio-icons" value="{{$type->id}}" id="type-id-{{$type->id}}" {{ $type->id == old('type_id', $apartment->type_id) ? 'checked' : '' }}>
                            <img src="{{$type->icons}}" style="width:50px; height:50px;" alt="" class="type-icons position-absolute" >
                        </label>
                        <span class="fw-bold">{{$type->name}}</span>
                    </div>
                    @endforeach
                    @error('type_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    
                </div>
            </div>                  
        </div>
    </div>
</div>
<div class="container-fluid bg-beige">
    <div class="container ">
        <div class="row my-5">

            <div class="col-12 text-center ">
                
                <h2 class="my-5">Aggiorna l'Immagine di Copertina su <span class="brand">BoolBnB</span></h2>
                <p>
                    L'immagine di copertina è la prima impressione che gli ospiti avranno del tuo alloggio su <span class="brand">BoolBnB</span>. Cambiala periodicamente per rendere il tuo annuncio sempre fresco e attraente. Cattura l'attenzione con nuove foto che mostrano al meglio le caratteristiche uniche della tua struttura e accogli i tuoi futuri ospiti con uno sguardo invitante su <span class="brand">BoolBnB</span>.
                </p>
                
            </div>
            <div class="col-12 d-flex my-5 flex-column flex-md-row">
                <div class="col-12 col-md-6 mb-5 mb-md-0 d-flex flex-column align-items-center ">
                    <h3 class="">Copertina <span class="brand">Precedente</span></h3>
                    @if ($apartment->cover)
                    
                        <img src="{{ asset('storage/' . $apartment->cover) }}" alt="Immagine precedente" class="old-cover" style="width: 18rem;">
                    
                    @endif
                </div>
                <div class="col-12 col-md-6 d-flex flex-column align-items-center">

                    {{-- PROVA DROP-CONTAINER --}}
                    <h3><span class="brand">Nuova</span> Copertina</h3>
                    <label for="images" class="drop-container h-100" id="dropcontainer">
                        
                        <span class="drop-title">Sposta qui l'immagine</span>
                        oppure
                        <input type="file" id="images"  name="cover" value="{{ $apartment->cover }}" class="form-control border-0 bg-light" accept="image/*" >
                        @error('cover')
                            <span class="text-danger d-block">{{ $message }}</span>
                        @enderror 
                    </label>
                
                {{-- FINE DROP-CONTAINER --}}
                </div>
            </div>
        </div>
    </div>  
</div>
<div class="container">
    <div class="row">
            {{-- SERVIZI AGGIUNTIVI --}}
            <div class="col-12">
                
            <div class="text-center my-4">
                <h2 class="control-label mb-2 fw-bold my-3"><span class="brand">Servizi</span> Aggiuntivi</h2>
                <p>
                    Personalizza l'esperienza per i tuoi ospiti scegliendo tra una varietà di servizi aggiuntivi per la tua struttura. Questo campo ti consente di adattare la tua offerta alle esigenze dei tuoi ospiti. Seleziona i servizi che ritieni possano arricchire il loro soggiorno e migliorare la loro esperienza. Rendi la tua struttura ancora più attraente e confortevole per i futuri ospiti.      
                </p>
            </div>                
        
            <div class="d-flex align-items-center flex-wrap ">
                @foreach($services as $service)
                <div class="col-6 text-center col-md-4 d-flex my-3 flex-column align-items-center ">
                    <label class="form-check-label pb-2 position-relative d-flex change-cursor justify-content-center align-items-center {{ $service->id == old('service_id', $apartment->service_id) ? 'service-bg' : '' }}" style="width:50px; height:50px;" for="flexSwitchCheck-{{$service->id}}">
                        <input class="form-check-input m-1"  type="checkbox"  role="" name="name[]" style=" border:none; background-color:transparent; width:35px; height:35px;" value='{{ $service->id }}' {{$errors->any() ? (in_array($service->id, old('name', [])) ? 'checked' : '') : ($apartment->services->contains($service) ? 'checked' : '') }} id="flexSwitchCheck-{{$service->id}}" data-service-id="{{$service->id}}" >
                       
                        <img src="{{$service->icons}}" style="width:50px; height:50px; border: 2px solid transparent;" alt="" class="position-absolute clickable-service" data-checkbox-id="flexSwitchCheck-{{$service->id}}">
                    </label>
                    <span>{{$service->name}}</span>
                </div>
                @endforeach
                <div class="text-center col-12 mt-3">
                    @error('name')
                        <span class="text-danger d-block">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
    </div>    
</div> 
    
    {{-- SPONSOR --}}

{{-- <div class="container sponsor-container">
    <div class="row">
        <div class="col-12 text-center my-5">
            <h3 class="mb-3"><span class="brand">Sponsorizza</span> il tuo Annuncio!</h3>
            <p>
                Vuoi dare una marcia in più al tuo annuncio? Ora puoi farlo con la nostra sponsorizzazione! Oltre agli abbonamenti gratuiti, offriamo opzioni di sponsorizzazione per diverse durate: Abbonamento <span class="fw-bold">Free</span>, Abbonamento <span class="fw-bold">Base</span>, Abbonamento <span class="fw-bold">Avanzato</span> e Abbonamento <span class="fw-bold">Pro</span>. Scegli la sponsorizzazione che si adatta meglio alle tue esigenze e goditi una visibilità superiore per il tuo annuncio su <span class="brand">BoolBnB</span>. Promuovi il tuo spazio ora!
            </p>
        </div>
        @foreach($sponsors as $sponsor)
        <div class="col-6 col-lg-3 cursor-pointer">
            <div class="card {{ $sponsor->name === 'free' ? 'bg-c-blue' : ($sponsor->name === 'base' ? 'bg-c-green' : ($sponsor->name === 'avanzato' ? 'bg-c-yellow' : ($sponsor->name === 'pro' ? 'bg-c-pink' : ''))) }} order-card">
                <div class="card-block">
                    <h4 class="m-b-20 fw-bold text-capitalize  mb-4">{{$sponsor->name}}</h4>
                    <h5 class="text-right mb-3"><i class="fa-regular fa-clock me-2" style="color: #5370a2;"></i><span class="fw-bold">{{$sponsor->time}} h</span></h5>
                    <input type="radio" style="appearance: none"  name="sponsor_id" value="{{$sponsor->id}}" required>
                    <p class="m-b-0">Prezzo:<span class="f-right fw-bold">{{$sponsor->price}}&euro;</span></p>
                </div>
            </div>
        </div>
        @endforeach
        @error('sponsor')
        <span class="text-danger d-block">{{ $message }}</span>
        @enderror 
    </div>
</div> --}}

<div class="container-fluid bg-beige">
    <div class="contoiner">
        <div class="row">
            <div class="form-group my-4 d-flex justify-content-around my-5">
                <div class="d-flex align-items-center">
                    <span class="form-check-label me-3">Vuoi rendere il tuo Annuncio <span class="brand">Visibile</span> al pubblico Ora?</span>
                    <div class="form-check form-switch">
                        <input class="form-check-input" name="visibility" id="visible"  type="checkbox" role="switch"  value="1" {{ old('visibility', $apartment->visibility) == '1' ? 'checked' : '' }} />
                        <input type="checkbox" value="0" name="visibility" style="appearance: none" id="invisible">
                    </div>
                    <div>
                        @error('visibility')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror    
                    </div>
                </div>
            </div> 
        </div>
    </div>

</div>    
<div class="container my-5">
    <div class="row">
        <div class="col-12 text-center">
            <button class="blue-btn btn" id="createSubmit" type="submit">Accetta le Modifiche</button>
        </div>
    </div>
</div>
    </form>

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

 {{-- <input type="hidden" name="user_id" id="user_id" class="form-control"  value="{{ $user->id }}">  --}}
@endsection

<style lang="scss">
.drop-container {
  position: relative;
  display: flex;
  gap: 10px;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  height: 200px;
  padding: 20px;
  border-radius: 10px;
  border: 2px dashed #7b97d4;
  color: #4d9cb4;
  cursor: pointer;
  transition: background .2s ease-in-out, border .2s ease-in-out;
}

.drop-container:hover {
  background: #eee;
  border-color: #111;
}

.drop-container:hover .drop-title {
  color: #222;
}

.drop-title {
  color: #444;
  font-size: 20px;
  font-weight: bold;
  text-align: center;
  transition: color .2s ease-in-out;
}

.old-cover{
    border-radius:0.5rem;
}

textarea::-webkit-scrollbar {
   display: none;
 }

 .form-check-input:checked[type=checkbox]{
    --bs-form-check-bg-image: url() !important;
 }

 .form-check-input[type=checkbox] {
     border-radius: 0 !important; 
     
}


/* SPONSOR PROVA CARDS */
.order-card {
    color: #fff;
}

.bg-c-blue {
    background: linear-gradient(45deg,#aed2fc,#73b4ff);
}

.c-blue{
    color: #aed2fc
}

.bg-c-green {
    background: linear-gradient(45deg,#9ff8e6,#73e0ca);
}

.c-green{
    color:#9ff8e6
}

.bg-c-yellow {
    background: linear-gradient(45deg,#fde5c3,#f5cc92);
}

.c-yellow{
    color:#fde5c3
}
.bg-c-pink {
    background: linear-gradient(45deg,#faccd4,#f895a5);
}

.c-pink{
    color:#faccd4
}


.card {
    border-radius: 5px;
    -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
    box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
    border: none;
    margin-bottom: 30px;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}

.card .card-block {
    padding: 25px;
}

.order-card i {
    font-size: 26px;
}

.f-left {
    float: left;
}

.f-right {
    float: right;
}

.sponsor-container{
    margin:5rem 0 ;
}

.cursor-pointer{
    cursor: pointer;
}


.selected-card{
    scale: 1.15;
    
}




#visible{
    border-radius: 1rem !important;
    height: 1.5rem !important;
    width: 2.5rem !important;
    border: 2px solid #7b97d4 !important
}
#visible:checked{
    background-color: #7b97d4 !important;
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
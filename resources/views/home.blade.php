@extends('layouts.app')
@section('content')

<div>
    <a href="http://localhost:5174/" class="btn btn-success">Torna agli annunci</a>
</div>
@guest
<div class="jumbotron p-5  bg-beige rounded-3">
    <div class="container ">
        
        <div class="col-12 home-text ">
            <h1 class="text-center">
                Benvenuto su <span class="brand">BoolBnB</span>: La Tua Porta di Accesso alle Avventure!
            </h1>
            <p class="text-center">
                Sei pronto a intraprendere un viaggio straordinario alla scoperta del mondo? Benvenuto su <span class="brand">BoolBnB</span>, la tua piattaforma di viaggio di fiducia che ti apre le porte a un'ampia varietà di avventure uniche e indimenticabili. Prima di iniziare questo emozionante percorso, permettici di condividere con te un assaggio di ciò che puoi aspettarti.            
            </p>
            <div class="col-12 d-flex flex-column flex-lg-row justify-content-around my-5 home-text">
                <div class="col-12 col-md-8 mt-md-4 col-lg-6 align-self-center text-center text-lg-start">
                    <h2 class="mb-3">Ospitalità Autentica</h2>
                    <p>
                        Prenotando con <span class="brand">BoolBnB</span>, non stai solo cercando un luogo dove riposare la testa. Stai cercando un'esperienza autentica, un'opportunità di immergerti nella cultura locale e di incontrare persone straordinarie. I nostri host sono appassionati di condividere le loro case e le loro storie con gli ospiti, rendendo ogni soggiorno un'esperienza unica e indimenticabile.
                    </p>
                </div>
                <div class="col-12 col-md-auto d-flex justify-content-center">
                    <img src="{{asset('homepage_3.jpg')}}" class="home-img " alt="">
                </div>
            </div>
          
        </div>
    </div>
</div>

<div class="jumbotron p-5 rounded-3">
    <div class="container ">
        
        <div class="col-12">
            <div class="col-12 d-flex flex-column flex-lg-row justify-content-around my-5 home-text">
                <div class="col-12 col-md-auto d-flex justify-content-center">
                    <img src="{{asset('home_5.jpg')}}" class="home-img " alt="">
                </div>
                <div class="col-12 col-md-8 mt-md-4 col-lg-6 align-self-center text-center text-lg-start">
                    <h2 class="mb-3">Una Vasta Scelta di Alloggi</h2>
                    <p>
                        <span class="brand">BoolBnB</span> ti offre accesso a una vasta selezione di alloggi in tutto il mondo, ciascuno con la sua personalità e storia uniche. Che tu stia cercando un'accogliente casa vacanza, un appartamento di lusso, una romantica casa galleggiante o persino un avventuroso camper, su BoolBnB troverai sempre il posto perfetto per il tuo soggiorno. Siamo qui per rendere i tuoi sogni di viaggio una realtà.
                    </p>
                </div>
            </div>
          
        </div>
        
    </div>
</div>

<div class="jumbotron p-5 rounded-3 bg-beige">
    <div class="container ">
        
        <div class="col-12">
            <div class="col-12 d-flex flex-column flex-lg-row justify-content-around my-5 home-text">
                <div class="col-12 col-md-8 mt-md-4 col-lg-6 align-self-center text-center text-lg-start order-2 order-lg-1">
                    <h2 class="mb-3">Flessibilità e Controllo Personalizzato</h2>
                    <p>
                        Con <span class="brand">BoolBnB</span>, hai il pieno controllo del tuo viaggio. Puoi personalizzare ogni aspetto, dalle date al prezzo e allo spazio in cui soggiorni. Vuoi avere un'intera casa a tua disposizione o preferisci una stanza condivisa? Hai bisogno di un alloggio per una notte o per un mese intero? Scegli le opzioni che meglio si adattano alle tue esigenze e desideri. La tua avventura è nelle tue mani.
                    </p>
                </div>
                <div class="col-12 col-md-auto d-flex justify-content-center order-1 order-lg-2">
                    <img src="{{asset('homepage_control.jpg')}}" class="home-img " alt="">
                </div>
            </div>
          
        </div>
        
    </div>
</div>
<div class="jumbotron p-5   rounded-3">
    <div class="container ">
        
        <div class="col-12 home-text ">
            <h2 class="text-center">
                Iscriviti e Scopri di Più
            </h2>
            <p class="text-center">
                Se tutto ciò suona come un'esperienza che desideri vivere, non esitare a unirti a <span class="brand">BoolBnB</span>. L'iscrizione è semplice, gratuita e veloce. Una volta registrato, potrai esplorare ulteriormente la nostra piattaforma, prenotare i tuoi primi soggiorni e iniziare a creare ricordi che dureranno per sempre.          
            </p>
        </div>
        <div class="col-12 d-flex justify-content-center my-5">
            <a href="{{route('register')}}" class="beige-btn">Registrati</a>
        </div>
        <div class="col-12 text-center">
            <p>
                Sei pronto per iniziare il tuo viaggio con <span class="brand">BoolBnB</span>? Clicca su "Registrati" ora e unisciti a noi nell'esplorare il mondo delle avventure autentiche e dell'ospitalità condivisa. Siamo entusiasti di darti il benvenuto a bordo e di aiutarti a creare ricordi straordinari in tutto il mondo.
            </p>
        </div>
    </div>
</div>
@endguest


{{-- sezione auth --}}
@auth
<div class="col-6 offset-3 home-text">
    <h1>
        Iscriviti e Scopri di Più
    </h1>
    <div>
        <p>
            Se hai un appartamento, una casa, una stanza in più o qualsiasi altra proprietà che potresti mettere in affitto, è il momento ideale per farlo con BoolBnB. Offriamo un modo semplice e sicuro per monetizzare il tuo spazio extra e iniziare a guadagnare. 
        </p>
    </div>
    <div>
       <p>
        Con BoolBnB, mettere in affitto il tuo alloggio è facile e conveniente. Inizia oggi stesso a condividere il tuo spazio con viaggiatori in cerca di esperienze autentiche. Un mondo di opportunità ti aspetta.
       </p>
    </div>

</div>
<div class="col-12 text-center">
    <a href="{{route('admin.apartments.create')}}" class="btn blue-btn">inserisci il tuo annuncio</a>
</div>
@endauth
@endsection

<style lang="scss">
    .home-img{
        width: 500px;
        height: 250px;
        border-radius: 2rem;
        object-fit: cover;
    }

</style>
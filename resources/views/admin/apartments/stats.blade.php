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
<div class="container-fluid bg-beige">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center my-5">
                <h1>Statistiche dell'Alloggio <span class="brand">{{$apartment->title}}</span></h1>
                <p>
                    Benvenuto alle statistiche del tuo alloggio su <span class="brand">BoolBnB</span>! In questa sezione, puoi esplorare le performance del tuo annuncio e avere un'idea chiara dell'interazione degli utenti con la tua inserzione. Le statistiche ti aiutano a prendere decisioni informate e migliorare l'esperienza degli ospiti.
                </p>
            </div>
        </div>
    </div>
</div>
<div class="container my-5">
    <div class="row">
        <div class="col-12 d-flex flex-column flex-lg-row">
            <div class="col-12 col-lg-6 text-center align-self-lg-center pe-lg-4">
                <h2 class="mb-4">
                    Statistiche <span class="brand">Generali</span>
                </h2>
                <p>
                    In questa sezione, troverai una panoramica delle statistiche generali relative al tuo alloggio sulla piattaforma. Queste statistiche includono il numero totale di visite ricevute, le sponsorizzazioni effettuate e i messaggi ricevuti.
                </p>
            </div>
            <div class="col-12 col-lg-6 d-flex justify-content-center">
                <canvas id="barChart"></canvas>
            </div>
        </div>
    </div>
</div>
<div class="container my-5">
    <div class="row">
        <div class="col-12 d-flex flex-column flex-lg-row">
            <div class="col-12 col-lg-6 d-flex justify-content-center order-2 order-lg-1">
                <canvas id="lineChart"></canvas>
            </div>
            <div class="col-12 col-lg-6 text-center align-self-lg-center ps-lg-4 order-1 order-lg-2">
                <h2 class="mb-4">
                    Statistiche per le <span class="" style="color:rgba(200, 99, 132, .7)">Visualizzazioni</span> dell'Annuncio
                </h2>
                <p>
                    Statistiche per le Visualizzazioni dell'Annuncio
                    Testo: Qui troverai le statistiche sulle visualizzazioni dell'annuncio del tuo alloggio. Puoi monitorare quante volte il tuo annuncio è stato visualizzato dagli utenti della piattaforma, ottenendo informazioni preziose sulla sua visibilità.
                </p>
            </div>
        </div>
    </div>
</div>
<div class="container my-5">
    <div class="row">
        <div class="col-12 d-flex flex-column flex-lg-row">
            <div class="col-12 col-lg-6 text-center align-self-lg-center pe-lg-4">
                <h2 class="mb-4">
                    Statistiche dei <span class="" style="color:rgb(138 99 210)">Messaggi</span>
                </h2>
                <p>
                    Statistiche dei Messaggi
                    Testo: Qui puoi esplorare le statistiche dettagliate relative ai messaggi ricevuti per il tuo alloggio. Le informazioni sono suddivise per anno scorso, anno attuale e mese attuale, consentendoti di monitorare l'attività dei messaggi nel corso del tempo.
                </p>
            </div>
            <div class="col-12 col-lg-6 d-flex justify-content-center">
                <canvas id="lineChart2"></canvas>
            </div>
        </div>
    </div>
</div>
<div class="container my-5">
    <div class="row">
        <div class="col-12 d-flex flex-column flex-lg-row">
            <div class="col-12 col-lg-6 d-flex justify-content-center order-2 order-lg-1">
                <canvas id="lineChart3"></canvas>
            </div>
            <div class="col-12 col-lg-6 text-center align-self-lg-center ps-lg-4 order-1 order-lg-2">
                <h2 class="mb-4">
                    Statistiche per le <span class="" style="color:rgb(25 135 84)">Sponsorizzazioni</span> Effettuate
                </h2>
                <p>
                    Statistiche per le Visualizzazioni dell'Annuncio
                    Testo: Qui troverai le statistiche sulle visualizzazioni dell'annuncio del tuo alloggio. Puoi monitorare quante volte il tuo annuncio è stato visualizzato dagli utenti della piattaforma, ottenendo informazioni preziose sulla sua visibilità.
                </p>
            </div>
        </div>
    </div>
</div>

<script >



    //bar
var ctxB = document.getElementById("barChart").getContext('2d');
var myBarChart = new Chart(ctxB, {
  type: 'bar',
  data: {
    labels: ["Sponsor Effettuati", "Emails", "Visite"],
    datasets: [{
      label: 'Statistiche Generali',
      data: [{{$apartment->sponsors->count()}}, {{$apartment->messages->count()}},{{$apartment->visits->count()}}],
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
       
      ],
      borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
      
      ],
      borderWidth: 1
    }]
  },
  options: {
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero: true
        }
      }]
    }
  }
});
//line
var ctxL = document.getElementById("lineChart").getContext('2d');
var myLineChart = new Chart(ctxL, {
  type: 'line',
  data: {
    labels: ["Anno passato", "Anno corrente", "Questo Mese"],
    datasets: [{
      label: "Visualizzazioni Annuncio",
      data: [ {{ $lastYearVisitsCount }},{{ $currentYearVisitsCount }}, {{ $currentMonthVisitsCount }}],
      backgroundColor: [
        'rgba(105, 0, 132, .2)',
      ],
      borderColor: [
        'rgba(200, 99, 132, .7)',
      ],
      borderWidth: 2
    }]
}
});

//line2
var ctxL = document.getElementById("lineChart2").getContext('2d');
var myLineChart = new Chart(ctxL, {
  type: 'line',
  data: {
    labels: ["Anno passato", "Anno corrente", "Questo Mese"],
    datasets: [{
      label: "Messaggi Ricevuti",
      data: [ {{ $lastYearMessagesCount }},{{ $currentYearMessagesCount }}, {{ $currentMonthMessagesCount }}],
      backgroundColor: [
        'rgba(105, 0, 132, .2)',
      ],
      borderColor: [
        'rgb(138 99 210)',
      ],
      borderWidth: 2
    }]
}
});

//line3
var ctxL = document.getElementById("lineChart3").getContext('2d');
var myLineChart = new Chart(ctxL, {
  type: 'line',
  data: {
    labels: ["Anno passato", "Anno corrente", "Questo Mese"],
    datasets: [{
      label: "Sponsorizzazioni Effettuate",
      data: [ {{ $lastYearSponsors }},{{ $currentYearSponsors }}, {{ $currentMonthSponsors }}],
      backgroundColor: [
        'rgba(25, 135, 84, .2)',
      ],
      borderColor: [
        'rgb(25 135 84)',
      ],
      borderWidth: 2
    }]
}
});


</script>
@endsection
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
        <div class="col-12 d-flex flex-column  flex-lg-row">
            <div class="col-12 col-lg-6 d-flex justify-content-center align-self-lg-center pe-lg-4">
                <canvas id="barChart"></canvas>
                
            </div>
            <div class="col-12 col-lg-6 d-flex justify-content-center">
                <canvas id="monthlySponsorsChart"></canvas>
            </div>
        </div>
    </div>
</div>
<div class="container my-5">
    <div class="row">
        <div class="col-12 d-flex flex-column flex-lg-row">
            <div class="col-12 col-lg-6 d-flex justify-content-center order-2 order-lg-1">
                <canvas id="monthlyVisitsChart"></canvas>
            </div>
            <div class="col-12 col-lg-6 d-flex justify-content-center align-self-lg-center ps-lg-4 order-1 order-lg-2">
                <canvas id="lineChart2"></canvas>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid navbar-container">
    <div class="row justify-content-end w-100">
        <div class="col-3 col-lg-2 py-4 ">
        </div>
    </div>
</div>
<div class="container my-5">
    <div class="row">
        <div class="col-12 d-flex flex-column flex-lg-row">
            <div class="col-12 col-lg-6 text-center align-self-lg-center pe-lg-4 order-2 order-lg-1">
                <h2 class="mb-4">
                    Statistiche dei <span class="" style="color:rgb(138 99 210)">Messaggi</span>
                </h2>
                <p>
                    Statistiche dei Messaggi
                    Testo: Qui puoi esplorare le statistiche dettagliate relative ai messaggi ricevuti per il tuo alloggio. Le informazioni sono suddivise per anno scorso, anno attuale e mese attuale, consentendoti di monitorare l'attività dei messaggi nel corso del tempo.
                </p>
            </div>
            <div class="col-12 col-lg-6  text-center order-1 order-lg-2">
                <h2 class="mb-4">
                    Statistiche <span class="brand">Generali</span>
                </h2>
                <p>
                    In questa sezione, troverai una panoramica delle statistiche generali relative al tuo alloggio sulla piattaforma. Queste statistiche includono il numero totale di visite ricevute, le sponsorizzazioni effettuate e i messaggi ricevuti.
                </p>
              
               
            </div>
        </div>
    </div>
</div>
<div class="container my-5">
    <div class="row">
        <div class="col-12 d-flex flex-column flex-lg-row">
            <div class="col-12 col-lg-6  text-center order-2 order-lg-1">
                <h2 class="mb-4">
                    Statistiche per le <span class="" style="color:rgba(200, 99, 132, .7)">Visualizzazioni</span> dell'Annuncio
                </h2>
                <p>
                    Statistiche per le Visualizzazioni dell'Annuncio
                    Testo: Qui troverai le statistiche sulle visualizzazioni dell'annuncio del tuo alloggio. Puoi monitorare quante volte il tuo annuncio è stato visualizzato dagli utenti della piattaforma, ottenendo informazioni preziose sulla sua visibilità.
                </p>
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
        'rgba(25, 135, 84, .2)',
        'rgba(105, 0, 132, .2)',
        'rgba(200, 99, 132, .7)'
       
      ],
      borderColor: [
        'rgba(25, 135, 84, .2)',
        'rgb(138, 99, 210, .7)',
        'rgba(230, 99, 132, .7)',
      
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
// var ctxL = document.getElementById("lineChart").getContext('2d');
// var myLineChart = new Chart(ctxL, {
//   type: 'line',
//   data: {
//     labels: ["Anno passato", "Anno corrente", "Questo Mese"],
//     datasets: [{
//       label: "Visualizzazioni Annuncio",
//       data: [ {{ $lastYearVisitsCount }},{{ $currentYearVisitsCount }}, {{ $currentMonthVisitsCount }}],
//       backgroundColor: [
//         'rgba(105, 0, 132, .2)',
//       ],
//       borderColor: [
//         'rgba(200, 99, 132, .7)',
//       ],
//       borderWidth: 2
//     }]
// }
// });

var ctx = document.getElementById("monthlyVisitsChart").getContext('2d');

// Dati mensili delle visite da inizio anno al mese corrente
var monthlyVisitCounts = @json($monthlyVisitCounts);

// Dati delle visite dell'anno passato e dell'anno corrente
var annualVisitCounts = [{{ $lastYearVisitsCount }}, {{ $currentYearVisitsCount }}];

// Unisci i dati degli anni passati e dell'anno corrente con i dati mensili
var allVisitCounts = annualVisitCounts.concat(Object.values(monthlyVisitCounts));

// Nomi abbreviati dei mesi da inizio anno al mese corrente
var monthNames = Object.keys(monthlyVisitCounts);

// Etichette per il grafico (anno passato + nomi dei mesi abbreviati)
var labels = ['Anno Passato', 'Anno Corrente'].concat(monthNames);

var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: labels,
        datasets: [{
            label: 'Visite per Mese',
            data: allVisitCounts,
            backgroundColor: 'rgba(150, 99, 132, .7)',
            borderColor: 'rgba(200, 99, 132, .7)',
            borderWidth: 2
        }]
    },
})


var ctxL = document.getElementById("lineChart2").getContext('2d');

// Dati mensili dei messaggi da inizio anno al mese corrente
var monthlyMessageCounts = @json($monthlyMessageCounts);

// Dati dei messaggi dell'anno passato e dell'anno corrente
var annualMessageCounts = [{{ $lastYearMessagesCount }}, {{ $currentYearMessagesCount }}];

// Unisci i dati degli anni passati e dell'anno corrente con i dati mensili
var allMessageCounts = annualMessageCounts.concat(Object.values(monthlyMessageCounts));

// Nomi abbreviati dei mesi da inizio anno al mese corrente
var monthNames = Object.keys(monthlyMessageCounts);

// Etichette per il grafico (anno passato + nomi dei mesi abbreviati)
var labels = ['Anno Passato', 'Anno Corrente'].concat(monthNames);

var myLineChart = new Chart(ctxL, {
    type: 'line',
    data: {
        labels: labels,
        datasets: [{
            label: "Messaggi Ricevuti",
            data: allMessageCounts,
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
// var ctxL = document.getElementById("lineChart3").getContext('2d');
// var myLineChart = new Chart(ctxL, {
//   type: 'line',
//   data: {
//     labels: ["Anno passato", "Anno corrente", "Questo Mese"],
//     datasets: [{
//       label: "Sponsorizzazioni Effettuate",
//       data: [ {{ $lastYearSponsors }},{{ $currentYearSponsors }}, {{ $currentMonthSponsors }}],
//       backgroundColor: [
//         'rgba(25, 135, 84, .2)',
//       ],
//       borderColor: [
//         'rgb(25 135 84)',
//       ],
//       borderWidth: 2
//     }]
// }
// });

//funziona per mesi ma ora ho provato a concatenare anno passato 
// var ctx = document.getElementById("monthlySponsorsChart").getContext('2d');

// var monthlySponsorCounts = @json($monthlySponsorCounts);

// var labels = Object.keys(monthlySponsorCounts);
// var data = Object.values(monthlySponsorCounts);

// var myChart = new Chart(ctx, {
//         type: 'line',
//         data: {
//             labels: ['Anno Passato','Anno corrente', labels],
//             datasets: [{
//                 label: 'Sponsorizzazioni per Mese',
//                 data: [ {{ $lastYearSponsors }},{{ $currentYearSponsors }}, data],
//                 backgroundColor: 'rgba(25, 135, 84, .2)',
//                 borderColor: 'rgb(25 135 84)',
//                 borderWidth: 2
//             }]
//         },
//     })


//FUNZIONA!!!

var ctx = document.getElementById("monthlySponsorsChart").getContext('2d');

// Dati mensili degli sponsor da inizio anno al mese corrente
var monthlySponsorCounts = @json($monthlySponsorCounts);

// Dati degli sponsor dell'anno passato e dell'anno corrente
var annualSponsorCounts = [{{ $lastYearSponsors }}, {{ $currentYearSponsors }}];

// Unisci i dati degli anni passati e dell'anno corrente con i dati mensili
var allSponsorCounts = annualSponsorCounts.concat(Object.values(monthlySponsorCounts));

// Nomi abbreviati dei mesi da inizio anno al mese corrente
var monthNames = Object.keys(monthlySponsorCounts);

// Etichette per il grafico (anno passato + nomi dei mesi abbreviati)
var labels = ['Anno Passato', 'Anno Corrente'].concat(monthNames);

var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: labels,
        datasets: [{
            label: 'Sponsorizzazioni per Mese',
            data: allSponsorCounts,
            backgroundColor: 'rgba(25, 135, 84, .2)',
            borderColor: 'rgb(25 135 84)',
            borderWidth: 2
        }]
    },
})






</script>
@endsection
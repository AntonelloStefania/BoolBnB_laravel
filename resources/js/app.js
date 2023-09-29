import './bootstrap';
import '~resources/scss/app.scss';
import Axios from 'axios';
import * as bootstrap from 'bootstrap';
import { Modal } from 'bootstrap';
import.meta.glob([
  '../img/**'
]);


// // Funzione per gestire l'invio della richiesta senza reindirizzamento
// function inviaRichiesta() {
//   // Esegui la richiesta HTTP usando Axios o un'altra libreria
//   Axios.post('http://127.0.0.1:8000', { dati: 'da_inviare' })
//     .then(function (response) {
//       // La richiesta è stata completata con successo
//       console.log('Richiesta inviata con successo:', response.data);
//       // Puoi gestire la risposta qui, ad esempio aggiornando l'interfaccia utente con i dati ricevuti.
//     })
//     .catch(function (error) {
//       // Si è verificato un errore durante la richiesta
//       console.error('Errore durante l\'invio della richiesta:', error);
//       // Puoi gestire l'errore qui, ad esempio mostrando un messaggio di errore all'utente.
//     });
// }


// document.addEventListener('DOMContentLoaded', function () {
//   var form = document.getElementById('form');
//   var createSubmit = document.getElementById('createSubmit');
//   var carousel = new bootstrap.Carousel(document.getElementById("carouselExampleIndicators"));
//   console.log('Codice JavaScript in esecuzione.');
//   var redirectionDone = false;
//   createSubmit.addEventListener('click', function (event) {
//     console.log('Evento di submit catturato!');
//     event.preventDefault();
//     // Impedisce il reindirizzamento standard
//     getPosition()

//     if (!form.checkValidity()) {


//       // Trova l'input con errore
//       var errorInput = form.querySelector('input:invalid');

//       if (errorInput) {
//         //         // Calcola l'indice della slide corrispondente
//         var errorSlide = parseInt(errorInput.getAttribute('data-error-slide'));
//         console.log('Input non valido:', errorInput);
//         if (!isNaN(errorSlide)) {
//           // Sposta il carousel alla slide corrispondente
//           carousel.to(errorSlide - 1); // Sottrai 1 perché l'indice della slide inizia da 0
//           form.removeEventListener('click', handleSubmit);
//           console.log('Reindirizzamento alla slide:', errorSlide - 1);
//           redirectionDone = true;
//         }

//       }

//     }

//     function handleSubmit(event) {
//       console.log('Submit standard del modulo.');
//       // Puoi inserire ulteriori azioni qui, se necessario.
//     }

//     form.addEventListener('createSubmit', handleSubmit);



//   });
// });

//PROVA MODAL PER AGGIUNTA FOTO <----------------------SE DECOMMENTATA NON PERMETTE DI SCEGLIERE SPONSOR
// var myModal = document.getElementById('myModal')
// var myInput = document.getElementById('myInput')

// myModal.addEventListener('shown.bs.modal', function () {
//   myInput.focus()
// })



// FINE PROVA MODAL




//POPOVER INFO DESCRIZIONE APPARTAMENTO IN CREATE
var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
  return new bootstrap.Popover(popoverTriggerEl)
})

//SELEZIONE TIPOLOGIA APPARTAMENTO IN CREATE (RADIO)
document.addEventListener('DOMContentLoaded', function () {
  const radioButtons = document.querySelectorAll('input[name="type_id"]');
  const resultDiv = document.getElementById('result');

  radioButtons.forEach(function (radioButton) {
    radioButton.addEventListener('change', function () {
      // Recupera l'ID dell'elemento selezionato
      const selectedID = radioButton.value;

      // Rimuovi il background-color da tutti gli elementi
      radioButtons.forEach(function (rb) {
        const label = document.querySelector(`label[for="type-id-${rb.value}"]`);
        label.style.backgroundColor = 'transparent';
      });

      if (radioButton.checked) {
        // Imposta il background-color dell'elemento selezionato
        const selectedLabel = document.querySelector(`label[for="type-id-${selectedID}"]`);
        selectedLabel.style.backgroundColor = '#C0C9E1';
        selectedLabel.style.borderRadius = '1rem';
      }
    });
  });
});


//SELEZIONE SERVIZI IN EDIT (CHECKBOX)

document.addEventListener('DOMContentLoaded', function () {
  const clickableServices = document.querySelectorAll('.clickable-service');

  clickableServices.forEach(function (clickableService) {
    // Trova l'ID della checkbox associata all'immagine
    const checkboxId = clickableService.getAttribute('data-checkbox-id');

    // Trova la checkbox corrispondente
    const checkbox = document.getElementById(checkboxId);

    // Controlla se la checkbox è selezionata inizialmente
    if (checkbox && checkbox.checked) {
      clickableService.style.backgroundColor = '#C0C9E1';
      clickableService.style.borderRadius = '0.5rem'
    }

    clickableService.addEventListener('click', function () {
      // Trova nuovamente la checkbox
      const checkbox = document.getElementById(checkboxId);

      if (checkbox) {
        // Cambia lo stato della checkbox
        checkbox.checked = !checkbox.checked;

        // Simula il cambiamento dell'aspetto della checkbox
        if (checkbox.checked) {
          clickableService.style.backgroundColor = '#C0C9E1';
          clickableService.style.borderRadius = '0.5rem'
        } else {
          clickableService.style.backgroundColor = 'transparent';
        }
      }
    });

    // Impedisci al clic sull'immagine di attivare la checkbox direttamente
    clickableService.addEventListener('click', function (e) {
      e.preventDefault();
    });
  });
});



//SELEZIONE SPONSOR CLICCANDO SU CARDS
// document.addEventListener('DOMContentLoaded', function () {
//   const cards = document.querySelectorAll('.cursor-pointer');

//   cards.forEach(function (card) {
//     card.addEventListener('click', function () {
//       // Trova il radio button all'interno della card
//       const radio = card.querySelector('input[type="radio"]');



//       // Seleziona il radio button della card cliccata
//       radio.checked = true;

//       // Aggiungi la classe .selected-card alla card selezionata
//       card.classList.add('selected-card');

//       // Rimuovi la classe .selected-card dalle altre card
//       cards.forEach(function (otherCard) {
//         if (otherCard !== card) {
//           otherCard.classList.remove('selected-card');
//         }
//       });
//     });
//   });
// });

document.addEventListener('DOMContentLoaded', function () {
  const cards = document.querySelectorAll('.cursor-pointer');

  // Trova il radio button inizialmente selezionato
  const selectedRadio = document.querySelector('input[type="radio"]:checked');

  // Aggiungi la classe .selected-card all'elemento padre della radio selezionata (assumendo che sia il card)
  if (selectedRadio) {
    const selectedCard = selectedRadio.closest('.cursor-pointer');
    if (selectedCard) {
      selectedCard.classList.add('selected-card');
    }
  }

  cards.forEach(function (card) {
    card.addEventListener('click', function () {
      // Trova il radio button all'interno della card
      const radio = card.querySelector('input[type="radio"]');

      // Seleziona il radio button della card cliccata
      radio.checked = true;

      // Aggiungi la classe .selected-card alla card selezionata
      card.classList.add('selected-card');

      // Rimuovi la classe .selected-card dalle altre card
      cards.forEach(function (otherCard) {
        if (otherCard !== card) {
          otherCard.classList.remove('selected-card');
        }
      });
    });
  });
});





//FUNZIONE RECUPERO VISIBILITA' ANNUNCIO 

document.addEventListener('DOMContentLoaded', function () {
  const visibleCheckbox = document.getElementById('visible');
  const invisibleCheckbox = document.getElementById('invisible');

  visibleCheckbox.addEventListener('change', function () {
    if (visibleCheckbox.checked) {
      // La prima checkbox è selezionata, deseleziona la seconda
      invisibleCheckbox.checked = false;
    } else {
      // La prima checkbox è deselezionata, seleziona la seconda
      invisibleCheckbox.checked = true;
    }
  });

  invisibleCheckbox.addEventListener('change', function () {
    if (invisibleCheckbox.checked) {
      // La seconda checkbox è selezionata, deseleziona la prima
      visibleCheckbox.checked = false;
    } else {
      // La seconda checkbox è deselezionata, seleziona la prima
      visibleCheckbox.checked = true;
    }
  });
});








//FUNZIONE E CHIAMATA PER TOMTOM
const submitForm = document.getElementById('createSubmit');
let suggestionsList = document.getElementById('suggestions');
let lon = '';
let lat = '';
let addressInput = document.getElementById('address');

addressInput.addEventListener("keyup", function () {
  // Ottieni il valore dell'input
  let query = addressInput.value;

  console.log(query);
  // Se il valore è vuoto, svuota la lista dei suggerimenti e nascondi i dettagli dell'indirizzo
  if (query === "") {
    suggestionsList.innerHTML = "";
    return;
  }

  let url = "https://api.tomtom.com/search/2/search/" + query + ".json?key=" + 'NvRVuGxMpACPuu2WUR93HOEvbVfg2g9A' + "&typeahead=true&limit=";

  // Invia la richiesta GET usando la funzione fetch
  fetch(url)
    .then(function (response) {
      // Se la risposta è valida, restituisci l'oggetto JSON
      if (response.ok) {
        return response.json();
      }
      // Altrimenti, mostra un messaggio di errore
      else {
        throw new Error("Si è verificato un errore nella richiesta: " + response.status);
      }
    })
    .then(function (data) {
      // Se l'oggetto JSON contiene dei risultati, popola la lista dei suggerimenti
      if (data.results.length > 0) {
        populateSuggestionsList(data.results);
      }
      // Altrimenti, svuota la lista dei suggerimenti e nascondi i dettagli dell'indirizzo
      else {
        suggestionsList.innerHTML = "";
      }
    })
    .catch(function (error) {
      // Mostra il messaggio di errore nella console
      console.error(error);
    });
});
// Funzione che popola la lista dei suggerimenti con gli elementi li
function populateSuggestionsList(results) {
  // Svuota la lista dei suggerimenti
  suggestionsList.innerHTML = "";
  // Crea un ciclo for per ogni risultato
  for (let i = 0; i < results.length; i++) {
    // Crea un elemento li
    let option = document.createElement("option");
    // Imposta il testo dell'elemento option con il valore dell'attributo address.freeformAddress del risultato
    option.textContent = results[i].address.freeformAddress;
    // Aggiunge i risultati all'interno del datalist
    suggestionsList.append(option)
  }
};


//RECUPERO COORDINATE CON XML FETCH
submitForm.addEventListener('click', (event) => {
  event.preventDefault();

  const addressValue = document.getElementById('address').value;
  console.log(addressValue);
  let request = new XMLHttpRequest()
  request.open("GET", 'https://api.tomtom.com/search/2/geocode/' + addressValue + '.json?key=NvRVuGxMpACPuu2WUR93HOEvbVfg2g9A')
  request.send()
  request.onload = () => {
    if (request.status == 200) {
      let data = JSON.parse(request.response)
      addressValue === data.results[0].address.freeformAddress
      if (addressValue === data.results[0].address.freeformAddress) {
        // salva in una variabile la risposta dell'API, in JSON

        lon = data.results[0].position.lon
        lat = data.results[0].position.lat

        document.getElementById('lon').value = lon;
        document.getElementById('lat').value = lat;
        console.log(document.getElementById('lon').value)
        console.log(document.getElementById('lat').value)
        const form = document.getElementById('form');
        form.submit();
      } else {
        console.log('Indirizzo non valido')
        document.getElementById('addressError').innerText = 'Indirizzo non valido';
      }
    } else {
      console.log("error:")
      console.log(request.status)
    }
  }
});



// function getPosition() {

//   const addressValue = document.getElementById('address').value;
//   console.log(addressValue);

//   let options = {
//     method: "GET",
//     headers: {
//       "Content-Type": "application/json"
//     },
//     body: null // non serve un corpo per una richiesta GET
//   };

// fetch('https://api.tomtom.com/search/2/geocode/' + addressValue + '.json?key=NvRVuGxMpACPuu2WUR93HOEvbVfg2g9A', options)
//   .then(response => {
//     // controllare se la risposta è valida
//     if (response.ok) {
//       // convertire la risposta in JSON
//       return response.json();
//     } else {
//       // lanciare un errore se la risposta non è valida
//       throw new Error("Errore nella richiesta: " + response.status);
//     }
//   })
//   .then(data => {
//     // gestire i dati ricevuti
//     // il codice qui è lo stesso della funzione onload di XMLHttpRequest
//     if (addressValue === data.results[0].address.freeformAddress) {
//       // salva in una variabile la risposta dell'API, in JSON

//       lon = data.results[0].position.lon
//       lat = data.results[0].position.lat

//       document.getElementById('lon').value = lon;
//       document.getElementById('lat').value = lat;
//       console.log(document.getElementById('lon').value)
//       console.log(document.getElementById('lat').value)
//       const form = document.getElementById('form');
//     } else {
//       console.log('Indirizzo non valido')
//       document.getElementById('addressError').innerText = 'Indirizzo non valido'
//     }
//   })
//   .catch(error => {
//     // gestire gli errori
//     console.log("Errore: " + error.message);
//   });
// }


//DROP CONTAINER EDIT E CREATE*

const dropContainer = document.getElementById("dropcontainer")
const fileInput = document.getElementById("images")

dropContainer.addEventListener("dragover", (e) => {
  // prevent default to allow drop
  e.preventDefault()
}, false)

dropContainer.addEventListener("dragenter", () => {
  dropContainer.classList.add("drag-active")
})

dropContainer.addEventListener("dragleave", () => {
  dropContainer.classList.remove("drag-active")
})

dropContainer.addEventListener("drop", (e) => {
  e.preventDefault()
  dropContainer.classList.remove("drag-active")
  fileInput.files = e.dataTransfer.files
})



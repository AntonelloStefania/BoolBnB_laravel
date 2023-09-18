import './bootstrap';
import '~resources/scss/app.scss';
import Axios from 'axios';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
]);

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







//FUNZIONE E CHIAMATA PER TOMTOM
const submitForm = document.getElementById('createSubmit');
let lon = '';
let lat = '';

submitForm.addEventListener('click', (event) => {
    event.preventDefault();

    const addressValue = document.getElementById('address').value;
    console.log(addressValue);
    let request = new XMLHttpRequest()
    request.open("GET", 'https://api.tomtom.com/search/2/geocode/' + addressValue + '.json?key=NvRVuGxMpACPuu2WUR93HOEvbVfg2g9A')
    request.send()
    request.onload = () => {
        if (request.status == 200) {
            // salva in una variabile la risposta dell'API, in JSON
            let JSONresponse = JSON.parse(request.response)
            lon = JSONresponse.results[0].position.lon
            lat = JSONresponse.results[0].position.lat
            console.log(JSONresponse)
            console.log(lon)
            console.log(lat)
        } else {
            console.log("error:")
            console.log(request.status)
        }
        document.getElementById('lon').value = lon;
        document.getElementById('lat').value = lat;
        console.log(document.getElementById('lon').value)
        console.log(document.getElementById('lat').value)
        const form = document.getElementById('form');
        form.submit();
    }
})




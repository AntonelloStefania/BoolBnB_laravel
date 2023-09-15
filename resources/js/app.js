import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
]);


var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
    return new bootstrap.Popover(popoverTriggerEl)
})


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

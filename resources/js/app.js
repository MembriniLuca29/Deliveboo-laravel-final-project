import './bootstrap';
import '~resources/scss/app.scss';
import axios from 'axios'; 

import * as bootstrap from 'bootstrap';

import.meta.glob([
    '../img/**'
]);

axios.get('/api/dati') 
    .then(response => {
        console.log(response.data);
    })
    .catch(error => {
        console.error(error);
    });


// funzione JavaScript per salvare gli hover nella navbar
document.addEventListener("DOMContentLoaded", function() {
    var divs = document.querySelectorAll('.underline-hover');

    divs.forEach(function(div) {
        div.addEventListener('click', function() {
            divs.forEach(function(innerDiv) {
                innerDiv.classList.remove('attivo');
            });
            div.classList.add('attivo');
        });
    });
});
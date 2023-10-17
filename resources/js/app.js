import './bootstrap';
import '~resources/scss/app.scss';
import axios from 'axios'; 

import * as bootstrap from 'bootstrap';

import.meta.glob([
    '../img/**'
]);


// funzione JavaScript per salvare gli hover nella navbar
document.addEventListener("DOMContentLoaded", function() {
    var links = document.querySelectorAll('.underline-hover');

    // divs.forEach(function(div) {
    //     
    //         divs.forEach(function(innerDiv) {
    //             innerDiv.classList.remove('attivo');
    //         });
    //         div.classList.add('attivo');
            
    //         console.log(typeof window.location.href);
    //     
    // });

    links.forEach(function(a) {

        const value = a.getAttribute("href");
        
        if (window.location.href.includes(value)) {
            a.classList.add('attivo');
        }
        else {
            a.classList.remove('attivo');
        }
           
       
    });
});




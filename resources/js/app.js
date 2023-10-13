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

import './bootstrap';
import '~resources/scss/app.scss';
import axios from 'axios'; 

import * as bootstrap from 'bootstrap';

import.meta.glob([
    '../img/**'
]);

// FUNCTION TO FILTER DAHSBOARD SEARCHBAR
function FilterFunction(){
    document.getElementById("search-input").addEventListener("input", function() {
        var searchTerm = this.value.toLowerCase();
        var items = document.getElementsId("single-item");
    
        for (var i = 0; i < items.length; i++) {
            var itemName = items[i].getElementsById("item-name")[0].innerText.toLowerCase();
            if (itemName.includes(searchTerm)) {
                items[i].style.display = "block";
            } else {
                items[i].style.display = "none";
            }
        }
    });
}




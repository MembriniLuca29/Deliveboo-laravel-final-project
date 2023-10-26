// VARIABLES
let orders = [];
let names = [];
let sold = [];
const monthNames = [
    'Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno',
    'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'
];
// AXIOS CALL
axios.get(`http://127.0.0.1:8000/api/orders/${userId}`)
.then(response => {
    orders = response.data.orders;
    
    // Dopo aver ottenuto la risposta API, filtra gli ordini per il mese corrente
    const currentDate = new Date(); // Ottieni la data corrente
    const currentMonth = currentDate.getMonth() + 1; // Ottieni il mese corrente (vale tra 1 e 12)
    
    const filteredOrders = orders.filter(order => {
        const orderDate = new Date(order.created_at); // Converti la data dell'ordine in un oggetto Date
        const orderMonth = orderDate.getMonth() + 1; // Ottieni il mese dell'ordine (vale tra 1 e 12)
        return orderMonth === currentMonth;
    });

    // Aggiorna il grafico con i nuovi dati
    const data = filteredOrders.map(order => order.numberOfOrders);
    const labels = filteredOrders.map(order => order.month);
    updateChart(labels, data);
    
    const event = new Event('complete');
    document.dispatchEvent(event);
})
.catch(error => {
    console.error(error);
});

// FUNCTIONS
function fetchNames(array) {
    for (let index = 0; index < array.length; index++) {
        const element = array[index];
        names.push(element.name)
    }
}

// AFTER AXIOS RESPONSE HAS ARRIVED

const yearSelect = document.getElementById('year-select');
const uniqueYears = [...new Set(orders.map(order => order.year))]; // Ottieni gli anni unici dai dati degli ordini
uniqueYears.forEach(year => {
    const option = document.createElement('option');
    option.value = year;
    option.text = year;
    yearSelect.appendChild(option);
});
yearSelect.addEventListener('change', () => {
    const selectedYear = parseInt(yearSelect.value); // Ottieni l'anno selezionato come numero intero
    const filteredOrders = orders.filter(order => order.year === selectedYear);
    const data = filteredOrders.map(order => order.numberOfOrders); // Sostituisci numberOfOrders con il campo corretto nel tuo oggetto order
    const labels = filteredOrders.map(order => order.month); // Sostituisci month con il campo corretto nel tuo oggetto order

    // Aggiorna il grafico con i nuovi dati
    updateChart(labels, data);
});

function updateChart(labels, data) {
    // Aggiorna il grafico con i nuovi dati
    const ctx = document.getElementById('myChart').getContext('2d');
    // ... Resto del codice per creare il grafico ...
}
document.addEventListener('complete', () => {

    // Fetch names for labels
    

    // CHART CREATION
    const ctx = document.getElementById('myChart');
    const backgroundColors = orders.map(value => {
        if (value < 5 || value > 20 && value > 49) {
            return 'rgba(255, 99, 132, 0.8)';
        } else if (value >= 5 && value < 10 || value > 50 && value > 99) {
            return 'rgba(39, 245, 153, 0.8)';
        } else if (value >= 10 && value < 20 || value > 100) {
            return 'rgba(39, 136, 245, 0.8)';
        }
    });

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: monthNames,      // Un array di stringhe per le etichette sull'asse x
            datasets: [{
                label: '# Venduti',
                data: orders,       // Un array di numeri per i dati delle barre
                borderWidth: 1,
                backgroundColor: backgroundColors
            }]
        },
        options: {
            indexAxis: 'x',  // Cambia l'asse principale in x per visualizzare le barre verticali
            responsive: true,
            scales: {
                y: {  // Configurazione dell'asse y
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                }
            }
        }
        }
    });
});

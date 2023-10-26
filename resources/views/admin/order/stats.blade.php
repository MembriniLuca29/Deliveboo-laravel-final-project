@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('main-content')

<div>
    <div>
        <label for="year-select">Seleziona Anno:</label>
        <select id="year-select"></select>
    </div>
    <canvas id="myChart" width="800" height="400"></canvas>

</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script> 
<script>
   
    // Recupera i timestamp degli ordini dalla variabile passata dal controller
    const orders = @json($orders);
    const timestamps = @json($timestamps);
console.log(orders);
    // Ora puoi utilizzare l'array timestamps nel tuo script JavaScript
    const monthNames = [
        'Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno',
        'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'
    ];

    // FUNCTIONS
function calculateMonthlyOrderCounts() {
    const monthlyOrderCounts = {};

    // Itera attraverso gli ordini e aggiorna il conteggio per ogni mese
    orders.forEach(order => {
        const month = new Date(order.updated_at).getMonth(); // Ottieni il numero del mese (da 0 a 11)
        monthlyOrderCounts[month] = (monthlyOrderCounts[month] || 0) + 1; // Aggiorna il conteggio per il mese corrente
    });

    return monthlyOrderCounts;
}
// AFTER ORDERS DATA HAS BEEN OBTAINED

// Creazione di un oggetto per conteggiare gli ordini per ogni mese
const monthlyOrderCounts = calculateMonthlyOrderCounts();

// Ottieni i dati per il grafico
const data = Object.values(monthlyOrderCounts); // Quantità di ordini per ogni mese
const labels = Object.keys(monthlyOrderCounts).map(month => monthNames[month]); // Nomi dei mesi

// Aggiorna il grafico con i nuovi dati
updateChart(labels, data);

const yearSelect = document.getElementById('year-select');
yearSelect.addEventListener('change', () => {
    const selectedYear = parseInt(yearSelect.value); // Ottieni l'anno selezionato come numero intero
    const filteredOrders = orders.filter(order => order.year === selectedYear);
    const monthlyOrderCounts = calculateMonthlyOrderCounts(filteredOrders); // Calcola i conteggi mensili per l'anno selezionato
    const data = Object.values(monthlyOrderCounts); // Quantità di ordini per ogni mese
    const labels = Object.keys(monthlyOrderCounts).map(month => monthNames[month]); // Nomi dei mesi

    // Aggiorna il grafico con i nuovi dati
    updateChart(labels, data);
});


function updateChart(labels, data) {
    // Aggiorna il grafico con i nuovi dati
    const ctx = document.getElementById('myChart').getContext('2d');
    // ... Resto del codice per creare il grafico ...
}
document.addEventListener('DOMContentLoaded', () => {
    // Fetch names for labels (se necessario)

    // CHART CREATION
    const ctx = document.getElementById('myChart').getContext('2d');

    // Calcola i dati e le etichette per il grafico
    const monthlyOrderCounts = calculateMonthlyOrderCounts(); // Assumi che questa funzione restituisca i dati degli ordini per ogni mese
    const data = Object.values(monthlyOrderCounts);
    const labels = Object.keys(monthlyOrderCounts).map(month => monthNames[month]);

    // Calcola i colori di sfondo delle barre
    const backgroundColors = data.map(value => {
        if (value < 5 || (value > 20 && value <= 49)) {
            return 'rgba(255, 99, 132, 0.8)';
        } else if ((value >= 5 && value < 10) || (value > 50 && value <= 99)) {
            return 'rgba(39, 245, 153, 0.8)';
        } else if (value >= 10 && value < 20) {
            return 'rgba(39, 136, 245, 0.8)';
        }
        // Handle other cases if necessary
        return 'rgba(0, 0, 0, 0.8)'; // Default color
    });

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: '# Venduti',
                data: data,
                borderWidth: 1,
                backgroundColor: backgroundColors
            }]
        },
        options: {
            indexAxis: 'x',
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });
});

</script>

@endsection

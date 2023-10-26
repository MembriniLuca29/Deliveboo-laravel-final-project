@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('main-content')
    <div id="my-style-dashboard-dish-edit" class="h-100">
        <div class="px-0 px-lg-3 px-xl-2 px-xxl-5 h-100">
            <div class="px-2 px-md-2 px-xl-3 px-xl-4 h-100">

                {{-- intestazione main  --}}
                <div class="header d-inline">
                    <span>
                        <h1 class="lh-1 mb-0 fw-normal border-bottom border-warning border-3 pb-2 pb-sm-3 pb-md-4 pt-xl-3 pb-xl-5">
                            <span class="py-5 d-none d-md-inline">Ecco l'andamento della tua attività</span>
                            <span class="py-5 d-md-none fs-2">Ecco l'andamento della tua attività</span>
                        </h1>
                    </span>
                </div>

                    
                
                <div id="main-content" class="mt-1 mt-sm-2 mt-xl-3 mt-xxl-5 h-100">
                    
                    {{-- intestazione main --}}
                    <div id="main-top-cont" class="py-2 pb-3 d-flex justify-content-between">
                        <div class="fs-2 d-none d-md-inline">
                            Statistiche
                        </div>
                        <div class="fs-4 d-md-none">
                            Statistiche
                        </div>
                    </div>
                    
                    <div id="main-bot-cont" class="w-100">
                        <div class="px-1 px-md-2 px-lg-3 px-xl-4 pt-1 pb-3 h-100">
                            <div class="overflow-x-hidden overflow-y-auto h-100 border-start border-end border-warning border-3 px-1 px-md-2 px-lg-3 px-xl-5">
                                <div class="mx-1 pt-2 pt-md-4 pt-lg-4 px-md-3 pt-xl-5 h-100">
                                    <div>
<div>
    <div>
        <label for="year-select">Seleziona Anno:</label>
        <select id="year-select" style="width: 70px" >
            <option value="2023">2023</option>
            <option value="2022">2022</option>
        </select>
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
    const selectedYear = parseInt(yearSelect.value);

    // Aggiungi questa condizione per gestire l'opzione "Tutti gli anni"
    const filteredOrders = selectedYear === 0 
        ? orders 
        : orders.filter(order => order.year === selectedYear);

    const monthlyOrderCounts = calculateMonthlyOrderCounts(filteredOrders);
    const data = Object.values(monthlyOrderCounts);
    const labels = Object.keys(monthlyOrderCounts).map(month => monthNames[month]);

    updateChart(labels, data);
});

function populateYearSelect(uniqueYears) {
    const allYearsOption = document.createElement('option');
    allYearsOption.value = 0;
    allYearsOption.text = 'Tutti gli anni';
    yearSelect.appendChild(allYearsOption);

    uniqueYears.forEach(year => {
        const option = document.createElement('option');
        option.value = year;
        option.text = year;
        yearSelect.appendChild(option);
    });
}
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




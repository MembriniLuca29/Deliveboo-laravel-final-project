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
const orders = @json($orders);
const timestamps = @json($timestamps);
const monthNames = [
    'Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno',
    'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'
];

function calculateMonthlyOrderCounts(selectedYear) {
    const monthlyOrderCounts = {};

    // Itera attraverso gli ordini e aggiorna il conteggio per ogni mese
    orders.forEach(order => {
        const orderYear = new Date(order.updated_at).getFullYear();
        const orderMonth = new Date(order.updated_at).getMonth();
        if (selectedYear === 0 || orderYear === selectedYear) {
            monthlyOrderCounts[orderMonth] = (monthlyOrderCounts[orderMonth] || 0) + 1;
        }
    });

    return monthlyOrderCounts;
}

function calculateBackgroundColor(value) {
    if (value < 5) {
        return 'rgba(255, 99, 132, 0.8)';
    } else if (value < 10) {
        return 'rgba(255, 159, 64, 0.8)';
    } else if (value < 20) {
        return 'rgba(255, 205, 86, 0.8)';
    } else {
        return 'rgba(75, 192, 192, 0.8)';
    }
}

const yearSelect = document.getElementById('year-select');
if (yearSelect) {
    let chartInstance;
    
    yearSelect.addEventListener('change', () => {
        const selectedYear = parseInt(yearSelect.value);
        const monthlyOrderCounts = calculateMonthlyOrderCounts(selectedYear);
        const data = Object.values(monthlyOrderCounts);
        const labels = Object.keys(monthlyOrderCounts).map(month => monthNames[month]);

        const backgroundColors = data.map(value => calculateBackgroundColor(value));
        
        // Aggiorna solo i dati del grafico invece di crearne uno nuovo
        chartInstance.data.labels = labels;
        chartInstance.data.datasets[0].data = data;
        chartInstance.data.datasets[0].backgroundColor = backgroundColors;
        chartInstance.update(); // Aggiorna il grafico con i nuovi dati
    });

    // Inizializza il grafico con l'anno corrente come predefinito
    const currentYear = new Date().getFullYear();
    const monthlyOrderCounts = calculateMonthlyOrderCounts(currentYear);
    const data = Object.values(monthlyOrderCounts);
    const labels = Object.keys(monthlyOrderCounts).map(month => monthNames[month]);
    const backgroundColors = data.map(value => calculateBackgroundColor(value));

    const ctx = document.getElementById('myChart').getContext('2d');
    chartInstance = new Chart(ctx, {
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
} else {
    console.error('Elemento year-select non trovato nel DOM.');
}

</script>

@endsection





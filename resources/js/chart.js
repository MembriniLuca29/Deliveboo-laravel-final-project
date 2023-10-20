// VARIABLES
let orders = [];
let dishes = [];
let names = [];
let sold = [];

// AXIOS CALL
axios.get(`http://127.0.0.1:8000/api/orders/${userId}`)
    .then(response => {
        orders = response.data.orders;
        dishes = response.data.dishes;
        
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
document.addEventListener('complete', () => {

    // Fetch names for labels
    fetchNames(dishes);

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
        labels: names,      //CI VA UN ARRAY DI STRINGHE
        datasets: [{
            label: '# Venduti',
            data: orders,       //CI VA UN ARRAY DI NUMERI
            borderWidth: 1,
            backgroundColor: backgroundColors
            
        }]
        },
        options: {
        indexAxis: 'y',
        responsive: true,
        scales: {
            x: {
                beginAtZero: true,
                ticks: {
                    stepSize: 1
                }
            }
        }
        }
    });
});

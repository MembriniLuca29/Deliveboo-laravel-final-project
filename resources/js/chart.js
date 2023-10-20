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
        console.log(orders);
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
    new Chart(ctx, {
        type: 'bar',
        data: {
        labels: names,
        datasets: [{
            label: 'Pieces Sold',
            data: orders,
            borderWidth: 1
        }]
        },
        options: {
        scales: {
            y: {
            beginAtZero: true
            }
        }
        }
    });
});
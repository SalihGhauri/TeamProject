const revenueChart = new Chart(document.getElementById('revenueChart'), {
    type: 'line',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
            label: 'Revenue',
            data: [5000, 7000, 8000, 6000, 10000, 12000, 11000, 14000, 16000, 18000, 20000, 22000],
            borderColor: '#64ffda',
            backgroundColor: 'rgba(100, 255, 218, 0.2)',
            fill: true,
            tension: 0.3
        }]
    }
});

const trafficChart = new Chart(document.getElementById('trafficChart'), {
    type: 'doughnut',
    data: {
        labels: ['Football', 'Rugby', 'Golf', 'Volleyball', 'Basketball'],
        datasets: [{
            data: [20, 20, 20, 20, 20],
            backgroundColor: ['#64ffda', '#f39c12', '#e74c3c', '#3498db', '#9b59b6']
        }]
    },
    options: {
        plugins: {
            legend: {
                labels: {
                    color: 'white', 
                    font: {
                        size: 14 
                    },
                    padding: 15 
                }
            }
        }
    }
});

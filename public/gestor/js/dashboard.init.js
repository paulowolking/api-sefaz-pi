
var ctx = document.getElementById("website-stats").getContext('2d');
var baseArray = new Array(15).fill(null);
var arrColors = baseArray.map(function () {
    return  'rgb('+ Math.round(Math.random()*255) +','+ Math.round(Math.random()*255) +','+ Math.round(Math.random()*255) +',1)'
});


var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: dias,
        datasets: [{
            backgroundColor: 'rgb(0,0,255,0.4)',
            data: quantidades,
            borderColor: arrColors,
            borderWidth: 4,
            fill: 'start'
        }]
    },
    options: {
        maintainAspectRatio:true,
        responsive: true,
        legend: {
            display: false
        },
        elements: {
            line: {
                tension: 0.000001
            }
        },
        scales: {
            xAxes: [{
                ticks: {
                    autoSkip: false,
                    beginAtZero:true
                }
            }]
        }
    }
});
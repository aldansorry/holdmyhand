$(document).ready(function(){
    var jsonobj = $("#myChart").data('json');
    var labels = jsonobj.map(function(e) {
        return e.month_name;
    });
    var kredit = jsonobj.map(function(e) {
        return e.kredit;
    });;
    var debet = jsonobj.map(function(e) {
        return e.debet;
    });;
    var profit = jsonobj.map(function(e) {
        return e.profit;
    });;

    var ctx = $("#myChart");
    ctx.height = 100;
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [
            {
                label: 'Kredit Rp',
                backgroundColor : 'rgb(255, 150, 150)',
                data: kredit,
            },
            {
                label: 'Debet Rp',
                backgroundColor : 'rgb(150, 150, 255)',
                data: debet,
            },
            {
                label: 'Profit Rp',
                backgroundColor : 'rgb(150, 255, 150)',
                data: profit,
            }
            ]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            },
            responsive: true,
            maintainAspectRatio: true,
        }
    });
    myChart.aspectRatio = 0;
});
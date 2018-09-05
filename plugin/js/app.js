$(document).ready(function(){

    $.ajax({
        url: "http://localhost/zaccount/data.php",
        method: "GET",
        success: function(data) {
            console.log(data);
            var player = [];
            var amount = [];

            for(var i in data) {
                player.push(data[i].dateID);
                amount.push(data[i].balance);
            }

            var chartdata = {
                labels: player,
                datasets : [
                    {
                        label: 'Player Score',
                        backgroundColor: "#f96332",
                        borderColor: 'rgba(200, 200, 200, 0.75)',
                        hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                        hoverBorderColor: 'rgba(200, 200, 200, 1)',
                        pointBorderWidth: 2,
                        pointHoverRadius: 4,
                        pointHoverBorderWidth: 1,
                        pointRadius: 4,
                        fill: true,
                        data: amount
                    }
                ]
            };

            var ctx = $("#mycanvas");

            var barGraph = new Chart(ctx, {
                type: 'line',
                responsive: true,
                data: chartdata

            });
        },

        error: function(data) {
            console.log(data);
        }
    });
});
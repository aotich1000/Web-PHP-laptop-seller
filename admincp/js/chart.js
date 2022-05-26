console.log(type);
console.log(labelsanpham)
console.log(datadoanhthu)
    new Chart("doanhthu", {

        type: type,
        data: {
            labels: labelsanpham,
            datasets: [{
                label: "Tổng tiền",
                data: datadoanhthu,
                backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#123575'],
                hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf', '#f412a2'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }]
        },
        options: {
            legend: {
                display: true,
                position: 'bottom',
            },
            labels: {
                fontColor: '#71748d',
                fontFamily: 'Circular Std Book',
                fontSize: 14,
            },
            tooltips: {
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,

                callbacks: {
                    label: function (tooltipItem, chart) {
                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                        return datasetLabel + ': ' + tooltipItem.yLabel + 'đ';
                    }
                }
            }
        }
    });

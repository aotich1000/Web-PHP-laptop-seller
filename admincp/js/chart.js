var bgColor = [];
for (let i = 0; i < datadoanhthu.length; i++) {
    var randomColor = Math.floor(Math.random() * 16777215).toString(16);
    var c = "#" + randomColor;
    bgColor[i] = c;
}
new Chart("doanhthu", {
    type: type,
    data: {
        labels: labelsanpham,
        datasets: [{
            label: "Tổng tiền",
            data: datadoanhthu,
            backgroundColor: bgColor,
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

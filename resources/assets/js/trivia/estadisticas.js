Highcharts.chart('containerP', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Usuarios de la App'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
            }
        }
    },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: [{
            name: '18 a 30 años',
            y: 33.33,
            sliced: true,
            selected: true
        }, {
            name: '31 a 40 años',
            y: 16.67
        }, {
            name: '41 a 50 años',
            y: 33.33
        }, {
            name: '51 a 60 años',
            y: 16.67
        }, {
            name: '61 a 70 años',
            y: 0
        }, {
            name: '71 a 80 años',
            y: 0
        }]
    }]
});
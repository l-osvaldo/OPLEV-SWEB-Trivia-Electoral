// Highcharts.chart('containerP', {
//     chart: {
//         plotBackgroundColor: null,
//         plotBorderWidth: null,
//         plotShadow: false,
//         type: 'pie'
//     },
//     title: {
//         text: 'Usuarios de la App'
//     },
//     tooltip: {
//         pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
//     },
//     accessibility: {
//         point: {
//             valueSuffix: '%'
//         }
//     },
//     plotOptions: {
//         pie: {
//             allowPointSelect: true,
//             cursor: 'pointer',
//             dataLabels: {
//                 enabled: true,
//                 format: '<b>{point.name}</b>: {point.percentage:.1f} %'
//             }
//         }
//     },
//     series: [{
//         name: 'Brands',
//         colorByPoint: true,
//         data: [{
//             name: '18 a 30 años',
//             y: 33.33,
//             sliced: true,
//             selected: true
//         }, {
//             name: '31 a 40 años',
//             y: 16.67
//         }, {
//             name: '41 a 50 años',
//             y: 33.33
//         }, {
//             name: '51 a 60 años',
//             y: 16.67
//         }, {
//             name: '61 a 70 años',
//             y: 0
//         }, {
//             name: '71 a 80 años',
//             y: 0
//         }]
//     }]
// });
function grafica() {
    //console.log(periodo);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "graficaUsuariosApp",
        type: 'GET',
        success: function(data) {
            //console.log(data);
            var rangos = [];
            $.each(data, function(index, value) {
                //console.log(value['rango']);
                rangos.push(value['porcentaje']);
            });
            Highcharts.chart('containerP', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Gráfica de los rangos de edad de los usuarios de la Aplicación'
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
                    name: 'Porcentaje',
                    colorByPoint: true,
                    data: [{
                        name: '18 a 30 años',
                        y: rangos[0],
                        sliced: true,
                        selected: true
                    }, {
                        name: '31 a 40 años',
                        y: rangos[1]
                    }, {
                        name: '41 a 50 años',
                        y: rangos[2]
                    }, {
                        name: '51 a 60 años',
                        y: rangos[3]
                    }, {
                        name: '61 a 70 años',
                        y: rangos[4]
                    }, {
                        name: '71 a 80 años',
                        y: rangos[5]
                    }]
                }]
            });
        }
    })
}
document.onload = grafica();

function graficaDistritos() {
    //console.log(periodo);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "graficaDistritos",
        type: 'GET',
        success: function(data) {
            console.log(data);
            var distritos = [];
            $.each(data, function(index, value) {
                //console.log(value['rango']);
                var datos = {
                    name: value['nombrecorto'],
                    y: value['totalUsuarios'],
                    sliced: true,
                    selected: true
                }
                distritos.push(datos);
            });
            console.log(distritos);
            Highcharts.chart('containerDistritos', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Gráfica de los usuarios de la aplicación móvil por distrito'
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
                    name: 'Porcentaje',
                    colorByPoint: true,
                    data: distritos
                    // [{
                    //     name: '18 a 30 años',
                    //     y: rangos[0],
                    //     sliced: true,
                    //     selected: true
                    // }, {
                    //     name: '31 a 40 años',
                    //     y: rangos[1]
                    // }, {
                    //     name: '41 a 50 años',
                    //     y: rangos[2]
                    // }, {
                    //     name: '51 a 60 años',
                    //     y: rangos[3]
                    // }, {
                    //     name: '61 a 70 años',
                    //     y: rangos[4]
                    // }, {
                    //     name: '71 a 80 años',
                    //     y: rangos[5]
                    // }]
                }]
            });
        }
    })
}
document.onload = graficaDistritos();
$('#modalVisorPDFUsuariosAPP').on('show.bs.modal', function(event) {
    document.getElementById('VisorPDFUsuariosAPP').src = '../estadisticas/PDFUsuariosAPP/';
});
$('#modalVisorPDFDistritos').on('show.bs.modal', function(event) {
    document.getElementById('VisorPDFDistritos').src = '../estadisticas/PDFDistritos/';
});
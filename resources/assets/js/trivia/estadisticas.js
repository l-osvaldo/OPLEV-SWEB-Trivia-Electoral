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
            var mujeres = [];
            var hombres = [];
            var totales = [];
            $.each(data, function(index, value) {
                //console.log(value['rango']);
                distritos.push(value['nombrecorto']);
                mujeres.push(value['mujeres']);
                hombres.push(value['hombres']);
                totales.push(value['totalUsuarios']);
            });
            Highcharts.chart('containerDistritos', {
                chart: {
                    type: 'column',
                },
                title: {
                    text: 'Estadísticas sobre los usuarios de la aplicación móvil por Distrito Electoral'
                },
                subtitle: {
                    text: ''
                },
                xAxis: {
                    categories: distritos,
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Usuarios Registrados'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' + '<td style="padding:0"><b>{point.y:.0f} Usuarios</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: [{
                    name: 'Mujeres',
                    data: mujeres
                }, {
                    name: 'Hombres',
                    data: hombres
                }, {
                    name: 'Total de Usuarios por Distrito Electoral',
                    data: totales
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
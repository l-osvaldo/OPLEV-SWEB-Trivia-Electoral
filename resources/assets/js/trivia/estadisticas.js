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
$('#selectDistrito').change(function() {
    //console.log(this.value);
    document.getElementById('loader').classList.remove('o-hidden-loader');
    var distrito = this.value.split('-');
    var complementoDistrito1 = distrito[0] == 10 ? 'y 11. ' : '';
    var complementoDistrito2 = distrito[0] == 14 ? 'y 15. ' : '';
    var complementoDistrito3 = distrito[0] == 29 ? 'y 30. ' : '';
    document.getElementById('divBtnPDF').style.display = 'block';
    document.getElementById('nombreDistrito').innerHTML = distrito[0] + '. ' + complementoDistrito1 + complementoDistrito2 + complementoDistrito3 + distrito[1];
    estadisticasPorDistrito(distrito[0]);
    document.getElementById('VisorPDFMunicipios').src = '../estadisticas/PDFMunicipios/' + distrito[0] + '/' + distrito[1];
});

function estadisticasPorDistrito(numeroDistrito) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "municipiosPorDistrito",
        type: 'POST',
        data: {
            numeroDistrito: numeroDistrito,
        },
        dataType: 'JSON',
        success: function(data) {
            //console.log(data);
            var totalUsuarios = 0;
            var porcentajeMunicipal = 0;
            var porcentajeMujeres = 0;
            var porcentajeHombres = 0;
            var mujeres = 0;
            var hombres = 0;
            var municipios = [];
            var arrayMujeres = [];
            var arrayHombres = [];
            var arrayTotalUsuarios = [];
            $('#estadisticaMunicipios').DataTable().clear().draw();
            $.each(data, function(index, value) {
                //console.log(value['rango']);
                $('#estadisticaMunicipios').DataTable().row.add([
                    value['nombrempio'], '<div align="center">' + value['totalUsuarios'] + '</div>', '<div align="center">' + value['porcentajeMunicipal'] + ' %</div>', '<div align="center">' + value['mujeres'] + '</div>', '<div align="center">' + value['porcentajeMujeres'] + ' %</div>', '<div align="center">' + value['hombres'] + '</div>', '<div align="center">' + value['porcentajeHombres'] + ' %</div>'
                ]).draw(false);
                totalUsuarios += value['totalUsuarios'];
                porcentajeMunicipal += value['porcentajeMunicipal'];
                porcentajeMujeres += value['porcentajeMujeres'];
                porcentajeHombres += value['porcentajeHombres'];
                mujeres += value['mujeres'];
                hombres += value['hombres'];
                municipios.push(value['nombrempio']);
                arrayMujeres.push(value['mujeres']);
                arrayHombres.push(value['hombres']);
                arrayTotalUsuarios.push(value['totalUsuarios']);
            });
            document.getElementById('divEstadisticasCuadros').style.display = 'block';
            document.getElementById('municipiosTotalUsuarios').innerHTML = mujeres + hombres;
            document.getElementById('municipiosTotalMujaresPorcentaje').innerHTML = mujeres + ' - ' + porcentajeMujeres + '<sup style="font-size: 20px">%</sup>';
            document.getElementById('municipiosTotalHombresPorcentaje').innerHTML = hombres + ' - ' + porcentajeHombres + '<sup style="font-size: 20px">%</sup>';
            document.getElementById('totalUsuariosTD').innerHTML = totalUsuarios;
            document.getElementById('porcentajeMunicipalTD').innerHTML = porcentajeMunicipal + ' %';
            document.getElementById('mujeresTotalTD').innerHTML = mujeres;
            document.getElementById('porcentajeMujeresTD').innerHTML = porcentajeMujeres + ' %';
            document.getElementById('hombresTotalTD').innerHTML = hombres;
            document.getElementById('porcentajeHombresTD').innerHTML = porcentajeHombres + ' %';
            graficaMunicipios(municipios, arrayMujeres, arrayHombres, arrayTotalUsuarios);
        }
    })
}

function graficaMunicipios(municipios, mujeres, hombres, totales) {
    console.log(municipios);
    console.log(mujeres);
    console.log(hombres);
    console.log(totales);
    Highcharts.chart('containerMunicipios', {
        chart: {
            type: 'column',
        },
        title: {
            text: 'Estadísticas sobre los usuarios de la aplicación móvil por Municipio'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: municipios,
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
            name: 'Total de Usuarios por Municipio',
            data: totales
        }]
    });
    document.getElementById('loader').classList.add('o-hidden-loader');
}
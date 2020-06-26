const highchartsColumnFixed = document.querySelector("#highcharts-column-fixed");
const highchartsLine = document.querySelector("#highcharts-line");
const highchartsPie = document.querySelector("#highchartst-pie");
const highchartsBubble = document.querySelector("#highcharts-bubble");
const highchartsColumnLine = document.querySelector("#highcharts-column-line");
const highchartsColumn = document.querySelector("#highcharts-column");
const highchartsArea = document.querySelector("#highcharts-area");
const highchartsGaugeSpeed = document.querySelector("#highcharts-gauge-speed");
const highchartsGaugeRpm = document.querySelector("#highcharts-gauge-rpm");

if (highchartsColumnFixed) {
    Highcharts.chart('highcharts-column-fixed', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Optimización de Eficiencia por Sucursal'
        },
        xAxis: {
            categories: [
                'Seattle HQ',
                'San Francisco',
                'Tokyo'
            ]
        },
        yAxis: [{
            min: 0,
            title: {
                text: 'Empleados'
            }
        }, {
            title: {
                text: 'Ganancias (millones)'
            },
            opposite: true
        }],
        legend: {
            shadow: false
        },
        tooltip: {
            shared: true
        },
        plotOptions: {
            column: {
                grouping: false,
                shadow: false,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Empleados',
            color: 'rgba(165,170,217,1)',
            data: [150, 73, 20],
            pointPadding: 0.3,
            pointPlacement: -0.2
        }, {
            name: 'Empleados Optimizados',
            color: 'rgba(126,86,134,.9)',
            data: [140, 90, 40],
            pointPadding: 0.4,
            pointPlacement: -0.2
        }, {
            name: 'Ganancias',
            color: 'rgba(248,161,63,1)',
            data: [183.6, 178.8, 198.5],
            tooltip: {
                valuePrefix: '$',
                valueSuffix: ' M'
            },
            pointPadding: 0.3,
            pointPlacement: 0.2,
            yAxis: 1
        }, {
            name: 'Ganancia Optimizada',
            color: 'rgba(186,60,61,.9)',
            data: [203.6, 198.8, 208.5],
            tooltip: {
                valuePrefix: '$',
                valueSuffix: ' M'
            },
            pointPadding: 0.4,
            pointPlacement: 0.2,
            yAxis: 1
        }]
    });
}

if (highchartsLine) {
    Highcharts.chart('highcharts-line', {

        title: {
            text: 'Crecimiento de Empleos del Sector Solar, 2010-2016'
        },

        subtitle: {
            text: 'Fuente: thesolarfoundation.com'
        },

        yAxis: {
            title: {
                text: 'Número de Empleados'
            }
        },

        xAxis: {
            accessibility: {
                rangeDescription: 'Rango: 2010 to 2017'
            }
        },

        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },

        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
                pointStart: 2010
            }
        },

        series: [{
            name: 'Instalación',
            data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]
        }, {
            name: 'Manufactura',
            data: [24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434]
        }, {
            name: 'Ventas & Distribución',
            data: [11744, 17722, 16005, 19771, 20185, 24377, 32147, 39387]
        }, {
            name: 'Project Development',
            data: [null, null, 7988, 12169, 15112, 22452, 34400, 34227]
        }, {
            name: 'Otros',
            data: [12908, 5948, 8105, 11248, 8989, 11816, 18274, 18111]
        }],

        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });
}

if (highchartsPie) {
    Highcharts.chart('highcharts-pie', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Navegadores más Populares en Enero, 2018'
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
            name: 'Marcas',
            colorByPoint: true,
            data: [{
                name: 'Chrome',
                y: 61.41,
                sliced: true,
                selected: true
            }, {
                name: 'Internet Explorer',
                y: 11.84
            }, {
                name: 'Firefox',
                y: 10.85
            }, {
                name: 'Edge',
                y: 4.67
            }, {
                name: 'Safari',
                y: 4.18
            }, {
                name: 'Sogou Explorer',
                y: 1.64
            }, {
                name: 'Opera',
                y: 1.6
            }, {
                name: 'QQ',
                y: 1.2
            }, {
                name: 'Other',
                y: 2.61
            }]
        }]
    });
}

if (highchartsBubble) {
    Highcharts.chart('highcharts-bubble', {
        chart: {
            type: 'packedbubble',
            height: '100%'
        },
        title: {
            text: 'Emisiones de Carbono Alrededor del Mundo (2014)'
        },
        tooltip: {
            useHTML: true,
            pointFormat: '<b>{point.name}:</b> {point.value}m CO<sub>2</sub>'
        },
        plotOptions: {
            packedbubble: {
                minSize: '20%',
                maxSize: '100%',
                zMin: 0,
                zMax: 1000,
                layoutAlgorithm: {
                    gravitationalConstant: 0.05,
                    splitSeries: true,
                    seriesInteraction: false,
                    dragBetweenSeries: true,
                    parentNodeLimit: true
                },
                dataLabels: {
                    enabled: true,
                    format: '{point.name}',
                    filter: {
                        property: 'y',
                        operator: '>',
                        value: 250
                    },
                    style: {
                        color: 'black',
                        textOutline: 'none',
                        fontWeight: 'normal'
                    }
                }
            }
        },
        series: [{
            name: 'Europa',
            data: [{
                    name: 'Alemania',
                    value: 767.1
                }, {
                    name: 'Croacia',
                    value: 20.7
                },
                {
                    name: "Bélgica",
                    value: 97.2
                },
                {
                    name: "República Checa",
                    value: 111.7
                },
                {
                    name: "Países Bajos",
                    value: 158.1
                },
                {
                    name: "España",
                    value: 241.6
                },
                {
                    name: "Ucrania",
                    value: 249.1
                },
                {
                    name: "Polonia",
                    value: 298.1
                },
                {
                    name: "Francia",
                    value: 323.7
                },
                {
                    name: "Romania",
                    value: 78.3
                },
                {
                    name: "Inglaterra",
                    value: 415.4
                }, {
                    name: "Turquía",
                    value: 353.2
                }, {
                    name: "Italia",
                    value: 337.6
                },
                {
                    name: "Crecia",
                    value: 71.1
                },
                {
                    name: "Austria",
                    value: 69.8
                },
                {
                    name: "Bielorrusia",
                    value: 67.7
                },
                {
                    name: "Serbia",
                    value: 59.3
                },
                {
                    name: "Finlandia",
                    value: 54.8
                },
                {
                    name: "Bulgaria",
                    value: 51.2
                },
                {
                    name: "Portugal",
                    value: 48.3
                },
                {
                    name: "Noruega",
                    value: 44.4
                },
                {
                    name: "Suecia",
                    value: 44.3
                },
                {
                    name: "Hungaria",
                    value: 43.7
                },
                {
                    name: "Suiza",
                    value: 40.2
                },
                {
                    name: "Dinamarca",
                    value: 40
                },
                {
                    name: "Slovakia",
                    value: 34.7
                },
                {
                    name: "Irlanda",
                    value: 34.6
                },
                {
                    name: "Croacia",
                    value: 20.7
                },
                {
                    name: "Estonia",
                    value: 19.4
                },
                {
                    name: "Slovenia",
                    value: 16.7
                },
                {
                    name: "Lithuania",
                    value: 12.3
                },
                {
                    name: "Luxembourg",
                    value: 10.4
                },
                {
                    name: "Macedonia",
                    value: 9.5
                },
                {
                    name: "Moldova",
                    value: 7.8
                },
                {
                    name: "Latvia",
                    value: 7.5
                },
                {
                    name: "Chipre",
                    value: 7.2
                }
            ]
        }, {
            name: 'África',
            data: [{
                    name: "Senegal",
                    value: 8.2
                },
                {
                    name: "Cameroon",
                    value: 9.2
                },
                {
                    name: "Zimbabwe",
                    value: 13.1
                },
                {
                    name: "Ghana",
                    value: 14.1
                },
                {
                    name: "Kenya",
                    value: 14.1
                },
                {
                    name: "Sudan",
                    value: 17.3
                },
                {
                    name: "Tunisia",
                    value: 24.3
                },
                {
                    name: "Angola",
                    value: 25
                },
                {
                    name: "Libia",
                    value: 50.6
                },
                {
                    name: "Ivory Coast",
                    value: 7.3
                },
                {
                    name: "Morocco",
                    value: 60.7
                },
                {
                    name: "Ethiopia",
                    value: 8.9
                },
                {
                    name: "United Republic of Tanzania",
                    value: 9.1
                },
                {
                    name: "Nigeria",
                    value: 93.9
                },
                {
                    name: "South Africa",
                    value: 392.7
                }, {
                    name: "Egypt",
                    value: 225.1
                }, {
                    name: "Algeria",
                    value: 141.5
                }
            ]
        }, {
            name: 'Oceania',
            data: [{
                    name: "Australia",
                    value: 409.4
                },
                {
                    name: "New Zealand",
                    value: 34.1
                },
                {
                    name: "Papua New Guinea",
                    value: 7.1
                }
            ]
        }, {
            name: 'América del Norte',
            data: [{
                    name: "Costa Rica",
                    value: 7.6
                },
                {
                    name: "Honduras",
                    value: 8.4
                },
                {
                    name: "Jamaica",
                    value: 8.3
                },
                {
                    name: "Panama",
                    value: 10.2
                },
                {
                    name: "Guatemala",
                    value: 12
                },
                {
                    name: "República Dominicana",
                    value: 23.4
                },
                {
                    name: "Cuba",
                    value: 30.2
                },
                {
                    name: "USA",
                    value: 5334.5
                }, {
                    name: "Canada",
                    value: 566
                }, {
                    name: "México",
                    value: 456.3
                }
            ]
        }, {
            name: 'América del Sur',
            data: [{
                    name: "El Salvador",
                    value: 7.2
                },
                {
                    name: "Uruguay",
                    value: 8.1
                },
                {
                    name: "Bolivia",
                    value: 17.8
                },
                {
                    name: "Trinidad y Tobago",
                    value: 34
                },
                {
                    name: "Ecuador",
                    value: 43
                },
                {
                    name: "Chile",
                    value: 78.6
                },
                {
                    name: "Perú",
                    value: 52
                },
                {
                    name: "Colombia",
                    value: 74.1
                },
                {
                    name: "Brasil",
                    value: 501.1
                }, {
                    name: "Argentina",
                    value: 199
                },
                {
                    name: "Venezuela",
                    value: 195.2
                }
            ]
        }, {
            name: 'Asia',
            data: [{
                    name: "Nepal",
                    value: 6.5
                },
                {
                    name: "Georgia",
                    value: 6.5
                },
                {
                    name: "Brunei Darussalam",
                    value: 7.4
                },
                {
                    name: "Kyrgyzstan",
                    value: 7.4
                },
                {
                    name: "Afghanistan",
                    value: 7.9
                },
                {
                    name: "Myanmar",
                    value: 9.1
                },
                {
                    name: "Mongolia",
                    value: 14.7
                },
                {
                    name: "Sri Lanka",
                    value: 16.6
                },
                {
                    name: "Bahrain",
                    value: 20.5
                },
                {
                    name: "Yemen",
                    value: 22.6
                },
                {
                    name: "Jordan",
                    value: 22.3
                },
                {
                    name: "Lebanon",
                    value: 21.1
                },
                {
                    name: "Azerbaijan",
                    value: 31.7
                },
                {
                    name: "Singapore",
                    value: 47.8
                },
                {
                    name: "Hong Kong",
                    value: 49.9
                },
                {
                    name: "Syria",
                    value: 52.7
                },
                {
                    name: "DPR Korea",
                    value: 59.9
                },
                {
                    name: "Israel",
                    value: 64.8
                },
                {
                    name: "Turkmenistan",
                    value: 70.6
                },
                {
                    name: "Oman",
                    value: 74.3
                },
                {
                    name: "Qatar",
                    value: 88.8
                },
                {
                    name: "Philippines",
                    value: 96.9
                },
                {
                    name: "Kuwait",
                    value: 98.6
                },
                {
                    name: "Uzbekistan",
                    value: 122.6
                },
                {
                    name: "Iraq",
                    value: 139.9
                },
                {
                    name: "Pakistan",
                    value: 158.1
                },
                {
                    name: "Vietnam",
                    value: 190.2
                },
                {
                    name: "United Arab Emirates",
                    value: 201.1
                },
                {
                    name: "Malaysia",
                    value: 227.5
                },
                {
                    name: "Kazakhstan",
                    value: 236.2
                },
                {
                    name: "Thailand",
                    value: 272
                },
                {
                    name: "Taiwan",
                    value: 276.7
                },
                {
                    name: "Indonesia",
                    value: 453
                },
                {
                    name: "Saudi Arabia",
                    value: 494.8
                },
                {
                    name: "Japan",
                    value: 1278.9
                },
                {
                    name: "China",
                    value: 10540.8
                },
                {
                    name: "India",
                    value: 2341.9
                },
                {
                    name: "Russia",
                    value: 1766.4
                },
                {
                    name: "Iran",
                    value: 618.2
                },
                {
                    name: "Korea",
                    value: 610.1
                }
            ]
        }]
    });
}

if (highchartsColumnLine) {
    Highcharts.chart('highcharts-column-line', {
        title: {
            text: 'Gráfico Combinado'
        },
        xAxis: {
            categories: ['Manzanas', 'Naranjas', 'Peras', 'Bananas', 'Ciruelas']
        },
        labels: {
            items: [{
                html: 'Total de Consumo',
                style: {
                    left: '50px',
                    top: '18px',
                    color: ( // theme
                        Highcharts.defaultOptions.title.style &&
                        Highcharts.defaultOptions.title.style.color
                    ) || 'black'
                }
            }]
        },
        series: [{
            type: 'column',
            name: 'Jane',
            data: [3, 2, 1, 3, 4]
        }, {
            type: 'column',
            name: 'John',
            data: [2, 3, 5, 7, 6]
        }, {
            type: 'column',
            name: 'Joe',
            data: [4, 3, 3, 9, 0]
        }, {
            type: 'spline',
            name: 'Promedio',
            data: [3, 2.67, 3, 6.33, 3.33],
            marker: {
                lineWidth: 2,
                lineColor: Highcharts.getOptions().colors[3],
                fillColor: 'white'
            }
        }, {
            type: 'pie',
            name: 'Consumo Total',
            data: [{
                name: 'Jane',
                y: 13,
                color: Highcharts.getOptions().colors[0] // Jane's color
            }, {
                name: 'John',
                y: 23,
                color: Highcharts.getOptions().colors[1] // John's color
            }, {
                name: 'Joe',
                y: 19,
                color: Highcharts.getOptions().colors[2] // Joe's color
            }],
            center: [100, 80],
            size: 100,
            showInLegend: false,
            dataLabels: {
                enabled: false
            }
        }]
    });
}

if (highchartsColumn) {
    Highcharts.chart('highcharts-column', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Promedio de Lluvia Mensual'
        },
        subtitle: {
            text: 'Fuente: WorldClimate.com'
        },
        xAxis: {
            categories: [
                'Ene',
                'Feb',
                'Mar',
                'Abr',
                'May',
                'Jun',
                'Jul',
                'Ago',
                'Sep',
                'Oct',
                'Nov',
                'Dic'
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Lluvia (mm)'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
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
            name: 'Tokio',
            data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

        }, {
            name: 'Nueva York',
            data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

        }, {
            name: 'Londrés',
            data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]

        }, {
            name: 'Berlín',
            data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]

        }]
    });
}

if (highchartsArea) {
    Highcharts.chart('highcharts-area', {
        chart: {
            type: 'area'
        },
        accessibility: {
            description: 'Descripción de la Imagen: Un gráfico de área compara las reservas nucleares de los EE. UU. Y la URSS / Rusia entre 1945 y 2017. La cantidad de armas nucleares se representa en el eje Y y los años en el eje X. El gráfico es interactivo, y los niveles de existencias anuales se pueden rastrear para cada país. Estados Unidos tiene un arsenal de 6 armas nucleares en los albores de la era nuclear en 1945. Este número aumentó gradualmente a 369 en 1950 cuando la URSS ingresó a la carrera armamentista con 6 armas. En este punto, Estados Unidos comienza a construir rápidamente su arsenal que culminó en 32.040 ojivas nucleares en 1966 en comparación con las 7.089 de la URSS. A partir de este pico en 1966, la reserva de EE. UU. Disminuye gradualmente a medida que se expande la reserva de la URSS. Para 1978, la URSS había cerrado la brecha nuclear en 25.393. El arsenal de la URSS continúa creciendo hasta alcanzar un pico de 45,000 en 1986 en comparación con el arsenal de los Estados Unidos de 24,401. A partir de 1986, las reservas nucleares de ambos países comienzan a caer. Para el año 2000, los números han caído a 10,577 y 21,000 para los Estados Unidos y Rusia, respectivamente. Las disminuciones continúan hasta 2017, momento en el que Estados Unidos posee 4.018 armas en comparación con las 4.500 de Rusia.'
        },
        title: {
            text: 'US y USSR reservas nucleares'
        },
        subtitle: {
            text: 'Fuentes: <a href="https://thebulletin.org/2006/july/global-nuclear-stockpiles-1945-2006">' +
                'thebulletin.org</a> &amp; <a href="https://www.armscontrol.org/factsheets/Nuclearweaponswhohaswhat">' +
                'armscontrol.org</a>'
        },
        xAxis: {
            allowDecimals: false,
            labels: {
                formatter: function () {
                    return this.value; // clean, unformatted number for year
                }
            },
            accessibility: {
                rangeDescription: 'Rango: 1940 to 2017.'
            }
        },
        yAxis: {
            title: {
                text: 'Estados de armas nucleares'
            },
            labels: {
                formatter: function () {
                    return this.value / 1000 + 'k';
                }
            }
        },
        tooltip: {
            pointFormat: '{series.name} had stockpiled <b>{point.y:,.0f}</b><br/>warheads in {point.x}'
        },
        plotOptions: {
            area: {
                pointStart: 1940,
                marker: {
                    enabled: false,
                    symbol: 'circle',
                    radius: 2,
                    states: {
                        hover: {
                            enabled: true
                        }
                    }
                }
            }
        },
        series: [{
            name: 'USA',
            data: [
                null, null, null, null, null, 6, 11, 32, 110, 235,
                369, 640, 1005, 1436, 2063, 3057, 4618, 6444, 9822, 15468,
                20434, 24126, 27387, 29459, 31056, 31982, 32040, 31233, 29224, 27342,
                26662, 26956, 27912, 28999, 28965, 27826, 25579, 25722, 24826, 24605,
                24304, 23464, 23708, 24099, 24357, 24237, 24401, 24344, 23586, 22380,
                21004, 17287, 14747, 13076, 12555, 12144, 11009, 10950, 10871, 10824,
                10577, 10527, 10475, 10421, 10358, 10295, 10104, 9914, 9620, 9326,
                5113, 5113, 4954, 4804, 4761, 4717, 4368, 4018
            ]
        }, {
            name: 'USSR/Russia',
            data: [null, null, null, null, null, null, null, null, null, null,
                5, 25, 50, 120, 150, 200, 426, 660, 869, 1060,
                1605, 2471, 3322, 4238, 5221, 6129, 7089, 8339, 9399, 10538,
                11643, 13092, 14478, 15915, 17385, 19055, 21205, 23044, 25393, 27935,
                30062, 32049, 33952, 35804, 37431, 39197, 45000, 43000, 41000, 39000,
                37000, 35000, 33000, 31000, 29000, 27000, 25000, 24000, 23000, 22000,
                21000, 20000, 19000, 18000, 18000, 17000, 16000, 15537, 14162, 12787,
                12600, 11400, 5500, 4512, 4502, 4502, 4500, 4500
            ]
        }]
    });
}

if (highchartsGaugeSpeed) {
    var chartSpeed = Highcharts.chart('highcharts-gauge-speed', Highcharts.merge(gaugeOptions, {
        yAxis: {
            min: 0,
            max: 200,
            title: {
                text: 'Speed'
            }
        },

        credits: {
            enabled: false
        },

        series: [{
            name: 'Speed',
            data: [80],
            dataLabels: {
                format: '<div style="text-align:center">' +
                    '<span style="font-size:25px">{y}</span><br/>' +
                    '<span style="font-size:12px;opacity:0.4">km/h</span>' +
                    '</div>'
            },
            tooltip: {
                valueSuffix: ' km/h'
            }
        }]

    }));
}

if (highchartsGaugeRpm) {
    var chartRpm = Highcharts.chart('highcharts-gauge-rpm', Highcharts.merge(gaugeOptions, {
        yAxis: {
            min: 0,
            max: 5,
            title: {
                text: 'RPM'
            }
        },

        series: [{
            name: 'RPM',
            data: [1],
            dataLabels: {
                format: '<div style="text-align:center">' +
                    '<span style="font-size:25px">{y:.1f}</span><br/>' +
                    '<span style="font-size:12px;opacity:0.4">' +
                    '* 1000 / min' +
                    '</span>' +
                    '</div>'
            },
            tooltip: {
                valueSuffix: ' revolutions/min'
            }
        }]

    }));
}

var gaugeOptions = {
    chart: {
        type: 'solidgauge'
    },

    title: 'Solid Gauges',

    pane: {
        center: ['50%', '85%'],
        size: '140%',
        startAngle: -90,
        endAngle: 90,
        background: {
            backgroundColor: Highcharts.defaultOptions.legend.backgroundColor || '#EEE',
            innerRadius: '60%',
            outerRadius: '100%',
            shape: 'arc'
        }
    },

    exporting: {
        enabled: false
    },

    tooltip: {
        enabled: false
    },

    // the value axis
    yAxis: {
        stops: [
            [0.1, '#55BF3B'], // green
            [0.5, '#DDDF0D'], // yellow
            [0.9, '#DF5353'] // red
        ],
        lineWidth: 0,
        tickWidth: 0,
        minorTickInterval: null,
        tickAmount: 2,
        title: {
            y: -70
        },
        labels: {
            y: 16
        }
    },

    plotOptions: {
        solidgauge: {
            dataLabels: {
                y: 5,
                borderWidth: 0,
                useHTML: true
            }
        }
    }
};

// Bring life to the dials
setInterval(function () {
    // Speed
    var point,
        newVal,
        inc;

    if (chartSpeed) {
        point = chartSpeed.series[0].points[0];
        inc = Math.round((Math.random() - 0.5) * 100);
        newVal = point.y + inc;

        if (newVal < 0 || newVal > 200) {
            newVal = point.y - inc;
        }

        point.update(newVal);
    }

    // RPM
    if (chartRpm) {
        point = chartRpm.series[0].points[0];
        inc = Math.random() - 0.5;
        newVal = point.y + inc;

        if (newVal < 0 || newVal > 5) {
            newVal = point.y - inc;
        }

        point.update(newVal);
    }
}, 2000);

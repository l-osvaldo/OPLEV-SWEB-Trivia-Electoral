@extends('layouts.app')
@section('content')
<!-- Main content -->
<!-- Content Header (Page header) -->
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2 mt-3">
      <div class="col-sm-6">
        <h1>Highcharts</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
          <li class="breadcrumb-item active">Highcharts</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <figure class="highcharts-figure">
          <div id="container"></div>
          <p class="highcharts-description">
            Gráfico que muestra la colocación superpuesta de columnas, utilizando diferentes series de datos. El gráfico también está utilizando múltiples ejes y, lo que permite visualizar datos en diferentes rangos en el mismo gráfico.
          </p>
        </figure>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <figure class="highcharts-figure">
            <div id="containertwo"></div>
            <p class="highcharts-description">   
              Gráfico de líneas básico que muestra las tendencias en un conjunto de datos. Este cuadro incluye el
              <code>series-label</code> módulo, que agrega una etiqueta a cada línea para una
              lectura mejorada.
            </p>
          </figure>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col">
            <figure class="highcharts-figure">
              <div id="containerthree"></div>
              <p class="highcharts-description">
                Los gráficos circulares son muy populares para mostrar una visión general y compacta de una
                composición o comparación. Si bien pueden ser más difíciles de leer que
                gráficos de columnas, siguen siendo una opción popular para pequeños conjuntos de datos.
              </p>
            </figure>
          </div>
        </div>
      </section>

      <section class="content">
        <div class="container-fluid">
          <figure class="highcharts-figure">
            <div id="containerfive"></div>
            <p class="highcharts-description">
              Gráfico que muestra cómo se pueden combinar diferentes tipos de series en un solo
              gráfico. El gráfico utiliza un conjunto de series de columnas, superpuestas por una línea y
              Una serie de tartas. La línea ilustra los promedios de columna, mientras que el
              El pastel ilustra los totales de las columnas.
            </p>
          </figure>
        </div>
      </section>

      <section class="content">
        <div class="container-fluid">
          <figure class="highcharts-figure">
            <div id="containerfour"></div>
            <p class="highcharts-description">
              Este gráfico muestra cómo los gráficos de burbujas empaquetados se pueden agrupar por series,
              creando una jerarquía.
            </p>
          </figure>
        </div>
      </section>


      <script src="/highcharts.js"></script>
      <script src="/highcharts-more.js"></script>
      <script type="text/javascript">

        Highcharts.chart('container', {
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

        Highcharts.chart('containertwo', {

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

        Highcharts.chart('containerthree', {
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

        Highcharts.chart('containerfour', {
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
            }]
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
            }]
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
            }]
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
            }]
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
            }]
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
            }]
          }]
        });

Highcharts.chart('containerfive', {
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

    </script>
    @endsection
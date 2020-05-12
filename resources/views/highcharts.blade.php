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
                    <div id="highcharts-column"></div>
                    <p class="highcharts-description">
                        Gráfico de Columna Básico que muestra el promedio mensual de lluvias entre diferentes ciudades.
                    </p>
                </figure>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <figure class="highcharts-figure">
                    <div id="highcharts-area"></div>
                    <p class="highcharts-description">
                        Gráfico de área básico.

                        Los gráficos de área son similares a los gráficos de líneas, pero se usan comúnmente para
                        visualizar
                        volúmenes.
                    </p>
                </figure>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <figure class="highcharts-figure">
                    <div id="containerten">asadad</div>
                    <div id="highcharts-gauge-speed" class="chart-container"></div>
                    <div id="highcharts-gauge-rpm" class="chart-container"></div>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <figure class="highcharts-figure">
                    <div id="highcharts-column-fixed"></div>
                    <p class="highcharts-description">
                        Gráfico que muestra la colocación superpuesta de columnas, utilizando diferentes series de
                        datos. El gráfico también está utilizando múltiples ejes y, lo que permite visualizar datos en
                        diferentes rangos en el mismo gráfico.
                    </p>
                </figure>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <figure class="highcharts-figure">
                    <div id="highcharts-line"></div>
                    <p class="highcharts-description">
                        Gráfico de líneas básico que muestra las tendencias en un conjunto de datos. Este cuadro incluye
                        el
                        <code>series-label</code> módulo, que agrega una etiqueta a cada línea para una
                        lectura mejorada.
                    </p>
                </figure>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <figure class="highcharts-figure">
                    <div id="highcharts-pie"></div>
                    <p class="highcharts-description">
                        Los gráficos circulares son muy populares para mostrar una visión general y compacta de una
                        composición o comparación. Si bien pueden ser más difíciles de leer que
                        gráficos de columnas, siguen siendo una opción popular para pequeños conjuntos de datos.
                    </p>
                </figure>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <figure class="highcharts-figure">
            <div id="highcharts-column-line"></div>
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
            <div id="highcharts-bubble"></div>
            <p class="highcharts-description">
                Este gráfico muestra cómo los gráficos de burbujas empaquetados se pueden agrupar por series,
                creando una jerarquía.
            </p>
        </figure>
    </div>
</section>
@endsection

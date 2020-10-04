@extends('layouts.app')

@section('content')
<section class="content-header pt-5">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h4>
                    <b>Estadísticas de usuarios por sexo</b>
                </h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="#">
                            Inicio
                        </a>
                    </li>
                    <li class="breadcrumb-item active">
                        Estadísticas
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>

<section class="content">
    <div class="row">
        
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box card-primary card-outline">
                <div class="inner">
                    <p><b>Usuarios Registrados</b></p>

                    <h3 class="o-color-primario">{{ $numeroUsuarios }}</h3>                    
                </div>
                <div class="icon">
                    <i class="fas fa-user-plus o-color-primario "></i>
                </div>
                {{-- <span class="small-box-footer">
                    &nbsp;
                </span> --}}
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box card-primary card-outline">
                <div class="inner">
                    <p><b>Mujeres</b></p>
                    <h3 class="o-color-primario">{{ $mujeres }} - {{ $porcentajeMujeres }}<sup style="font-size: 20px">%</sup></h3>                    
                </div>
                <div class="icon">
                    <i class="fas fa-female o-color-primario"></i>
                </div>
                {{-- <span class="small-box-footer">
                    Edad promedio: {{ $promedioMujeres }} años
                </span> --}}
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box card-primary card-outline">
                <div class="inner">
                    <p><b>Hombres</b></p>
                    <h3 class="o-color-primario">{{ $hombres }} - {{ $porcentajeHombres }}<sup style="font-size: 20px">%</sup></h3>                    
                </div>
                <div class="icon">
                    <i class="fas fa-male o-color-primario"></i>
                </div>
                {{-- <span class="small-box-footer">
                    Edad promedio: {{ $promedioHombres }} años
                </span> --}}
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div style="display: block; height: 1em;margin: 5em 0 0 auto" align="right">
                <button class="btn btn-danger o-fondo-1" type="button" data-target="#modalVisorPDFEstados" data-toggle="modal">
                    <i class="fas fa-file-pdf"></i>
                    <b>Generar PDF</b>                    
                </button>
            </div>
        </div>        
    </div>

    <div class="card borde-ople">
        <div class="card-body">
            <h4>
                <b>Estadísticas de otras Entidades Federativas</b>                
            </h4>
            <table class="table table-striped table-bordered" id="estadisticaDistritos" style="width:100%">
                <thead>
                    <tr align="center">
                        <th>
                            Entidad Federativa
                        </th>
                        <th>
                            Total de usuarios en la Entidad Federativa
                        </th>
                        <th>
                            Porcentaje estatal del total de usuarios
                        </th>
                        <th>
                            Total de Mujeres por Entidad Federativa
                        </th>
                        <th>
                            Porcentaje de Mujeres por Entidad Federativa
                        </th>
                        <th>
                            Total de Hombres por Entidad Federativa
                        </th>
                        <th>
                            Porcentaje de Hombres por Entidad Federativa 
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($estados as $estado)
                        <tr>
                            <td>
                                {{ $estado->nombre }}
                            </td>
                            <td align="center">
                                {{ $estado->totalUsuarios }}
                            </td>
                            <td align="center">
                                {{ $estado->porcentajeEstatal }} %
                            </td>
                            <td align="center">
                                {{ $estado->mujeres }}
                            </td>
                            <td align="center">
                                {{ $estado->porcentajeMujeres }} %
                            </td>
                            <td align="center">
                                {{ $estado->hombres }}
                            </td>
                            <td align="center">
                                {{ $estado->porcentajeHombres }} %
                            </td>
                        </tr>
                        
                    @endforeach
                </tbody>
                <tfoot>
                    <tr style="background-color: #DFDFDF;">
                        <td>
                            <b>TOTALES</b>
                        </td>
                        <td align="center">
                            <b>{{ $numeroUsuarios }}</b>
                        </td>
                        <td align="center">
                            <b>100 %</b>
                        </td>
                        <td align="center">
                            <b>{{ $mujeres }}</b>
                        </td>
                        <td align="center">
                            <b>{{ $porcentajeMujeres }} %</b>
                        </td>
                        <td align="center">
                            <b>{{ $hombres }}</b>
                        </td>
                        <td align="center">
                            <b>{{ $porcentajeHombres }} %</b>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <figure class="highcharts-figure" style="max-width: 1000px !important;">
                    <div id="containerEstatal" style="width: 1000px"></div>
                    <p class="highcharts-description">
                        
                    </p>
                </figure>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalVisorPDFEstados" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-xl">
            <div class="modal-content card-primary card-outline">
                <div class="modal-header o-fondo-2">
                    <h4 class="modal-title">Estadísticas sobre los usuarios de la aplicación móvil de otras Entidades Federativas</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p> <iframe width="100%" height="800" id="VisorPDFEstados"></iframe> </p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

</section>

@endsection
@extends('layouts.app')

@section('content')
<section class="content-header pt-5">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                
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
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- ./row -->
                <div class="row">
                    <div class="col-12 col-sm-12 col-lg-12">
                        <div class="card card-primary card-primary card-outline">
                            <div class="card-header p-0 pt-1 border-bottom-0 o-fondo-2">
                                <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                                    <li class="nav-item">
                                        <a aria-controls="custom-tabs-two-home" aria-selected="true" class="nav-link active" data-toggle="pill" href="#custom-tabs-two-home" id="custom-tabs-two-home-tab" role="tab">
                                            Veracruz
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a aria-controls="custom-tabs-two-profile" aria-selected="false" class="nav-link" data-toggle="pill" href="#custom-tabs-two-profile" id="custom-tabs-two-profile-tab" role="tab">
                                            Otras Entidades Federativas
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-two-tabContent">
                                    <div aria-labelledby="custom-tabs-two-home-tab" class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel">
                                        <h4>
                                            <b>Estadísticas de usuarios por sexo</b>
                                        </h4>
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
                                                    <button class="btn btn-danger o-fondo-1" type="button" data-target="#modalVisorPDFUsuariosAPP" data-toggle="modal">
                                                        <i class="fas fa-file-pdf"></i>
                                                        <b>Generar PDF</b>                    
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card borde-ople">
                                            <div class="card-body">
                                                <h4>
                                                    <b>Usuarios de la app móvil por rango de edades</b>                
                                                </h4>
                                                <table class="table table-striped table-bordered" id="estadisticaUsuarios" style="width:100%">
                                                    <thead>
                                                        <tr align="center">
                                                            <th>
                                                                Rangos de edad
                                                            </th>
                                                            <th>
                                                                Total de usuarios
                                                            </th>
                                                            <th>
                                                                Porcentaje
                                                            </th>
                                                            <th>
                                                                Total de Mujeres
                                                            </th>
                                                            <th>
                                                                Total de Hombres
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($estadisticas as $esta)
                                                            <tr>
                                                                <td>
                                                                    {{ $esta['rango'] }} años
                                                                </td>
                                                                <td align="center">
                                                                    {{ $esta['Usuarios'] }}
                                                                </td>
                                                                <td align="center">
                                                                    {{ $esta['porcentaje'] }} %
                                                                </td>
                                                                <td align="center">
                                                                    {{ $esta['mujeres'] }}
                                                                </td>
                                                                <td align="center">
                                                                    {{ $esta['hombres'] }}
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
                                                                <b>{{ $hombres }}</b>
                                                            </td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-sm-9">
                                                    <figure class="highcharts-figure">
                                                        <div id="containerP"></div>
                                                        <p class="highcharts-description">
                                                            
                                                        </p>
                                                    </figure>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div aria-labelledby="custom-tabs-two-profile-tab" class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel">
                                        <h4>
                                            <b>Estadísticas de usuarios por sexo</b>
                                        </h4>
                                        <div class="row">        
                                            <div class="col-lg-3 col-6">
                                                <!-- small card -->
                                                <div class="small-box card-primary card-outline">
                                                    <div class="inner">
                                                        <p><b>Usuarios Registrados</b></p>

                                                        <h3 class="o-color-primario">{{ $numeroUsuariosOEF }}</h3>                    
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
                                                        <h3 class="o-color-primario">{{ $mujeresOEF }} - {{ $porcentajeMujeresOEF }}<sup style="font-size: 20px">%</sup></h3>                    
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
                                                        <h3 class="o-color-primario">{{ $hombresOEF }} - {{ $porcentajeHombresOEF }}<sup style="font-size: 20px">%</sup></h3>                    
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
                                                    <button class="btn btn-danger o-fondo-1" type="button" data-target="#modalVisorPDFUsuariosAPPOEF" data-toggle="modal">
                                                        <i class="fas fa-file-pdf"></i>
                                                        <b>Generar PDF</b>                    
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card borde-ople">
                                            <div class="card-body">
                                                <h4>
                                                    <b>Usuarios de la app móvil por rango de edades</b>                
                                                </h4>
                                                <table class="table table-striped table-bordered" id="estadisticaUsuariosOEF" style="width:100%">
                                                    <thead>
                                                        <tr align="center">
                                                            <th>
                                                                Rangos de edad
                                                            </th>
                                                            <th>
                                                                Total de usuarios
                                                            </th>
                                                            <th>
                                                                Porcentaje
                                                            </th>
                                                            <th>
                                                                Total de Mujeres
                                                            </th>
                                                            <th>
                                                                Total de Hombres
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($estadisticasOEF as $esta)
                                                            <tr>
                                                                <td>
                                                                    {{ $esta['rango'] }} años
                                                                </td>
                                                                <td align="center">
                                                                    {{ $esta['Usuarios'] }}
                                                                </td>
                                                                <td align="center">
                                                                    {{ $esta['porcentaje'] }} %
                                                                </td>
                                                                <td align="center">
                                                                    {{ $esta['mujeres'] }}
                                                                </td>
                                                                <td align="center">
                                                                    {{ $esta['hombres'] }}
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
                                                                <b>{{ $numeroUsuariosOEF }}</b>
                                                            </td>
                                                            <td align="center">
                                                                <b>100 %</b>
                                                            </td>
                                                            <td align="center">
                                                                <b>{{ $mujeresOEF }}</b>
                                                            </td>
                                                            <td align="center">
                                                                <b>{{ $hombresOEF }}</b>
                                                            </td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-sm-9">
                                                    <figure class="highcharts-figure">
                                                        <div id="containerPEOF"></div>
                                                        <p class="highcharts-description">
                                                            
                                                        </p>
                                                    </figure>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalVisorPDFUsuariosAPP" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-xl">
            <div class="modal-content card-primary card-outline">
                <div class="modal-header o-fondo-2">
                    <h4 class="modal-title">Estadísticas sobre los usuarios de la aplicación móvil</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p> <iframe width="100%" height="800" id="VisorPDFUsuariosAPP"></iframe> </p>
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

    <div class="modal fade" id="modalVisorPDFUsuariosAPPOEF" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-xl">
            <div class="modal-content card-primary card-outline">
                <div class="modal-header o-fondo-2">
                    <h4 class="modal-title">Estadísticas sobre los usuarios de la aplicación móvil</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p> <iframe width="100%" height="800" id="VisorPDFUsuariosAPPOEF"></iframe> </p>
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
@extends('layouts.app')

@section('content')
<section class="content-header pt-5">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    
                </h1>
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
    </div>
    <div class="card borde-ople">
        <div class="card-body">
            <table class="table table-striped table-bordered dt-responsive nowrap" id="example" style="width:100%">
                <thead>
                    <tr>
                        <th>
                            Rangos de edad
                        </th>
                        <th>
                            Usuarios
                        </th>
                        <th>
                            Porcentaje
                        </th>
                        <th>
                            Mujeres
                        </th>
                        <th>
                            Hombres
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($estadisticas as $esta)
                        {{-- @foreach ($esta as $element) --}}
                            <tr>
                                <td>
                                    {{ $esta['rango'] }} años
                                </td>
                                <td>
                                    {{ $esta['Usuarios'] }}
                                </td>
                                <td>
                                    {{ $esta['porcentaje'] }} %
                                </td>
                                <td>
                                    {{ $esta['mujeres'] }}
                                </td>
                                <td>
                                    {{ $esta['hombres'] }}
                                </td>
                            </tr>
                        {{-- @endforeach --}}
                        
                    @endforeach
                    <tr>
                        <td>
                            <b>TOTALES</b>
                        </td>
                        <td>
                            <b>{{ $numeroUsuarios }}</b>
                        </td>
                        <td>
                            <b>100%</b>
                        </td>
                        <td>
                            <b>{{ $mujeres }}</b>
                        </td>
                        <td>
                            <b>{{ $hombres }}</b>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</section>

@endsection
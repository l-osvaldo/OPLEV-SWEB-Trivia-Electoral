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
                        Notificaciones
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
            </div>
        </div>

        {{-- <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box card-primary card-outline">
                <div class="inner">
                    <p><b>Mujeres</b></p>
                    <h3 class="o-color-primario">{{ $mujeres }} - {{ $porcentajeMujeres }}<sup style="font-size: 20px">%</sup></h3>                    
                </div>
                <div class="icon">
                    <i class="fas fa-female o-color-primario"></i>
                </div>
            </div>
        </div> --}}
        {{-- <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box card-primary card-outline">
                <div class="inner">
                    <p><b>Hombres</b></p>
                    <h3 class="o-color-primario">{{ $hombres }} - {{ $porcentajeHombres }}<sup style="font-size: 20px">%</sup></h3>                    
                </div>
                <div class="icon">
                    <i class="fas fa-male o-color-primario"></i>
                </div>
            </div>
        </div> --}}       
    </div>

    <div class="card borde-ople">
        <div class="card-body">
            <h4>
                <b>Notificaciones</b>                
            </h4>
            <table class="table table-striped table-bordered" id="notificacionesTable" style="width:100%">
                <thead>
                    <tr align="center">
                        <th>
                            Nombre del usuario
                        </th>
                        <th>
                            Correo electrónico
                        </th>
                        <th>
                            Municipio
                        </th>
                        <th>
                            Entidad Federativa
                        </th>
                        <th>
                            Fecha
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allNotificaciones as $notificacion)
                        <tr>
                            <td>
                                {{ $notificacion->nombre }}
                            </td>
                            <td>
                                {{ $notificacion->email }}
                            </td>
                            <td align="center">
                                {{ $notificacion->estado == 'VERACRUZ' ? $notificacion->municipio : ' -- '  }} 
                            </td>
                            <td>
                                {{ $notificacion->estado }}
                            </td>
                            <td>
                                {{ Carbon\Carbon::parse($notificacion->created_at)->format('l, d \d\e F \d\e\l Y \| g:i A') }} 
                            </td>
                        </tr>
                        
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>   

</section>

@endsection
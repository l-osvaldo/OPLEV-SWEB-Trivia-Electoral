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
                        Listado de Usuarios
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
                    <h3 class="o-color-primario">{{ $porcentajeMujeres }}<sup style="font-size: 20px">%</sup> - {{ $mujeres }}</h3>                    
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
                    <h3 class="o-color-primario">{{ $porcentajeHombres }}<sup style="font-size: 20px">%</sup> - {{ $hombres }}</h3>                    
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
                            Nombre usuario
                        </th>
                        <th>
                            Correo electrónico
                        </th>
                        <th>
                            Edad/Genero
                        </th>
                        <th>
                            Municipio
                        </th>
                        <th>
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuariosApp as $usuarioApp)
                        <tr>
                            <td>
                                {{ $usuarioApp->nombre }}
                            </td>
                            <td>
                                {{ $usuarioApp->email }}
                            </td>
                            <td>
                                {{ $usuarioApp->edad }} años / {{ $usuarioApp->sexo == 'm' ? "Masculino" : "Femenino"  }}
                            </td>
                            <td>
                                {{ $usuarioApp->municipio }}
                            </td>
                            <td align="center" class="middletd">
                                <div class="dropdown">
                                    <button aria-expanded="false" aria-haspopup="true" class="btn-dropmenu btn-sm dropdown-toggle" data-toggle="dropdown" id="dropdownMenuButton" type="button">
                                        <i class="fas fa-bars">
                                        </i>
                                    </button>
                                    <div aria-labelledby="dropdownMenuButton" class="dropdown-menu dropmenuPersonalizado2">
                                        <div aria-label="Basic example" class="btn-group" role="group">
                                            <button class="btn btn-success btn-acciones" data-target="#modalEditarPregunta" data-toggle="modal">
                                                <a data-placement="top" data-toggle="tooltip" href="#" style="color: #fff;" title="Editar Usuario">
                                                    <i class="fas fa-pen">
                                                    </i>
                                                </a>
                                            </button>
                                            <button class="btn btn-danger deletePregunta btn-acciones">
                                                <a data-placement="top" data-toggle="tooltip" href="#" style="color: #fff;" title="Eliminar Usuario">
                                                    <i class="fas fa-times">
                                                    </i>
                                                </a>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</section>

@endsection
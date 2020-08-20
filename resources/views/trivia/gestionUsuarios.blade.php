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
                            Nombre usuario
                        </th>
                        <th>
                            Correo electrónico
                        </th>
                        <th>
                            Edad/Género
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
                                {{ $usuarioApp->edad }} años / {{ $usuarioApp->sexo == 'M' ? "Masculino" : "Femenino"  }}
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
                                            <button class="btn btn-success btn-acciones" data-id="{{ encrypt_decrypt('encrypt',$usuarioApp->id) }}" data-nombre="{{ $usuarioApp->nombre }}" data-edad="{{ $usuarioApp->edad }}" data-genero="{{ $usuarioApp->sexo }}" data-municipio="{{ $usuarioApp->municipio }}" data-target="#modalEditarUsuariosAPP" data-toggle="modal">
                                                <a data-placement="top" data-toggle="tooltip" href="#" style="color: #fff;" title="Editar Usuario">
                                                    <i class="fas fa-pen">
                                                    </i>
                                                </a>
                                            </button>
                                            <button class="btn btn-danger deleteUsuarioApp btn-acciones" data-id="{{ encrypt_decrypt('encrypt',$usuarioApp->id) }}">
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

    {{-- Modal para editar usuarios APP --}}
    <div class="modal fade" data-backdrop="static" data-keyboard="false" id="modalEditarUsuariosAPP">
        <div class="modal-dialog modal-lg">
            <div class="modal-content card-primary card-outline">
                <div class="modal-header o-fondo-2">
                    <h4 class="modal-title">
                        Editar usuario de la app
                    </h4>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        <span aria-hidden="true">
                            ×
                        </span>
                    </button>
                </div>
                <form id="formeUsuariosAPPEditar">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <input type="hidden" name="editUsuarioAPPId" id="editUsuarioAPPId">
                        <label class="o-form-label" for="evento_fecha">
                            Nombre del usuario:
                        </label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-user">
                                    </i>
                                </span>
                            </div>
                            <input autocomplete="off" class="form-control validacion-o" data-inputname="nombre del usuario" data-type="mediumText" id="nombreUsuarioAPPEdit" maxlength="50" minlength="5" name="nombreUsuarioAPPEdit" placeholder="Nombre del usuario" type="text">
                            </input>
                            <div class="boxMesNum">
                                <div class="errorMessage" id="error-nombreUsuarioAPPEdit"></div>
                                <div class="stringNumber" id="string-nombreUsuarioAPPEdit">
                                    0
                                </div>
                            </div>
                        </div>  

                        <div class="row">
                            <div class="col-sm-4">
                                <label class="o-form-label" for="evento_fecha">
                                    Edad del usuario:
                                </label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-hashtag"></i>
                                        </span>
                                    </div>
                                    <input autocomplete="off" class="form-control validacion-o" data-inputname="edad del usuario" data-type="basicNumber" id="edadUsuarioAPPEdit" maxlength="3" minlength="1" name="edadUsuarioAPPEdit" placeholder="Edad del usuario" type="basicNumber">
                                    </input>
                                    <div class="boxMesNum">
                                        <div class="errorMessage" id="error-edadUsuarioAPPEdit"></div>
                                        <div class="stringNumber" id="string-edadUsuarioAPPEdit">
                                            0
                                        </div>
                                    </div>
                                </div> 
                            </div>
                            <div class="col-sm-4">
                                <label class="o-form-label" for="evento_fecha">
                                    Género del usuario:
                                </label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-venus-mars"></i>
                                        </span>
                                    </div>
                                    <select autocomplete="off" class="form-control validacion-o" data-inputname="género del usuario" data-type="list" id="generoUsuarioAPP" name="fache" placeholder="lista">
                                        <option disabled="" selected="" value="">
                                            Selecciona el género
                                        </option>
                                        <option value="F">
                                            Femenino
                                        </option>
                                        <option value="M">
                                            Masculino
                                        </option>
                                    </select>
                                    <div class="boxMesNum">
                                        <div class="errorMessage" id="error-generoUsuarioAPP"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label class="o-form-label" for="evento_fecha">
                                    Municipio:
                                </label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-puzzle-piece"></i>
                                        </span>
                                    </div>
                                    <select autocomplete="off" class="form-control validacion-o" data-inputname="municipio" data-type="list" id="municipioUsuarioAPP" name="fache" placeholder="lista">
                                        <option disabled="" selected="" value="">
                                            Selecciona el municipio
                                        </option>
                                        @foreach ($municipios as $municipio)
                                            <option value="{{ $municipio->nombrempio }}">
                                                {{ $municipio->nombrempio }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="boxMesNum">
                                        <div class="errorMessage" id="error-municipioUsuarioAPP"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button class="btn btn-default" data-dismiss="modal" type="button">
                            Cerrar
                        </button>                        
                        <button class="btn btn-primary btn-submit-o o-fondo-1" data-form="formeUsuariosAPPEditar" type="button" id="btnCrearEmpleado" onclick="editarUsuarioAPP(event)">
                            Guardar
                        </button> 
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

</section>

@endsection
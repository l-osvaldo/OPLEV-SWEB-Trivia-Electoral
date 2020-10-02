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
                                            <b>Estadísticas del Estado de Veracruz</b>
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
                                                                Estatus
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
                                                                    <button class="btn {{ $usuarioApp->status === 1 ? 'btn-success' : 'btn-danger' }} btn-sm btn-style estatusBtnUsuario" data-id="{{ encrypt_decrypt('encrypt',$usuarioApp->id) }}" data-status="{{ $usuarioApp->status }}">
                                                                        {{ $usuarioApp->status === 1 ? 'Activado' : 'Desactivado' }}
                                                                    </button>
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
                                                                                {{-- <button class="btn btn-danger deleteUsuarioApp btn-acciones" data-id="{{ encrypt_decrypt('encrypt',$usuarioApp->id) }}">
                                                                                    <a data-placement="top" data-toggle="tooltip" href="#" style="color: #fff;" title="Eliminar Usuario">
                                                                                        <i class="fas fa-times">
                                                                                        </i>
                                                                                    </a>
                                                                                </button> --}}
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
                                    </div>
                                    <div aria-labelledby="custom-tabs-two-profile-tab" class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel">
                                        <h4>
                                            <b>Estadísticas de Otras Entidades Federativas</b>
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
                                        </div>
                                        <div class="card borde-ople">
                                            <div class="card-body">
                                                <table class="table table-striped table-bordered dt-responsive nowrap" id="example2" style="width:100%">
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
                                                                Entidad Federativa
                                                            </th>
                                                            <th>
                                                                Estatus
                                                            </th>
                                                            <th>
                                                                Acciones
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($usuariosAppOEF as $usuarioApp)
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
                                                                    {{ $usuarioApp->estado }}
                                                                </td>
                                                                <td align="center" class="middletd">
                                                                    <button class="btn {{ $usuarioApp->status === 1 ? 'btn-success' : 'btn-danger' }} btn-sm btn-style estatusBtnUsuario" data-id="{{ encrypt_decrypt('encrypt',$usuarioApp->id) }}" data-status="{{ $usuarioApp->status }}">
                                                                        {{ $usuarioApp->status === 1 ? 'Activado' : 'Desactivado' }}
                                                                    </button>
                                                                </td>
                                                                <td align="center" class="middletd">
                                                                    <div class="dropdown">
                                                                        <button aria-expanded="false" aria-haspopup="true" class="btn-dropmenu btn-sm dropdown-toggle" data-toggle="dropdown" id="dropdownMenuButton" type="button">
                                                                            <i class="fas fa-bars">
                                                                            </i>
                                                                        </button>
                                                                        <div aria-labelledby="dropdownMenuButton" class="dropdown-menu dropmenuPersonalizado2">
                                                                            <div aria-label="Basic example" class="btn-group" role="group">
                                                                                <button class="btn btn-success btn-acciones" data-id="{{ encrypt_decrypt('encrypt',$usuarioApp->id) }}" data-nombre="{{ $usuarioApp->nombre }}" data-edad="{{ $usuarioApp->edad }}" data-genero="{{ $usuarioApp->sexo }}" data-estado="{{ $usuarioApp->estado }}" data-target="#modalEditarUsuariosAPPOEF" data-toggle="modal">
                                                                                    <a data-placement="top" data-toggle="tooltip" href="#" style="color: #fff;" title="Editar Usuario">
                                                                                        <i class="fas fa-pen">
                                                                                        </i>
                                                                                    </a>
                                                                                </button>
                                                                                {{-- <button class="btn btn-danger deleteUsuarioApp btn-acciones" data-id="{{ encrypt_decrypt('encrypt',$usuarioApp->id) }}">
                                                                                    <a data-placement="top" data-toggle="tooltip" href="#" style="color: #fff;" title="Eliminar Usuario">
                                                                                        <i class="fas fa-times">
                                                                                        </i>
                                                                                    </a>
                                                                                </button> --}}
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

    {{-- Modal para editar usuarios APP --}}
    <div class="modal fade" data-backdrop="static" data-keyboard="false" id="modalEditarUsuariosAPP">
        <div class="modal-dialog modal-lg">
            <div class="modal-content card-primary card-outline">
                <div class="modal-header o-fondo-2">
                    <h4 class="modal-title">
                        Editar usuario de la app de Veracruz
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

    {{-- Modal para editar usuarios APP Otras Entidades Federativas--}}
    <div class="modal fade" data-backdrop="static" data-keyboard="false" id="modalEditarUsuariosAPPOEF">
        <div class="modal-dialog modal-lg">
            <div class="modal-content card-primary card-outline">
                <div class="modal-header o-fondo-2">
                    <h4 class="modal-title">
                        Editar usuario de la app de otras Entidades Federativas
                    </h4>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        <span aria-hidden="true">
                            ×
                        </span>
                    </button>
                </div>
                <form id="formeUsuariosAPPEditarOEF">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <input type="hidden" name="editUsuarioAPPIdOEF" id="editUsuarioAPPIdOEF">
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
                            <input autocomplete="off" class="form-control validacion-o" data-inputname="nombre del usuario" data-type="mediumText" id="nombreUsuarioAPPEditOEF" maxlength="50" minlength="5" name="nombreUsuarioAPPEditOEF" placeholder="Nombre del usuario" type="text">
                            </input>
                            <div class="boxMesNum">
                                <div class="errorMessage" id="error-nombreUsuarioAPPEditOEF"></div>
                                <div class="stringNumber" id="string-nombreUsuarioAPPEditOEF">
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
                                    <input autocomplete="off" class="form-control validacion-o" data-inputname="edad del usuario" data-type="basicNumber" id="edadUsuarioAPPEditOEF" maxlength="3" minlength="1" name="edadUsuarioAPPEditOEF" placeholder="Edad del usuario" type="basicNumber">
                                    </input>
                                    <div class="boxMesNum">
                                        <div class="errorMessage" id="error-edadUsuarioAPPEditOEF"></div>
                                        <div class="stringNumber" id="string-edadUsuarioAPPEditOEF">
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
                                    <select autocomplete="off" class="form-control validacion-o" data-inputname="género del usuario" data-type="list" id="generoUsuarioAPPOEF" name="fache" placeholder="lista">
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
                                        <div class="errorMessage" id="error-generoUsuarioAPPOEF"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label class="o-form-label" for="evento_fecha">
                                    Entidad Federativa:
                                </label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-puzzle-piece"></i>
                                        </span>
                                    </div>
                                    <select autocomplete="off" class="form-control validacion-o" data-inputname="municipio" data-type="list" id="EstadoUsuarioAPPOEF" name="fache" placeholder="lista">
                                        <option disabled="" selected="" value="">
                                            Selecciona la Entidad Federativa
                                        </option>
                                        @foreach ($estados as $estado)
                                            <option value="{{ $estado->nombre }}">
                                                {{ $estado->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="boxMesNum">
                                        <div class="errorMessage" id="error-EstadoUsuarioAPPOEF"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button class="btn btn-default" data-dismiss="modal" type="button">
                            Cerrar
                        </button>                        
                        <button class="btn btn-primary btn-submit-o o-fondo-1" data-form="formeUsuariosAPPEditarOEF" type="button" id="btnCrearEmpleado" onclick="editarUsuarioAPPOEF(event)">
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
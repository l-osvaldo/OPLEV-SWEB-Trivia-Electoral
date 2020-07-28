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
                        Listado de Preguntas
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>

<section class="content">
    <div align="right" class="margin-b">
        <button class="btn btn-danger o-fondo-1" data-target="#modalNuevaPregunta" data-toggle="modal" type="button">
            <i class="fas fa-plus">
            </i>
            Nueva Pregunta
        </button>
    </div>
    <div class="card borde-ople">
        <div class="card-body">
            <table class="table table-striped table-bordered dt-responsive nowrap" id="dataTablePreguntas" style="width:100%">
                <thead>
                    <tr>
                        <th>
                            Pregunta
                        </th>
                        <th>
                            Opción A
                        </th>
                        <th>
                            Opción B
                        </th>
                        <th>
                            Opción C
                        </th>
                        <th>
                            Opción D
                        </th>
                        <th>
                            Respuesta
                        </th>
                        <th>
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($preguntas as $pregunta)
                        <tr>
                            <td>
                                {{ $pregunta->pregunta }}
                            </td>
                            <td>
                                {{ $pregunta->opcion_a }}
                            </td>
                            <td>
                                {{ $pregunta->opcion_b }}
                            </td>
                            <td>
                                {{ $pregunta->opcion_c }}
                            </td>
                            <td>
                                {{ $pregunta->opcion_d }}
                            </td>
                            <td>
                                {{ $pregunta->respuesta }}
                            </td>
                            <td align="center" class="middletd">
                                <div class="dropdown">
                                    <button aria-expanded="false" aria-haspopup="true" class="btn-dropmenu btn-sm dropdown-toggle" data-toggle="dropdown" id="dropdownMenuButton" type="button">
                                        <i class="fas fa-bars">
                                        </i>
                                    </button>
                                    <div aria-labelledby="dropdownMenuButton" class="dropdown-menu dropmenuPersonalizado2">
                                        <div aria-label="Basic example" class="btn-group" role="group">
                                            <button class="btn btn-success btn-acciones" data-id="{{ encrypt_decrypt('encrypt',$pregunta->id) }}" data-pregunta="{{ $pregunta->pregunta }}" data-opca ="{{ $pregunta->opcion_a }}" data-opcb ="{{ $pregunta->opcion_b }}" data-opcc ="{{ $pregunta->opcion_c }}" data-opcd ="{{ $pregunta->opcion_d }}" data-respuesta="{{ $pregunta->respuesta }}" data-target="#modalEditarPregunta" data-toggle="modal">
                                                <a data-placement="top" data-toggle="tooltip" href="#" style="color: #fff;" title="Editar Pregunta">
                                                    <i class="fas fa-pen">
                                                    </i>
                                                </a>
                                            </button>
                                            <button class="btn btn-danger deletePregunta btn-acciones" data-id="{{ encrypt_decrypt('encrypt',$pregunta->id) }}">
                                                <a data-placement="top" data-toggle="tooltip" href="#" style="color: #fff;" title="Eliminar Pregunta">
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

    {{-- Modal para crear preguntas --}}
    <div class="modal fade" data-backdrop="static" data-keyboard="false" id="modalNuevaPregunta">
        <div class="modal-dialog">
            <div class="modal-content card-primary card-outline">
                <div class="modal-header o-fondo-2">
                    <h4 class="modal-title">
                        Crear nueva pregunta
                    </h4>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        <span aria-hidden="true">
                            ×
                        </span>
                    </button>
                </div>
                <form id="formePregunta">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <label class="o-form-label" for="evento_fecha">
                            Pregunta:
                        </label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far">
                                        <b>¿</b>
                                    </i>
                                </span>
                            </div>                            
                            <textarea autocomplete="off" class="form-control validacion-o" data-inputname="Pregunta" data-type="advancedText" id="preguntaNueva" maxlength="500" minlength="5" name="preguntaNueva" placeholder="Pregunta" rows="3"></textarea>
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far">
                                        <b>?</b>
                                    </i>
                                </span>
                            </div>
                            <div class="boxMesNum">
                                <div class="errorMessage" id="error-preguntaNueva"></div>
                                <div class="stringNumber" id="string-preguntaNueva">
                                    0
                                </div>
                            </div>
                            
                        </div>

                        <label class="o-form-label" for="evento_fecha">
                            Opciones:
                        </label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="">
                                        A
                                    </i>
                                </span>
                            </div>
                            <input autocomplete="off" class="form-control validacion-o" data-inputname="Opción A" data-type="mediumText" id="opcion_a_nueva" maxlength="50" minlength="3" name="opcion_a_nueva" placeholder="Opción A" type="text">
                            </input>
                            <div class="boxMesNum">
                                <div class="errorMessage" id="error-opcion_a_nueva"></div>
                                <div class="stringNumber" id="string-opcion_a_nueva">
                                    0
                                </div>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="">
                                        B
                                    </i>
                                </span>
                            </div>
                            <input autocomplete="off" class="form-control validacion-o" data-inputname="Opción B" data-type="mediumText" id="opcion_b_nueva" maxlength="50" minlength="3" name="opcion_b_nueva" placeholder="Opción B" type="text">
                            </input>
                            <div class="boxMesNum">
                                <div class="errorMessage" id="error-opcion_b_nueva"></div>
                                <div class="stringNumber" id="string-opcion_b_nueva">
                                    0
                                </div>
                            </div>
                        </div>
                        
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="">
                                        C
                                    </i>
                                </span>
                            </div>
                            <input autocomplete="off" class="form-control validacion-o" data-inputname="Opción C" data-type="mediumText" id="opcion_c_nueva" maxlength="50" minlength="3" name="opcion_c_nueva" placeholder="Opción C" type="text">
                            </input>
                            <div class="boxMesNum">
                                <div class="errorMessage" id="error-opcion_c_nueva"></div>
                                <div class="stringNumber" id="string-opcion_c_nueva">
                                    0
                                </div>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="">
                                        D
                                    </i>
                                </span>
                            </div>
                            <input autocomplete="off" class="form-control validacion-o" data-inputname="Opción D" data-type="mediumText" id="opcion_d_nueva" maxlength="50" minlength="3" name="opcion_d_nueva" placeholder="Opción D" type="text">
                            </input>
                            <div class="boxMesNum">
                                <div class="errorMessage" id="error-opcion_d_nueva"></div>
                                <div class="stringNumber" id="string-opcion_d_nueva">
                                    0
                                </div>
                            </div>
                        </div>
                        
                        <label class="o-form-label" for="evento_fecha">
                            Respuesta correcta:
                        </label>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-reply"></i>
                                </span>
                            </div>
                            <select autocomplete="off" class="form-control validacion-o" data-inputname="Respuesta correcta" data-type="list" id="respuestaNueva" name="fache" placeholder="lista">
                                <option disabled="" selected="" value="">
                                    Selecciona la respuesta correcta
                                </option>
                                <option value="a">
                                    A
                                </option>
                                <option value="b">
                                    B
                                </option>
                                <option value="c">
                                    C
                                </option>
                                <option value="d">
                                    D
                                </option>
                            </select>
                            <div class="boxMesNum">
                                <div class="errorMessage" id="error-respuestaNueva"></div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button class="btn btn-default" data-dismiss="modal" type="button">
                            Cerrar
                        </button>                        
                        <button class="btn btn-primary btn-submit-o o-fondo-1" data-form="formePregunta" type="button" id="btnCrearEmpleado" onclick="registrarPregunta(event)">
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

    {{-- Modal para editar preguntas --}}
    <div class="modal fade" data-backdrop="static" data-keyboard="false" id="modalEditarPregunta">
        <div class="modal-dialog">
            <div class="modal-content card-primary card-outline">
                <div class="modal-header o-fondo-2">
                    <h4 class="modal-title">
                        Editar pregunta
                    </h4>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        <span aria-hidden="true">
                            ×
                        </span>
                    </button>
                </div>
                <form id="formePreguntaEditar">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <input type="hidden" name="editPreguntaId" id="editPreguntaId">
                        <label class="o-form-label" for="evento_fecha">
                            Pregunta:
                        </label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far">
                                        <b>¿</b>
                                    </i>
                                </span>
                            </div>
                            <textarea autocomplete="off" class="form-control validacion-o" data-inputname="Pregunta" data-type="advancedText" id="preguntaEditar" maxlength="500" minlength="5" name="preguntaEditar" placeholder="Pregunta" rows="3"></textarea>
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far">
                                        <b>?</b>
                                    </i>
                                </span>
                            </div>
                            <div class="boxMesNum">
                                <div class="errorMessage" id="error-preguntaEditar"></div>
                                <div class="stringNumber" id="string-preguntaEditar">
                                    0
                                </div>
                            </div>
                            
                        </div>

                        <label class="o-form-label" for="evento_fecha">
                            Opciones:
                        </label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="">
                                        A
                                    </i>
                                </span>
                            </div>
                            <input autocomplete="off" class="form-control validacion-o" data-inputname="Opción A" data-type="mediumText" id="opcion_a_editar" maxlength="50" minlength="3" name="opcion_a_editar" placeholder="Opción A" type="text">
                            </input>
                            <div class="boxMesNum">
                                <div class="errorMessage" id="error-opcion_a_editar"></div>
                                <div class="stringNumber" id="string-opcion_a_editar">
                                    0
                                </div>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="">
                                        B
                                    </i>
                                </span>
                            </div>
                            <input autocomplete="off" class="form-control validacion-o" data-inputname="Opción B" data-type="mediumText" id="opcion_b_editar" maxlength="50" minlength="3" name="opcion_b_editar" placeholder="Opción B" type="text">
                            </input>
                            <div class="boxMesNum">
                                <div class="errorMessage" id="error-opcion_b_editar"></div>
                                <div class="stringNumber" id="string-opcion_b_editar">
                                    0
                                </div>
                            </div>
                        </div>
                        
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="">
                                        C
                                    </i>
                                </span>
                            </div>
                            <input autocomplete="off" class="form-control validacion-o" data-inputname="Opción C" data-type="mediumText" id="opcion_c_editar" maxlength="50" minlength="3" name="opcion_c_editar" placeholder="Opción C" type="text">
                            </input>
                            <div class="boxMesNum">
                                <div class="errorMessage" id="error-opcion_c_editar"></div>
                                <div class="stringNumber" id="string-opcion_c_editar">
                                    0
                                </div>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="">
                                        D
                                    </i>
                                </span>
                            </div>
                            <input autocomplete="off" class="form-control validacion-o" data-inputname="Opción D" data-type="mediumText" id="opcion_d_editar" maxlength="50" minlength="3" name="opcion_d_editar" placeholder="Opción D" type="text">
                            </input>
                            <div class="boxMesNum">
                                <div class="errorMessage" id="error-opcion_d_editar"></div>
                                <div class="stringNumber" id="string-opcion_d_editar">
                                    0
                                </div>
                            </div>
                        </div>
                        
                        <label class="o-form-label" for="evento_fecha">
                            Respuesta correcta:
                        </label>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-reply"></i>
                                </span>
                            </div>
                            <select autocomplete="off" class="form-control validacion-o" data-inputname="Respuesta correcta" data-type="list" id="respuestaEditar" name="fache" placeholder="lista">
                                <option disabled="" selected="" value="">
                                    Selecciona la respuesta correcta
                                </option>
                                <option value="a">
                                    A
                                </option>
                                <option value="b">
                                    B
                                </option>
                                <option value="c">
                                    C
                                </option>
                                <option value="d">
                                    D
                                </option>
                            </select>
                            <div class="boxMesNum">
                                <div class="errorMessage" id="error-respuestaEditar"></div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button class="btn btn-default" data-dismiss="modal" type="button">
                            Cerrar
                        </button>                        
                        <button class="btn btn-primary btn-submit-o o-fondo-1" data-form="formePreguntaEditar" type="button" id="btnCrearEmpleado" onclick="editarPregunta(event)">
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
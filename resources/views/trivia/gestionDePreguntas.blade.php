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
    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-bordered dt-responsive nowrap" id="example" style="width:100%">
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
                            <td>
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</section>

@endsection
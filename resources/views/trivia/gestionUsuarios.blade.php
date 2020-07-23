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
    <div class="card">
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
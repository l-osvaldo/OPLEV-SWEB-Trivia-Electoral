@extends('layouts.app')

@section('content')
<section class="content-header pt-5">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    Listado de Usuarios de la Aplicación Móvil
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
                        Gestión de Usuarios
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
                            E-Mail
                        </th>
                        <th>
                            Edad
                        </th>
                        <th>
                            Genero
                        </th>
                        <th>
                            Municipio
                        </th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>

</section>

@endsection
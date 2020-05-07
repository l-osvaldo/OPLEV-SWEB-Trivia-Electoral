@extends('layouts.app')

@section('content')

<section class="content-header pt-5">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Formularios</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
          <li class="breadcrumb-item active">Formularios</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-6">
        <!-- general form elements -->
        <div class="card card-primary card-outline">
          <div class="card-header o-fondo-5">
            <h3 class="card-title">Formulario ejemplo</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form">
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1" class="o-form-label">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1" class="o-form-label">Contraseña</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Contraseña">
              </div>
              <div class="form-group">
                <label for="exampleInputFile" class="o-form-label">Adjuntar PDF</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="exampleInputFile">
                    <label class="custom-file-label" for="exampleInputFile">PDF</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text o-fondo-1" id="">Subir</span>
                  </div>
                </div>
              </div>
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Permanecer con la sesión activa</label>
              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary o-fondo-1">Enviar</button>
            </div>
          </form>
        </div>
        <!-- /.card -->
      </div>
  </section>
@endsection
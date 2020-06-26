@extends('layouts.app')

@section('content')
<script src='https://www.google.com/recaptcha/api.js'></script>

<section class="content-header pt-5">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Verificador de Sellos Digitales del OPLE</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
          <li class="breadcrumb-item active">Verificador</li>
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
            <h3 class="card-title">Verificación de sellos digitales</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form">
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1" class="o-form-label">IDENTIFICADOR ÚNICO DEL EMISOR</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="000000L18740145">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1" class="o-form-label">RFC DEL EMISOR</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="OPLE567834DD1">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1" class="o-form-label">FOLIO INTERNO</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder=" Zm5zSUh-VOUxE-ODNZS05S-TDV4V2-ZyUT09">
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
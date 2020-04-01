@extends('layouts.app')
@section('content')
<!-- Main content -->

<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2 mt-3">
          <div class="col-sm-6">
            <h1>Cuadros</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Cuadros</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<section class="content">
	<div class="container-fluid">
      <div class="row">
    
			<div class="card card-oplever card-outline">
				<div class="card-header">
					<h3 class="card-title">
						<i class="fas fa-edit"></i>
						Ejemplo 1
					</h3>
				</div>
				<div class="card-body">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				</div>
			</div>

      <div class="info-box mb-12 o-area-descripcion">
         <span class="info-box-icon elevation-1"><i class="fa fa-exclamation-circle o-area-descripcion-icon" aria-hidden="true"></i></span>
         <div class="info-box-content">
           <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
         </div>
      </div>
			
			<div class="card card-oplever">
				<div class="card-header">
					<h3 class="card-title">
						<i class="fas fa-edit"></i>
						Ejemplo 2
					</h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				</div>
				<!-- /.card-body -->
			</div>
			<!-- /.card -->
	
			<!-- ./col -->
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-text-width"></i>
                  Descripción Horizontal
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <dl class="row">
                  <dt class="col-sm-4">Lorem Ipsum</dt>
                  <dd class="col-sm-8">Lorem ipsum dolor sit amet.</dd>
                  <dt class="col-sm-4">Lorem Ipsum</dt>
                  <dd class="col-sm-8">Lorem ipsum dolor sit amet.</dd>
                  <dd class="col-sm-8 offset-sm-4">Lorem ipsum dolor sit amet.</dd>
                  <dt class="col-sm-4">Lorem Ipsum</dt>
                  <dd class="col-sm-8">Lorem ipsum dolor sit amet.</dd>
                  <dt class="col-sm-4">Lorem Ipsum</dt>
                  <dd class="col-sm-8">Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.
                  </dd>
                </dl>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- ./col -->
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-text-width"></i>
                  Texto Enfatizado
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <p class="lead">Enfatiza lo importante</p>

                <p class="text-success">Texto verde para enfatizar lo exitoso</p>

                <p class="text-info">Texto aqua para enfatizar la info</p>

                <p class="text-primary">Texto azul claro para enfatizar info (2)</p>

                <p class="text-danger">Texto rojo para enfatizar lo peligroso</p>

                <p class="text-warning">Texto amarillo para enfatizar una advertencia</p>

                <p class="text-muted">Texto apagado para enfásis en general</p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- ./col -->

        </div>
      </div>


</section>
@endsection
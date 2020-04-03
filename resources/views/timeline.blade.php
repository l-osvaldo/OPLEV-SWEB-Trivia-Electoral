@extends('layouts.app')

@section('content')


<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2 mt-3">
          <div class="col-sm-6">
            <h1>Línea de tiempo</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Línea de tiempo</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


<section class="content">
      <div class="container-fluid">
        
        <!-- Timelime example  -->
        <div class="row">
          <div class="col-md-12">
            <!-- The time line -->
            <div class="timeline">
              <!-- timeline time label -->
              <div class="time-label">
                <span class="bg-red">01 Ene. 2020</span>
              </div>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <div>
                <i class="fas fa-envelope bg-blue"></i>
                <div class="timeline-item">
                  <span class="time o-color-primario"><i class="fas fa-clock"></i> 12:05</span>
                  <h3 class="timeline-header"><a href="#" class="o-color-primario">Correo recibido</a></h3>

                  <div class="timeline-body">
                   Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat...
                  </div>
                  <div class="timeline-footer">
                    <a class="btn btn-primary btn-sm">Leer</a>
                    <a class="btn btn-danger btn-sm">Borrar</a>
                  </div>
                </div>
              </div>
              <!-- END timeline item -->
              <!-- timeline item -->
              <div>
                <i class="fas fa-user bg-green"></i>
                <div class="timeline-item">
                  <span class="time o-color-primario"><i class="fas fa-clock"></i>Hace 5 min.</span>
                  <h3 class="timeline-header no-border"><a href="#" class="o-color-primario">Nombre Usuario </a>ha realizado una acción</h3>
                </div>
              </div>
              <!-- END timeline item -->
              <!-- timeline item -->
              <div>
                <i class="fas fa-comments bg-yellow"></i>
                <div class="timeline-item">
                  <span class="time o-color-primario"><i class="fas fa-clock"></i>Hace 27 min.</span>
                  <h3 class="timeline-header"><a href="#" class="o-color-primario">Nombre Usuario </a>realizo comentario</h3>
                  <div class="timeline-body">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                  </div>
                  <div class="timeline-footer">
                    <a class="btn btn-warning btn-sm">Ver comentario</a>
                  </div>
                </div>
              </div>
              <!-- END timeline item -->
              <!-- timeline time label -->
              <div class="time-label">
                <span class="bg-green">01 Ene. 2020</span>
              </div>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <div>
                <i class="fa fa-camera bg-purple"></i>
                <div class="timeline-item">
                  <span class="time o-color-primario"><i class="fas fa-clock"></i>Hace 2 días</span>
                  <h3 class="timeline-header"><a href="#" class="o-color-primario">Nombre Usuario </a>adjunto estos archivos</h3>
                  <div class="timeline-body">
                    <img src="http://placehold.it/150x100" alt="...">
                    <img src="http://placehold.it/150x100" alt="...">
                    <img src="http://placehold.it/150x100" alt="...">
                    <img src="http://placehold.it/150x100" alt="...">
                    <img src="http://placehold.it/150x100" alt="...">
                  </div>
                </div>
              </div>
              <!-- END timeline item -->
              <!-- timeline item -->
              <!--div>
                <i class="fas fa-video bg-maroon"></i>

                <div class="timeline-item">
                  <span class="time o-color-primario"><i class="fas fa-clock"></i> 5 days ago</span>

                  <h3 class="timeline-header"><a href="#" class="o-color-primario">Mr. Doe</a> shared a video</h3>

                  <div class="timeline-body">
                    <div class="embed-responsive embed-responsive-16by9">
                      <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/tMWkeBIohBs" frameborder="0" allowfullscreen=""></iframe>
                    </div>
                  </div>
                  <div class="timeline-footer">
                    <a href="#" class="btn btn-sm bg-maroon o-fondo-primario">See comments</a>
                  </div>
                </div>
              </div-->
              <!-- END timeline item -->
              <div>
                <i class="fas fa-clock bg-gray"></i>
              </div>
            </div>
          </div>
          <!-- /.col -->
        </div>
      </div>
      <!-- /.timeline -->

    </section>

@endsection
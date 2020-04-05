@extends('layouts.app')

@section('content')


    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2 mt-3">
          <div class="col-sm-6">
            <h1>Cintillas</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Cintillas</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary card-outline">
              <div class="card-header o-fondo-1">
                <h3 class="card-title">Rubro</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-4">
                    <div class="position-relative p-3 o-fondo-2" style="height: 180px">
                      <div class="ribbon-wrapper">
                        <div class="ribbon bg-primary o-fondo-1">
                          Texto
                        </div>
                      </div>
                      Cintialla Default <br>
                      <small>.ribbon-wrapper.ribbon-lg .ribbon</small>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="position-relative p-3 o-fondo-2" style="height: 180px">
                      <div class="ribbon-wrapper ribbon-lg">
                        <div class="ribbon bg-info o-fondo-6">
                          Texto extra
                        </div>
                      </div>
                      Cintilla larga <br>
                      <small>.ribbon-wrapper.ribbon-lg .ribbon</small>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="position-relative p-3 o-fondo-2" style="height: 180px">
                      <div class="ribbon-wrapper ribbon-xl">
                        <div class="ribbon bg-secondary">
                          Texto extra ejemplo
                        </div>
                      </div>
                      Cintilla Texto Largo <br>
                      <small>.ribbon-wrapper.ribbon-xl .ribbon</small>
                    </div>
                  </div>
                </div>
                <div class="row mt-4">
                  <div class="col-sm-4">
                    <div class="position-relative p-3 o-fondo-2" style="height: 180px">
                      <div class="ribbon-wrapper ribbon-lg">
                        <div class="ribbon bg-success text-lg o-fondo-3">
                          Texto
                        </div>
                      </div>
                      Cintilla Texto Alto <br>
                      <small>.ribbon-wrapper.ribbon-lg .ribbon.text-lg</small>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="position-relative p-3 o-fondo-2" style="height: 180px">
                      <div class="ribbon-wrapper ribbon-xl">
                        <div class="ribbon bg-warning text-lg o-fondo-4">
                          Texto
                        </div>
                      </div>
                      Cintilla Texto Medio <br>
                      <small>.ribbon-wrapper.ribbon-xl .ribbon.text-lg</small>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="position-relative p-3 o-fondo-2" style="height: 180px">
                      <div class="ribbon-wrapper ribbon-xl">
                        <div class="ribbon bg-danger text-xl o-fondo-6">
                          Texto
                        </div>
                      </div>
                      Cintilla Texto Extra Alto <br>
                      <small>.ribbon-wrapper.ribbon-xl .ribbon.text-xl</small>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->


@endsection
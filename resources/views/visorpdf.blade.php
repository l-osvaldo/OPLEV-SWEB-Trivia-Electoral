@extends('layouts.app')
@section('content')
<!-- Main content -->
<!-- Content Header (Page header) -->
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2 mt-3">
      <div class="col-sm-6">
        <h1>Visor PDF</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
          <li class="breadcrumb-item active">Visor PDF</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>


         




<section class="content">
  <div class="container-fluid">
    <div class="row">





      <div class="col-6">
        <!--div class="div-pdf"-->
          <div class="card card-primary card-outline">
            <div class="card-header o-fondo-5">
              <h3 class="card-title">Ejemplo de Visor PDF Expandible</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body container-pdf" id="pdfExample">
              <script src="/js/pdfobject.js"></script>
              <script>
                var options = {
                  pdfOpenParams: {
                    view: 'FitV',
                    pagemode: 'thumbs',
                    search: 'lorem ipsum'
                  }
                };
              PDFObject.embed("{{ url('/docs/PDFIlustrativo.pdf')}}", "#pdfExample", options);</script>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        <!--/div-->
      </div>




      <div class="col-md-6">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-edit"></i>
                  Ventana modal ejemplo
                </h3>
              </div>
              <div class="card-body">
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-xl">
                  Invocar ventana
                </button>
                
              </div>
              <!-- /.card -->
            </div>

          </div>
          <!-- /.col -->


      




    </div>
  </div>
</section>

<div class="modal fade" id="modal-xl">
        <div class="modal-dialog modal-xl">
          <div class="modal-content card-primary card-outline">
            <div class="modal-header o-fondo-2">
              <h4 class="modal-title">Rubro o tema</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <p> <iframe src="/docs/PDFIlustrativo.pdf" width="100%" height="800"></iframe> </p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

@endsection
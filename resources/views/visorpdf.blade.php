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
      <div class="col">
        <div class="div-pdf">
          <div class="card card-oplever">
            <div class="card-header">
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
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
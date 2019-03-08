@extends('layouts.app')

@section('content')

  <section class="content-header">
    <h3>
      <small>Actividades Adicionales. Captura y Reportes</small>
    </h3>
  </section>

  <!-- Start Section -->
  <section class="content">
    <div class="row">
      @include('pages.adicionales._form')
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->


@endsection

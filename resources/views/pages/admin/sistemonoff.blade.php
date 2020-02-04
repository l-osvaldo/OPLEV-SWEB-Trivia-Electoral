@extends('layouts.app')

@section('content')


  <!--section class="content-header">
    <h3>
      <small>Reporte Trimestral del POA 2019</small>
    </h3>
  </section-->

  <section>

  <!-- Start Section -->
<section class="content" style="padding-top: 2em;">
  <div class="row justify-content-md-center">

    <div class="col-md-5">

    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <label class="input-group-text" for="inputGroupSelect01">SIPSEI</label>
    </div>
    <select class="custom-select" id="selectOnOff">
        <option selected>---</option>
        <option value="0">Deshabilitado</option>
        <option value="1">Habilitado</option>
        <option value="2">Cerrado</option>
    </select>

    </div>
  </div>
</section>

<!-- /.content-wrapper -->


  </section>



@endsection
@extends('layouts.app')

@section('content')


  <!-- Start Section -->
<section class="content" style="padding-top: 2em;">
    <div class="container">

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">Observaciones</li>
    <li class="breadcrumb-item" style="color: #EA0D94;">Estadístico</li>
  </ol>
</nav>

<div class="col-md-12 form-row" style="margin: 1em 0 1em 0;padding: 1em 0;background: #eceff1;padding:1%;box-shadow: 0 2px 4px rgba(0,0,0,.15);">

    <div class="col-md-12" style="margin-bottom: 1em;">
      <label>1. Seleccione un Trimestre</label>
      <select class="form-control validar" id="trimestre" name="trimestre" data-error="1">
          <option value="">Trimestre</option>
        @foreach( $trimestres as $trimestre )
          <option value="{{$trimestre->id}}">{{$trimestre->trimestre}}</option>
         @endforeach
      </select>
  </div>


 <button class="btn btn-primary EnaBtn" id="btnEstadistico" name="btnEstadistico" disabled="true">Buscar Trimestre</button> 
</div>

<h4 id="estTotal"></h4>
 
<table border="3" style="font-size: 1em;text-align: center;border:solid 2px #f4f6f9; width: 100%;background: #fff;">

          
            <tr class="avances" style="background: #fce4ec;">
              <th>Tipo de Observación</th>
              <th>Total</th>
              <th>Porcentaje</th>
            </tr>

          <tbody id="resultEstadistico">

          </tbody>
        </table>


</div>
<!-- /.content-wrapper -->
</section>



@endsection
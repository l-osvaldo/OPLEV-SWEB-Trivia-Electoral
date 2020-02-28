@extends('layouts.app')

@section('content')


  <!-- Start Section -->
<section class="content" style="padding-top: 2em;">
    <div class="container">

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">Observaciones</li>
    <li class="breadcrumb-item" style="color: #EA0D94;">Búsqueda</li>
  </ol>
</nav>

<div class="col-md-12 form-row" style="margin: 1em 0 1em 0;padding: 1em 0;background: #eceff1;padding:1%;box-shadow: 0 2px 4px rgba(0,0,0,.15);">
    
    <div class="col-md-6" style="margin-bottom: 1em;">
      <label>1. Seleccione un Área</label>
        <input class="form-control validar" data-error="1" type="text" name="palabra" id="palabra" placeholder="Buscar">
      </div>

    <div class="col-md-6" style="margin-bottom: 1em;">
      <label>2. Seleccione un Trimestre</label>
      <select class="form-control" id="trimestre" name="trimestre">
        @foreach( $trimestres as $trimestre )
          <option selected value="{{$trimestre->id}}">{{$trimestre->trimestre}}</option>
         @endforeach
      </select>
  </div>


 <button class="btn btn-primary EnaBtn" id="btnBuscarPalabra" name="btnBuscarPalabra" disabled="true">Buscar Trimestral</button> 
</div>

 
<table border="3" style="font-size: .9em;text-align: center;border:solid 2px #f4f6f9; width: 100%;background: #fff;">

          
            <tr class="avances" style="background: #fce4ec;font-size: .8em;">
              <th rowspan="3" class="tittabla">No. <br>ACT.</th>
              <th rowspan="3" class="tittabla">ACTIVIDAD</th>
              <th colspan="2" class="tittabla">META ANUAL</th>
              <th rowspan="3" class="tittabla">PERIODO <br>CALENDARIZADO</th>
              <th colspan="3" class="tittabla">AVANCE TRIMESTRAL</th>
              <th colspan="4" class="tittabla">AVANCE ACUMULADO</th>
              <th rowspan="3" class="tittabla">OBSERVACIONES</th>
            </tr>
            <tr class="avances" style="background: #fce4ec;font-size: .8em;">
              <th rowspan="2" class="tittabla">UNIDAD DE<br>MEDIDA</th>
              <th rowspan="2" class="tittabla">CANTIDAD</th>
              <th rowspan="2" class="tittabla">PROGRAMADO</th>
              <th rowspan="2" class="tittabla">REALIZADO</th>
              <th rowspan="2" class="tittabla">VARIACION %</th>
              <th rowspan="2" class="tittabla">PROGRAMADO</th>
              <th rowspan="2" class="tittabla">REALIZADO</th>
              <th colspan="2" class="tittabla">VARIACION</th>
            </tr>
            <tr class="avances" style="background: #fce4ec;font-size: .8em;">
              <th class="tittabla">CANTIDAD</th>
              <th class="tittabla">%</th>
            </tr>

          <tbody id="resultBusqueda">

          </tbody>
        </table>


</div>
<!-- /.content-wrapper -->
</section>



@endsection
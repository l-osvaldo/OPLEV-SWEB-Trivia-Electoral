@extends('layouts.app')

@section('content')


<form method="get" action="{{ route('reportes.rtrimestralperiodo') }}" enctype="multipart/form-data" class="col-md-12 col-12" target="_blank">
  {{ csrf_field() }}


<div class="container">
  <div class="row">

     <div style="height: auto;padding: 3em 0; width: 100%;">

      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Avance por Periodo</li>
          <li class="breadcrumb-item active" style="color: #EA0D94;">Reporte Individual</li>
        </ol>
      </nav>

    
    <div class="col align-self-center" style="background: #eceff1;padding:1%;box-shadow: 0 2px 4px rgba(0,0,0,.15);">

      <label>1. Seleccione un Área</label>
          <select class="form-control validar" data-error="1" id="periodoarea" name="periodoarea">
            <option value="0">Seleccione un Área</option>
            @foreach( $areas as $area )
              <option value="{{$area->idarea}}">{{$area->nombrearea}}</option>
            @endforeach
          </select>
      </div>


      <div class="col align-self-center" style="background: #eceff1;padding:1%;box-shadow: 0 2px 4px rgba(0,0,0,.15);">
      <label>2. Seleccione un Programa</label>
          <select class="form-control validar" data-error="1" id="periodopro" name="periodopro">
              <option value="0">Seleccione un Programa</option>    
          </select>
      </div>


      <div class="col align-self-center" style="background: #eceff1;padding:1%;box-shadow: 0 2px 4px rgba(0,0,0,.15);">
      <label>3. Seleccione un Programa Específico</label>
          <select class="form-control validar" data-error="1" id="periodoproesp" name="periodoproesp">
            <option value="0">Programa Específico</option>                      
          </select>
      </div>

      <div class="col align-self-center" style="background: #eceff1;padding:1%;box-shadow: 0 2px 4px rgba(0,0,0,.15);">
      <label>4. Mes inicial</label>
          <select class="form-control validar" data-error="1" id="minicial" name="minicial">
            <option value="0">Mes inicial</option>
            <option value="1">Enero</option>
            <option value="2">Febrero</option>
            <option value="3">Marzo</option>
            <option value="4">Abril</option>
            <option value="5">Mayo</option>
            <option value="6">Junio</option>
            <option value="7">Julio</option>
            <option value="8">Agosto</option>
            <option value="9">Septiembre</option>
            <option value="10">Octubre</option>
            <option value="11">Noviembre</option>
            <option value="12">Diciembre</option>
          </select>
      </div>


      <div class="col align-self-center" style="background: #eceff1;padding:1%;box-shadow: 0 2px 4px rgba(0,0,0,.15);">
      <label>5. Mes final</label>
          <select class="form-control validar" data-error="1" id="mfinal" name="mfinal">
            <option value="0">Mes final</option>
          </select>
      </div>

     
    
    </div>

   </div>

  <button id="pdfAdicionalesGral" type="submit" class="btn btn-primary EnaBtn" disabled="true">Generar PDF</button>
</div>

</form>

      <!--form method="get" action="{{ route('reportes.rtrimestralall') }}" target="_blank" class="col-md-12 col-12">
        <input type="hidden" id="datatrimestre" name="datatrimestre" value="1">                    
        <button id="pdfAdicionalesGral" type="submit" class="btn btn-primary">Generar PDF General</button>
      </form-->

@endsection
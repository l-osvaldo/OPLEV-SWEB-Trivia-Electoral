@extends('layouts.app')

@section('content')


  <!--section class="content-header">
    <h3>
      <small>Reportes de Indicadores</small>
    </h3>
  </section-->

<section class="content" style="padding-top: 2em;">
    <div class="container">
    <!-- Espacio de Trabajo -->


    @if ( $errors->any() )
      <div class="row">
        <div class="col-12">
          <div class="box">
            <ul class="alert alert-danger">
              @foreach ( $errors->all() as $error )
                <p class="media-body pb-1 mb-0 small lh-125">* {{ $error }}</p>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    @endif

<form method="post" action="{{ $action }}" enctype="multipart/form-data" class="col-md-12 col-12" target="_blank">
  {{ csrf_field() }}



<div class="row">
  <div class="col-md-12 form-row" style="margin: 1em 0 1em 0;padding: 1em 0;background: #eceff1;padding:1%;box-shadow: 0 2px 4px rgba(0,0,0,.15);">
    <div class="contInput">
<label>1. Seleccione el área:</label>                 
              <select class="form-control" id="area_admin" name="area_admin">
                <option value="0">Áreas...</option>      
                @foreach( $areas as $area )
                <option value="{{ $area->idarea }}" @if(old('area_admin') == $area->idarea) {{ 'selected' }} @endif>{{$area->nombrearea}}</option>
                @endforeach                                     
              </select>
              <br> 
            <label>2. Seleccione el mes del reporte:</label>                 
              <select class="form-control" id="mes_admin" name="mes_admin">
                <option value="0">Mes...</option>      
                @foreach( $meses as $mes )
                  <option value="{{ $mes->idmes }}" @if(old('mes_admin') == $mes->idmes) {{ 'selected' }} @endif>{{$mes->mes}}</option>
                @endforeach                                     
              </select> 
              <br>
            <label>3. Seleccione el programa:</label>                  
              <select class="form-control" id="programa_admin" name="programa_admin">
                <option value="0">Programa...</option>
                @foreach( $programas as $programa )
                  <option value="{{ $programa->idprograma }}" @if(old('programa_admin') == $programa->idprograma) {{ 'selected' }} @endif>{{$programa->claveprograma}} - {{$programa->descprograma}}</option>
                @endforeach
              </select>
              <br>
            <label>4. Seleccione el programa específico:</label>                  
              <select class="form-control" id="programaEsp_admin" name="programaEsp_admin">
                <option value="0">Programa Específico...</option>
              </select>
              <br>
            <label>5. Seleccione la actividad para el indicador:</label>            
                <div class="form-group" id="divActividad">
                    <select class="form-control" id="actividades_admin" name="actividades_admin">
                    </select>
                  </div>
             

</div>
</div>
</div>
 <button type="submit" class="btn btn-primary">Generar Reporte de Indicador <i class="fa fa-file-pdf-o"></i></button>


  </form>
 </div>
  </section>



@endsection
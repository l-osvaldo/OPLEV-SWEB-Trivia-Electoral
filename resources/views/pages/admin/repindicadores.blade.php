@extends('layouts.app')

@section('content')


  <!--section class="content-header">
    <h3>
      <small>Reportes de Indicadores</small>
    </h3>
  </section-->

  <section>
    <br>
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


  <!--div class="row">
    <div class="col-3 col-lg-3 col-md-3">
      <div class="box">
        <div class="row">
          <div class="col-12">
            <div class="ribbon-wrapper">
              <div class="ribbon ribbon-primary ribbon-perfil">                
                <h4>Perfil de Trabajo</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-4 col-lg-4 col-md-4">
      <div class="box">
        <div class="row">
          <div class="col-12">
            <div class="ribbon-wrapper ribbon-rosa ribbon-area">
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <span class="titareames">{{ Auth::user()->name }}</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div-->

<div class="col-md-12">
  <section class="content">
    <div class="container">
  
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      
            <div class="form-group">
              <p class="textoPrincipal">1. Seleccione el área:</p>                 
              <select class="form-control" id="area_admin" name="area_admin">
                <option value="0">Áreas...</option>      
                @foreach( $areas as $area )
                <option value="{{ $area->idarea }}" @if(old('area_admin') == $area->idarea) {{ 'selected' }} @endif>{{$area->nombrearea}}</option>
                @endforeach                                     
              </select> 
            </div>
            <div class="form-group">
              <p class="textoPrincipal">2. Seleccione el mes del reporte:</p>                 
              <select class="form-control" id="mes_admin" name="mes_admin">
                <option value="0">Mes...</option>      
                @foreach( $meses as $mes )
                  <option value="{{ $mes->idmes }}" @if(old('mes_admin') == $mes->idmes) {{ 'selected' }} @endif>{{$mes->mes}}</option>
                @endforeach                                     
              </select> 
            </div>
            <div class="form-group">
              <p class="textoPrincipal">3. Seleccione el programa:</p>                  
              <select class="form-control" id="programa_admin" name="programa_admin">
                <option value="0">Programa...</option>
                @foreach( $programas as $programa )
                  <option value="{{ $programa->idprograma }}" @if(old('programa_admin') == $programa->idprograma) {{ 'selected' }} @endif>{{$programa->claveprograma}} - {{$programa->descprograma}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <p class="textoPrincipal">4. Seleccione el programa específico:</p>                  
              <select class="form-control" id="programaEsp_admin" name="programaEsp_admin">
                <option value="0">Programa Específico...</option>
              </select>
            </div>

              <p class="textoPrincipal">5. Seleccione la actividad para el indicador:</p>            
                <div class="form-group" id="divActividad">
                    <select class="form-control" id="actividades_admin" name="actividades_admin">
                    </select>
                  </div>
              <br>

              <button type="submit" class="btn btn-secondary">Generar Reporte de Indicador&nbsp;&nbsp;<i class="fa fa-file-pdf-o"></i></button>
    </div>  
  </div>


    </div>
  </section>
</div>

  </form>




@endsection
@extends('layouts.app')

@section('content')


  <section class="content-header">
    <h3>
      <small>Reportes de Programa Operativo Anual</small>
    </h3>
  </section>

  <section>
  	<br>
  	<!-- Espacio de Trabajo -->

<form method="post" action="{{ $action }}" enctype="multipart/form-data" class="col-md-12 col-12">
  {{ csrf_field() }}


  <div class="row">
    <div class="col-6 col-lg-6 col-md-6">
      <div class="box">
        <div class="row">
          <div class="col-12">
            <div class="ribbon-wrapper ribbon-rosa">
              <div class="ribbon ribbon-primary">
                Unidad Responsable
              </div>
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
  </div>

  
	<div class="row">
    <div class="col-md-6 col-lg-6">
      <div class="box">
        <div class="box-body">
          <div class="col-12">
            <div class="form-group">

              <label>1. Seleccione el mes del reporte:</label>                  
              <select class="form-control" id="idmesreportar" name="idmesreportar">
                <option value="0">Mes...</option>      
                @foreach( $meses as $mes )
                  <option value="{{$mes->idmes}}">{{$mes->mes}}</option>
                @endforeach                                     
              </select> 
              <br>

              <label>2. Seleccione el programa:</label>                  
              <select class="form-control" id="programa" name="programa">
                <option value="0">Programa...</option>
                @foreach( $programas as $programa )
                  <option value="{{$programa->idprograma}}">{{$programa->claveprograma}} - {{$programa->descprograma}}</option>
                @endforeach
              </select>
              <br>

              <label>3. Seleccione el programa específico:</label>                  
              <select class="form-control" id="programaEsp" name="programaEsp">
                <option value="0">Programa Específico...</option>
              </select>
              <br>

              <button type="submit" class="btn btn-dark">Generar Reporte&nbsp;&nbsp;<i class="fa fa-caret-square-o-right"></i></button>
              <div class="clearfix">&nbsp;</div>

            </div>
          </div>
        </div>
      </div>
    </div>	
	</div>



  </form>

  </section>



@endsection
@extends('layouts.app')

@section('content')


  <!--section class="content-header">
    <h4>Reportes de Indicadores</h4>
  </section-->

  <div class="col-md-12">
    <!-- Main content -->
<section class="content">

  <div class="container">


    @if ( $errors->any() )
      <div class="row">
        <div class="col-12">
          <div class="box">
            <!--ul class="alert alert-danger">
              @foreach ( $errors->all() as $error )
                <p class="media-body pb-1 mb-0 small lh-125">* {{ $error }}</p>
              @endforeach
            </ul-->
          </div>
        </div>
      </div>
    @endif

<form method="post" action="{{ $action }}" enctype="multipart/form-data" class="col-md-12 col-12" target="_blank">
  {{ csrf_field() }}


  <!--div class="row">
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
  </div-->

  
  <div class="row" style="padding-top: 2%;">
    <h4>Reportes de Indicadores</h4>
    <div class="col-md-12 form-row" style="margin: 1em 0 1em 0;padding: 1em 0;background: #eceff1;padding:1%;box-shadow: 0 2px 4px rgba(0,0,0,.15);">


        

          <div class="col-12">
            

              <label>1. Seleccione el mes del reporte:</label>                  
              <select class="form-control validar" id="idmesreportar" data-error="1" name="idmesreportar">
                <option value="0">Mes...</option>      
                @foreach( $meses as $mes )
                <option value="{{ $mes->idmes }}" @if(old('idmesreportar') == $mes->idmes) {{ 'selected' }} @endif>{{$mes->mes}}</option>
                @endforeach                                     
              </select> 
              <br>

              <label>2. Seleccione el programa:</label>                  
              <select class="form-control validar" id="programa" data-error="1" name="programa">
                <option value="0">Programa...</option>
                @foreach( $programas as $programa )
                  <option value="{{ $programa->idprograma }}" @if(old('programa') == $programa->idprograma) {{ 'selected' }} @endif>{{$programa->claveprograma}} - {{$programa->descprograma}}</option>                @endforeach
              </select>
              <br>

              <label>3. Seleccione el programa específico:</label>                  
              <select class="form-control validar" id="programaEsp" data-error="1" name="programaEsp">
                <option value="0">Programa Específico...</option>
              </select>
              <br>


              <label>4. Seleccione la actividad para el indicador:</label>                  
                  <div class="form-group" id="divActividad">
                    <select class="form-control validar" id="actividades" data-error="1" name="actividades">
                      <option value="0">---</option>
                    </select>
                  </div>

              <button type="submit" id="btnvalidar" class="btn btn-primary EnaBtn" disabled="true">Generar Reporte de Indicador <i class="fa fa-file-pdf-o"></i></button>

           
          </div>
       
    </div>  
  </div>



  </form>

</div>
</section>
</div>

<!--script src="http://sipsei.test/js/jquery.min.js"></script>
<script type="text/javascript">

var EnaBtn = document.getElementsByClassName('EnaBtn')[0];
var classname = document.getElementsByClassName("validar");

for (var i = 0; i < classname.length; i++) {
    classname[i].addEventListener('change', validardatos, false);
}

function validardatos() {
  EnaBtn.disabled = true;
  for (var i = 0; i < classname.length; i++) {
    if (classname[i].value === '0' || classname[i].value === '' || classname[i].value === null || classname[i].value === 'undefined') {
      classname[i].setAttribute('data-error', '1');
    }
  }
  this.value != 0 ? this.setAttribute('data-error', '0') : this.setAttribute('data-error', '1');
  disabledBTN();
}
  
function disabledBTN() {
  var valArr = []; 
  for (var i = 0; i < classname.length; i++) {
      valArr.push(classname[i].getAttribute('data-error'));
  }
  valArr.includes('1') ? EnaBtn.disabled = true : EnaBtn.disabled = false;
}

</script-->

@endsection
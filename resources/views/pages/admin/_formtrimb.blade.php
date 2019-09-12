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


<form method="post" action="{{ $action }}" enctype="multipart/form-data" class="col-md-12 col-12">
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
                    <span class="titareames">{{ Auth::user()->name }}  </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div-->




<div class="col-md-12 form-row" style="margin: 1em 0 1em 0;padding: 1em 0;background: #eceff1;padding:1%;box-shadow: 0 2px 4px rgba(0,0,0,.15);">
    
    <div class="col-md-6" style="margin-bottom: 1em;">
    <label>1. Seleccione un Área</label>
                    <select class="form-control" id="area_trim" name="area_trim" >
                      <option value="0">Área...</option>
                      @foreach( $areas as $area )
                        @if ($area->idarea == $arrTrimestral['idarea'])
                          <option selected value="{{$area->idarea}}">{{$area->nombrearea}}</option>
                        @else
                          <option value="{{$area->idarea}}">{{$area->nombrearea}}</option>
                        @endif
                       @endforeach
      </select>
    </div>

    <div class="col-md-6" style="margin-bottom: 1em;">
    <label>2. Seleccione un Programa</label>   
        <select class="form-control" id="programa_trima" name="programa_trim" >
          <option value="0">Programa...</option>
          @foreach( $programas as $programa )
            @if ($programa->idprograma == $arrTrimestral['idprograma'])
              <option selected value="{{$programa->idprograma}}">{{$programa->claveprograma}} - {{$programa->descprograma}}</option>
            @else
              <option value="{{$programa->idprograma}}">{{$programa->claveprograma}} - {{$programa->descprograma}}</option>
            @endif  
           @endforeach
        </select>
    </div>

      <div class="col-md-6" style="margin-bottom: 1em;">
        <label>3. Seleccione un Programa Específico</label>
            <select class="form-control" id="programaEsp_trim" name="programaEsp_trim">
            <option value="0">Programa Específico...</option>                      
            @foreach( $programaesp as $pespecifico )
            @if ($pespecifico->idprogramaesp == $arrTrimestral['idprogramaesp'])
            <option selected value="{{$pespecifico->idprogramaesp}}">{{$pespecifico->claveprogramaesp}} - {{$pespecifico->descprogramaesp}}</option>
            @else
            <option value="{{$pespecifico->idprogramaesp}}">{{$pespecifico->claveprogramaesp}} - {{$pespecifico->descprogramaesp}}</option>
            @endif  
            @endforeach                      
        </select>
    </div>


    <div class="col-md-6" style="margin-bottom: 1em;">
          <label>4. Seleccione un Trimestre</label>
            <select class="form-control" id="trimestre_trim" name="trimestre_trim">
              <option value="0">Trimestre...</option>
              @foreach( $trimestres as $trimestre )
                @if ($trimestre->id == $arrTrimestral['idtrimestral'])
                  <option selected value="{{$trimestre->id}}">{{$trimestre->trimestre}}</option>
                 @else
                  <option value="{{$trimestre->id}}">{{$trimestre->trimestre}}</option>
                @endif
               @endforeach
            </select>
  </div>


</div>

@if ( ! empty( $put ) )
        <input type="hidden" name="_method" value="PUT">
      @endif      
      <input type="hidden" name="redirect" value="{{ route('programa.index') }}">
      @if(Auth::user()->hasRole('admin')) 
        <button type="submit" class="btn btn-primary EnaBtn" id="btnGenerar_trim" name="btnGenerar_trim">Generar Trimestral</button>      
        <div class="clearfix">&nbsp;</div>
      @endif      

</form>

  <div class="row" id="tablaresultados" name="tablaresultados">
    {{ csrf_field() }}
    <div class="col-md-12 col-12" style="position: relative;">


        <table border="3" style="font-size: .9em;text-align: center;border:solid 2px #e3e3e3;background: #fff">

          <tbody>
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

            @foreach ($trimestral as $key => $trim )
              @if ($trim->reprogramacion == 0)              
                <tr class="">
              @endif
              @if ($trim->reprogramacion == 1)
                <tr class="actcambio">
              @endif
              @if ($trim->reprogramacion == 2)              
                <tr class="actnueva">
              @endif              
              @if ($trim->reprogramacion == 3)              
                <tr class="actborradaafectatrimestral">
              @endif
                <td class="tittabla">{{ $key + 1 }}</td>
                <td class="justificado">{{ $trim->descactividad }}</td>   
                <td class="centrado">{{ $trim->unidadmedida }}</td>   
                <td class="centrado">{{ $trim->cantidadanual }}</td>   
                <td class="centrado">{{ $trim->inicio }} - {{ $trim->termino }} </td>   
                <td class="centrado">{{ $trim->avtprogramado }}</td>   
                <td class="centrado">{{ $trim->avtrealizado }}</td>   
                <td class="centrado">{{ $trim->avtvariacion }}</td>   
                <td class="centrado">{{ $trim->avaprogramado }}</td>   
                <td class="centrado">{{ $trim->avarealizado }}</td>   
                <td class="centrado">{{ $trim->avacantidad }}</td>   
                <td class="centrado">{{ $trim->avaporcentaje }}</td>
                <td class='observatrim' id='{{ $trim->idactividad }}'>{{ $trim->observatrim }}</td>                   
              </tr>
            @endforeach

          </tbody>
        </table>

    </div>
  </div>



<br>




<form method="post" action="{{ route('reportes.poa.trimestral') }}" enctype="multipart/form-data" class="col-md-12 col-12" target="_blank">
  {{ csrf_field() }}

  <div class="row">
    <div class="col-md-3 col-3">  
      <input type="hidden" id="areareporte" name="areareporte" value="">
      <input type="hidden" id="mesreporte" name="mesreporte" value="">
      <input type="hidden" id="programareporte" name="programareporte" value="">
      <input type="hidden" id="programaespreporte" name="programaespreporte" value="">    
      @if(Auth::user()->hasRole('admin'))   
      <br>
        <button type="submit" class="btn btn-primary" id="btnReporteTrimestral" name="btnReporteTrimestral">Reporte Trimestral&nbsp;&nbsp;<i class="fa fa-file-pdf-o"></i></button>
        <div class="clearfix">&nbsp;</div>
      @endif
    </div>
  </div>
</form>  
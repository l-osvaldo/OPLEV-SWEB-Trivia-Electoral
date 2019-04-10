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


  <div class="row">
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
  </div>


  <div class="row">



    <div class="col-3 col-lg-3 col-md-3">
      <div class="box">
        <div class="row">
          <div class="col-12">
            <div class="ribbon-wrapper ribbon-blanco">
              <div class="ribbon ribbon-primary">
                <span class="numpasos">1.</span> Seleccione un Área
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
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
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="col-3 col-lg-3 col-md-3">
      <div class="box">
        <div class="row">
          <div class="col-12">
            <div class="ribbon-wrapper ribbon-blanco">
              <div class="ribbon ribbon-primary">
                <span class="numpasos">2.</span> Seleccione un Programa
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <select class="form-control" id="programa_trim" name="programa_trim" >
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
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-3 col-lg-3 col-md-3">
      <div class="box">
        <div class="row">
          <div class="col-12">
            <div class="ribbon-wrapper ribbon-blanco">
              <div class="ribbon ribbon-primary">
                <span class="numpasos">3.</span> Seleccione un Programa Específico
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="form-group" id="divProgramaEsp">
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
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-3 col-lg-3 col-md-3">
      <div class="box">
        <div class="row">
          <div class="col-12">
            <div class="ribbon-wrapper ribbon-blanco">
              <div class="ribbon ribbon-primary">
                <span class="numpasos">4.</span> Seleccione un Trimestre
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="form-group" id="divTrimestre">
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
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-md-3 col-3">
      @if ( ! empty( $put ) )
        <input type="hidden" name="_method" value="PUT">
      @endif      
      <input type="hidden" name="redirect" value="{{ route('programa.index') }}">
      @if(Auth::user()->hasRole('admin')) 
        <button type="submit" class="btn btn-block btn-dark" id="btnGenerar_trim" name="btnGenerar_trim">Generar Trimestral</button>      
        <div class="clearfix">&nbsp;</div>
      @endif      
    </div>
  </div> 
</form>

  <div class="row" id="tablaresultados" name="tablaresultados">
    {{ csrf_field() }}
    <div class="col-md-12 col-12">
      <div style="overflow-x:auto !important;">

        <table width="100%" class='' border="1">
          <thead>


            <tr class="avances">
              <th rowspan="3" class="tittabla">No. <br>ACT.</th>
              <th rowspan="3" class="tittabla">ACTIVIDAD</th>
              <th colspan="2" class="tittabla">META ANUAL</th>
              <th rowspan="3" class="tittabla">PERIODO <br>CALENDARIZADO</th>
              <th colspan="3" class="tittabla">AVANCE TRIMESTRAL</th>
              <th colspan="4" class="tittabla">AVANCE ACUMULADO</th>
              <th rowspan="3" class="tittabla">OBSERVACIONES</th>
            </tr>
            <tr class="avances">
              <th rowspan="2" class="tittabla">UNIDAD DE<br>MEDIDA</th>
              <th rowspan="2" class="tittabla">CANTIDAD</th>
              <th rowspan="2" class="tittabla">PROGRAMADO</th>
              <th rowspan="2" class="tittabla">REALIZADO</th>
              <th rowspan="2" class="tittabla">VARIACION %</th>
              <th rowspan="2" class="tittabla">PROGRAMADO</th>
              <th rowspan="2" class="tittabla">REALIZADO</th>
              <th colspan="2" class="tittabla">VARIACION</th>
            </tr>
            <tr class="avances">
              <th class="tittabla">CANTIDAD</th>
              <th class="tittabla">%</th>
            </tr>


          </thead>
          <tbody>

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
        <button type="submit" class="btn btn-block btn-purple" id="btnReporteTrimestral" name="btnReporteTrimestral">Reporte Trimestral&nbsp;&nbsp;<i class="fa fa-file-pdf-o"></i></button>
        <div class="clearfix">&nbsp;</div>
      @endif
    </div>
  </div>
</form>  
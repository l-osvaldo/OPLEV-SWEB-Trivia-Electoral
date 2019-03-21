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
                        <option value="{{$area->idarea}}">{{$area->nombrearea}}</option>
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
                        <option value="{{$programa->idprograma}}">{{$programa->claveprograma}} - {{$programa->descprograma}}</option>
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
                        <option value="{{$trimestre->id}}">{{$trimestre->trimestre}}</option>
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


  </div> <!-- del primer .col-md-12 col-12 -->

</form>

<form method="post" action="{{ route('reportes.poa') }}" enctype="multipart/form-data" class="col-md-12 col-12" target="_blank">
  {{ csrf_field() }}

  <div class="row">
    <div class="col-md-3 col-3">  
      <input type="hidden" id="areareporte" name="areareporte" value="">
      <input type="hidden" id="mesreporte" name="mesreporte" value="">
      <input type="hidden" id="programareporte" name="programareporte" value="">
      <input type="hidden" id="programaespreporte" name="programaespreporte" value="">    
      @if(Auth::user()->hasRole('admin'))   
      <button type="submit" class="btn btn-block btn-purple" id="btnReporteMensual_trim" name="btnReporteMensual_trim">Reporte Mensual&nbsp;&nbsp;<i class="fa fa-file-pdf-o"></i></button>      
      <div class="clearfix">&nbsp;</div>
      @endif
    </div>
  </div>

</form>  
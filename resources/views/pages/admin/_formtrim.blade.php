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
                <h4>Perfil de Trabajo22</h4>
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
          <div class="col-6">
            <div class="ribbon-wrapper ribbon-blanco">
              <div class="ribbon ribbon-primary">
                <p class="textoPrincipal">1. Seleccione un Área</p>
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

            <div class="ribbon-wrapper ribbon-blanco">
              <div class="ribbon ribbon-primary">
                <p class="textoPrincipal">2. Seleccione un Programa</p>
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

            <div class="ribbon-wrapper ribbon-blanco">
              <div class="ribbon ribbon-primary">
                <p class="textoPrincipal">3. Seleccione un Programa Específico</p>
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

            <div class="ribbon-wrapper ribbon-blanco">
              <div class="ribbon ribbon-primary">
                <p class="textoPrincipal">4. Seleccione un Trimestre</p>
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


    <div class="row">

    <div class="col-md-3"></div>
          <div class="col-3">
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


</div>
</section>
</div>





</form>


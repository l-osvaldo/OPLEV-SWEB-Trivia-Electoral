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
    <div class="col-6 col-lg-6 col-md-6">
      <div class="box">
        <div class="row">
          <div class="col-12">
            <div class="ribbon-wrapper ribbon-rosa">
              <div class="ribbon ribbon-primary">
                Mes en dónde se dio la actividad adicional
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <span class="titareames">{{$mes[0]->mes}}</span>
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
    <div class="col-12 col-lg-12 col-md-12">
      <div class="box">
        <div class="row">
          <div class="col-12">
            <div class="ribbon-wrapper ribbon-blanco">
              <div class="ribbon ribbon-primary">
                <span class="numpasos">1.</span> Descripción de la actividad adicional
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                  <textarea class="form-control textuppercase" rows="4" id="descadicional" name="descadicional" placeholder="">{{ old( 'descadicional', $adicional->descadicional ) }}</textarea>

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
    <div class="col-12 col-lg-12 col-md-12">
      <div class="box">
        <div class="row">
          <div class="col-12">
            <div class="ribbon-wrapper ribbon-blanco">
              <div class="ribbon ribbon-primary">
                <span class="numpasos">2.</span> Soporte para la actividad adicional
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                  <textarea class="form-control textuppercase" rows="4" id="soporteadicional" name="soporteadicional" placeholder="">{{ old( 'soporteadicional', $adicional->soporteadicional ) }}</textarea>

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
    <div class="col-12 col-lg-12 col-md-12">
      <div class="box">
        <div class="row">
          <div class="col-12">
            <div class="ribbon-wrapper ribbon-blanco">
              <div class="ribbon ribbon-primary">
                <span class="numpasos">3.</span> Observaciones
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                  <textarea class="form-control textuppercase" id="observaadicional" name="observaadicional" rows="4" placeholder="" value="">{{ old( 'observaadicional', $adicional->observaadicional ) }}</textarea>

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
      <input type="hidden" name="idmesreportar" value="{{$idmesreportar}}">
      <input type="hidden" name="redirect" value="{{ route('adicionales.index') }}">
      <button type="submit" class="btn btn-block btn-dark" id="btnGuardarAdicional" name="btnGuardarAdicional">Guardar Informaci&oacute;n</button>
      <div class="clearfix">&nbsp;</div>
    </div>
    <div class="col-md-3 col-3">
      <a class="btn btn-block btn-danger" href="{{ route('adicionales.index') }}">Cancelar</a>
      <div class="clearfix">&nbsp;</div>
    </div>
  </div> <!-- del primer .col-md-12 col-12 -->

</form>
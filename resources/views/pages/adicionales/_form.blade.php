
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
  <h4>Mes en dónde se dio la actividad adicional <span class="textoPrincipal">{{$mes[0]->mes}}</span></h4>
  <div class="col-md-12 form-row" style="margin: 1em 0 1em 0;padding: 1em 0;background: #eceff1;padding:1%;box-shadow: 0 2px 4px rgba(0,0,0,.15);">
    <div class="contInput">
    <label>1. Descripción de la actividad adicional</label>
    <textarea class="form-control textuppercase" rows="4" id="descadicional" name="descadicional" placeholder="">{{ old( 'descadicional', $adicional->descadicional ) }}</textarea>
  </div>
  </div>
</div>


<div class="row">
  <div class="col-md-12 form-row" style="margin: 1em 0 1em 0;padding: 1em 0;background: #eceff1;padding:1%;box-shadow: 0 2px 4px rgba(0,0,0,.15);">
    <div class="contInput">
    <label>2. Soporte para la actividad adicional</label>
    <textarea class="form-control textuppercase" rows="4" id="soporteadicional" name="soporteadicional" placeholder="">{{ old( 'soporteadicional', $adicional->soporteadicional ) }}</textarea>
  </div>
  </div>
</div>


<div class="row">
  <div class="col-md-12 form-row" style="margin: 1em 0 1em 0;padding: 1em 0;background: #eceff1;padding:1%;box-shadow: 0 2px 4px rgba(0,0,0,.15);">
    <div class="contInput">
    <label>3. Observaciones</label>
    <textarea class="form-control textuppercase" id="observaadicional" name="observaadicional" rows="4" placeholder="" value="">{{ old( 'observaadicional', $adicional->observaadicional ) }}</textarea>
  </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12 form-row" style="margin: 1em 0 1em 0;padding: 1em 0;padding:1%;">
    <div class="contInput">
      @if ( ! empty( $put ) )
        <input type="hidden" name="_method" value="PUT">
      @endif
      <input type="hidden" name="idmesreportar" value="{{$idmesreportar}}">
      <input type="hidden" name="redirect" value="{{ route('adicionales.index') }}">
      <button type="submit" class="btn btn-primary" id="btnGuardarAdicional" name="btnGuardarAdicional">Guardar Informaci&oacute;n</button>
      <a class="btn btn-secondary" href="{{ route('adicionales.index') }}">Cancelar</a>
    </div>
  </div>
</div>

</form>
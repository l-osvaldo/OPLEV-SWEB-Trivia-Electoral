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
<div class="col-md-12 form-row" style="margin: 1em 0 1em 0;padding: 1em 0;background: #eceff1;padding:1%;box-shadow: 0 2px 4px rgba(0,0,0,.15);">
<div class="contInput">
  <label>1. Seleccione un Área</label>
    <select class="form-control validar" data-error="1" id="area_trim" name="area_trim" >
        <option value="0">Área...</option>
        @foreach( $areas as $area )
        <option value="{{$area->idarea}}">{{$area->nombrearea}}</option>
        @endforeach
    </select>
    <br>


    <label>2. Seleccione un Programa</label>
      <select class="form-control validar" data-error="1" id="programa_trim" name="programa_trim" >
        <option value="0">Programa...</option>
        @foreach( $programas as $programa )
        <option value="{{$programa->idprograma}}">{{$programa->claveprograma}} - {{$programa->descprograma}}</option>
        @endforeach
      </select>
      <br>

      <label>3. Seleccione un Programa Específico</label>
        <select class="form-control validar" data-error="1" id="programaEsp_trim" name="programaEsp_trim">
          <option value="0">Programa Específico...</option>
        </select>
        <br>
                  
        <label>4. Seleccione un Trimestre</label>
          <select class="form-control validar" data-error="1" id="trimestre_trim" name="trimestre_trim">
            <option value="0">Trimestre...</option>
            @foreach( $trimestres as $trimestre )
              <option value="{{$trimestre->id}}">{{$trimestre->trimestre}}</option>
             @endforeach
          </select>
          <br>
</div>
</div>
</div>



      @if ( ! empty( $put ) )
      <input type="hidden" name="_method" value="PUT">
      @endif      
      <input type="hidden" name="redirect" value="{{ route('programa.index') }}">
      @if(Auth::user()->hasRole('admin')) 
        <button type="submit" class="btn btn-primary  EnaBtn" disabled="true" id="btnGenerar_trim" name="btnGenerar_trim">Generar Trimestral Individual</button>      
      @endif      








</form>

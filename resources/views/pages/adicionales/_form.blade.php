
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


<h4 style="padding: 2em 0;">Actividades Adicionales. Captura y Reportes<br><span style="color: #777; font-size: 18px;">Mes en dónde se dio la actividad adicional</span> <span class="textoPrincipal"  style="font-size: 18px;">{{$mes[0]->mes}}</span></h4>

<table class="table table-hover">
<thead>
    <tr>
      <th>Descripción</th>
      <th>Soporte</th>
      <th>Observaciones</th>
      <th></th>
      <th></th>
    </tr>
</thead>
<tbody id="contTableAdicionales">
  @foreach( $adicionales as $adicional )
      <tr>
        <td>{{$adicional->descadicional}}</td>
        <td>{{$adicional->soporteadicional}}</td>
        <td>{{$adicional->observaadicional}}</th>
        <th><i style="cursor: pointer;" class="fa fa-pencil-square-o openModalAdicional" aria-hidden="true" data-tipo="1" data-id="{{$adicional->id}}" data-toggle="modal" data-target=".bd-example-modal-xl" data-desc="{{$adicional->descadicional}}" data-sopo="{{$adicional->soporteadicional}}" data-obse="{{$adicional->observaadicional}}"></i></th>
        <th><i style="display: none;" class="fa fa-trash" aria-hidden="true" data-id="{{$adicional->id}}"></i></th>
      </tr>
  @endforeach
  </tbody>
</table>

<button class="btn btn-primary openModalAdicional" style="margin-top: 1em;" data-tipo="0" name="btnGuardarAdicional" data-toggle="modal" data-target=".bd-example-modal-xl" data-desc="" data-sopo="" data-obse="">Crear nueva actividad adicional</button>

<div id="mdAdicionales" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
     <div class="modal-header">
        <h5 class="modal-title" id="modalTituloAdicional">---</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
          <div class="form-group">
            <label>1. Descripción de la actividad adicional</label>
            <textarea rows="3" class="form-control textuppercase" id="descadicional" name="descadicional" placeholder=""></textarea>
          </div>
          <div class="form-group">
            <label>2. Soporte para la actividad adicional</label>
            <textarea rows="3" class="form-control textuppercase" id="soporteadicional" name="soporteadicional" placeholder=""></textarea>
          </div>
          <label>3. Observaciones</label>
          <textarea rows="3" class="form-control textuppercase" id="observaadicional" name="observaadicional" placeholder="" value=""></textarea>
          <input type="hidden" id="idmesreportar" name="idmesreportar" value="{{$idmesreportar}}">          

        <span id="errAdicional" style="color: red; margin-top: 1em;"></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" id="modalBtnAdicional" class="btn btn-primary">---</button>
      </div>
    </div>
  </div>
</div>


  <!--form method="post" action="" enctype="multipart/form-data" class="col-md-12 col-12">
  {{ csrf_field() }}


<div class="row" style="padding-top: 2em;">
  
  <div class="col-md-12 form-row" style="margin: 1em 0 1em 0;padding: 1em 0;background: #eceff1;padding:1%;box-shadow: 0 2px 4px rgba(0,0,0,.15);">
    <div class="contInput">

    <label>1. Descripción de la actividad adicional</label>
    <textarea rows="1" class="form-control textuppercase" id="descadicional" name="descadicional" placeholder=""></textarea>

    <label>2. Soporte para la actividad adicional</label>
    <textarea rows="1" class="form-control textuppercase" id="soporteadicional" name="soporteadicional" placeholder=""></textarea>

    <label>3. Observaciones</label>
    <textarea rows="1" class="form-control textuppercase" id="observaadicional" name="observaadicional" placeholder="" value=""></textarea>

  </div>
  </div>
</div-->


<!--div class="row">
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

</form-->
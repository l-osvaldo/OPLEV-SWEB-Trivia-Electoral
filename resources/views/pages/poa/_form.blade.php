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

  <h4>Mes a reportar: <span class="textoPrincipal">{{$mes[0]->mes}}</span></h4>

  <div class="col-md-12 form-row" style="margin: 1em 0 1em 0;padding: 1em 0;background: #eceff1;padding:1%;box-shadow: 0 2px 4px rgba(0,0,0,.15);">

    <div class="contInput">
    <label>1. Seleccione un Programa.</label>
        <select class="form-control validar" data-error="1" id="programaOP" name="programa" data-idmes={{$idmesreportar}}>
        <option value="0">Programa...</option>
          @foreach( $programas as $programa )
          <option value="{{$programa->idprograma}}">{{$programa->claveprograma}} - {{$programa->descprograma}}</option>
           @endforeach
        </select>
    </div>
    <div class="contInput">
        <label>2. Seleccione un Programa Específico.</label>
        <select class="form-control validar" data-error="1" id="programaEspOP" name="programaEsp">
          <option value="0">Programa Específico...</option>
        </select>   
    </div>  

    <div class="contInput">
          Objetivo: <strong id="objetivo" class="textoPrincipal"></strong>
    </div>

  </div>

</div>

<div class="row">

  <div class="col-md-12 form-row" style="margin: 1em 0 1em 0;padding: 1em 0;background: #eceff1;padding:1%;box-shadow: 0 2px 4px rgba(0,0,0,.15);">

    <div class="contInput">
      <label>3. Seleccione una Actividad</label>
    <select class="form-control validar" data-error="1" id="actividadesOP" name="actividades"></select>
    </div>

    <div class="contInput">
          Unidad de Medida: <strong id="unidadmedida" class="contenido contcentrado textoPrincipal"></strong><br>
          Cantidad Anual:  <strong id="cantidadanual" class="contenido contcentrado textoPrincipal"></strong>
    </div>

  </div>

</div>


<div class="row">
  <div class="col-md-12 form-row" style="margin: 1em 0 1em 0;padding: 1em 0;background: #eceff1;padding:1%;box-shadow: 0 2px 4px rgba(0,0,0,.15);">

    <div class="contInput">
      <label>Análisis Mensual</label>
    <table class='table table-bordered' style="background: #fff;">
                      <thead>
                        <tr style="background: #fce4ec;">
                          <th class="tittabla">Meses</th>
                          <th class="tittabla">Ene</th>
                          <th class="tittabla">Feb</th>
                          <th class="tittabla">Mar</th>
                          <th class="tittabla">Abr</th>
                          <th class="tittabla">May</th>
                          <th class="tittabla">Jun</th>
                          <th class="tittabla">Jul</th>
                          <th class="tittabla">Ago</th>
                          <th class="tittabla">Sep</th>
                          <th class="tittabla">Oct</th>
                          <th class="tittabla">Nov</th>
                          <th class="tittabla">Dic</th>
                          <th class="tittabla">Inicio</th>
                          <th class="tittabla">Término</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="tittabla">Programado</td>
                          <td class="mesEnero"><span id="enep"></span></td>
                          <td class="mesFebrero"><span id="febp"></span></td>
                          <td class="mesMarzo"><span id="marp"></span></td>
                          <td class="mesAbril"><span id="abrp"></span></td>
                          <td class="mesMayo"><span id="mayp"></span></td>
                          <td class="mesJunio"><span id="junp"></span></td>
                          <td class="mesJulio"><span id="julp"></span></td>
                          <td class="mesAgosto"><span id="agop"></span></td>
                          <td class="mesSeptiembre"><span id="sepp"></span></td>
                          <td class="mesOctubre"><span id="octp"></span></td>
                          <td class="mesNoviembre"><span id="novp"></span></td>
                          <td class="mesdiciembre"><span id="dicp"></span></td>
                          <td><span id="inicio"></span></td>
                          <td><span id="termino"></span></td>
                        </tr>
                        <tr>
                          <td class="tittabla">Realizado</td>
                          <td class="mesEnero"><span id="ener"></span></td>
                          <td class="mesFebrero"><span id="febr"></span></td>
                          <td class="mesMarzo"><span id="marr"></span></td>
                          <td class="mesAbril"><span id="abrr"></span></td>
                          <td class="mesMayo"><span id="mayr"></span></td>
                          <td class="mesJunio"><span id="junr"></span></td>
                          <td class="mesJulio"><span id="julr"></span></td>
                          <td class="mesAgosto"><span id="agor"></span></td>
                          <td class="mesSeptiembre"><span id="sepr"></span></td>
                          <td class="mesOctubre"><span id="octr"></span></td>
                          <td class="mesNoviembre"><span id="novr"></span></td>
                          <td class="mesdiciembre"><span id="dicr"></span></td>
                          <td></td>
                          <td></td>
                        </tr>
                      </tbody>
                    </table>
    </div>

    <script type="text/javascript">
      var x = document.getElementsByClassName('mes{{$mes[0]->mes}}')[0];
      var y = document.getElementsByClassName('mes{{$mes[0]->mes}}')[1];
      x.style.backgroundColor = "#546e7a";
      x.style.color = "#fff";
      //x.innerHTML='<i class="fa fa-check iconCheck"></i>';
      x.style.textAlign = "center";
      y.style.backgroundColor = "#546e7a";
      y.style.color = "#fff";
      //y.innerHTML='<i class="fa fa-check iconCheck"></i>';
      y.style.textAlign = "center";
    </script>

    <div class="row">
    <div class="col-md-12" style="margin-bottom: 1em;">

        <label>4. Realizado en este Mes - <span class="textoPrincipal">{{$mes[0]->mes}}</span></label>
        <div class="row">
          <div class="col-md-6">            
            <input type="text" class="form-control cantidadrealizada" id="realizadomes" name="realizadomes" placeholder="" maxlength="3">
          </div>
        </div>

    </div>
    </div>

  </div>
</div>


<div class="row">

  <div class="col-md-12 form-row" style="margin: 1em 0 1em 0;padding: 1em 0;background: #eceff1;padding:1%;box-shadow: 0 2px 4px rgba(0,0,0,.15);">

    <div class="contInput">
      <label>5. Descripción de la Actividad</label>
      <textarea class="form-control textuppercase" rows="4" id="descactividad" name="descactividad" placeholder=""></textarea>
    </div>

  </div>

</div>


<div class="row">

  <div class="col-md-12 form-row" style="margin: 1em 0 1em 0;padding: 1em 0;background: #eceff1;padding:1%;box-shadow: 0 2px 4px rgba(0,0,0,.15);">

    <div class="contInput">
      <label>6. Soporte</label>
     <textarea class="form-control textuppercase" rows="4" id="soporte" name="soporte" placeholder=""></textarea>
    </div>

  </div>

</div>


<div class="row">

  <div class="col-md-12 form-row" style="margin: 1em 0 1em 0;padding: 1em 0;background: #eceff1;padding:1%;box-shadow: 0 2px 4px rgba(0,0,0,.15);">

    <div class="contInput">
      <label>7. Observaciones</label>
    <textarea class="form-control textuppercase" id="observaciones" name="observaciones" rows="4" placeholder=""></textarea>
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
      <input type="hidden" name="redirect" value="{{ route('programa.index') }}">
      <button type="submit" class="btn btn-primary EnaBtn" disabled="true" id="btnGuardarInfo" name="btnGuardarInfo">Guardar Información</button>
      <a class="btn btn-secondary" href="{{ route('programa.index') }}">Cancelar</a>
    </div>
  </div>
</div>



</form>
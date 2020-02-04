

@extends('layouts.app')

@section('content')

<style type="text/css">
.mesesOff{text-align: center;background-color:#fce4ec;margin: 2% 2%;float: left;width: 12.6666666667%;font-size: 2em;color: #333;-moz-box-shadow:inset 0 0 5px #999;-webkit-box-shadow: inset 0 0 5px #999;box-shadow:inset 0 0 5px #999;border-radius: 5px;}

.mesesRep{text-align: center;background-color:#546e7a;margin: 2% 2%;float: left;width: 12.6666666667%;font-size: 2em;color: #fff;-moz-box-shadow:inset 0 0 10px #999;-webkit-box-shadow: inset 0 0 10px #999;box-shadow:inset 0 0 10px #999;border-radius: 5px;cursor:not-allowed;}

.mesesOn{text-align: center;background-color: #fff;margin: 2% 2%;cursor: pointer;float: left;width: 12.6666666667%;border-radius: 5px;font-size: 2em;color: #333;}

.mesesOn:hover{background-color: #EA0D94;color: #fff;}
.contPanel{box-shadow: 0 2px 4px rgba(0,0,0,.15);background: #f5f5f5;width: 100%;padding: 3%;}

.btn-primary:hover{background: #EA0D94; color: #fff; border:solid 1px #EA0D94; }
.btn-primary{background: #f8bbd0; color: #000; border:solid 1px #f8bbd0; }


</style>

  <div class="col-md-12">
    <!-- Main content -->
<section class="content">

  <div class="container">
    <!-- Espacio de Trabajo -->

<div class="row">
  <h4 style="margin-top: 5em;">Notificación mensual a la Unidad Técnica de Planeación</h4>
<div class="contPanel">
    <div id="enero" data-mesc="enero" class="mesesOff">ENE</div>
    <div id="febrero" data-mesc="febrero" class="mesesOff">FEB</div>
    <div id="marzo" data-mesc="marzo" class="mesesOff">MAR</div>
    <div id="abril" data-mesc="abril" class="mesesOff">ABR</div>
    <div id="mayo" data-mesc="mayo" class="mesesOff">MAY</div>
    <div id="junio" data-mesc="junio" class="mesesOff">JUN</div>
    <!--div id="jul" class="mesesOn" data-toggle="modal" data-target="#exampleModalCenter">JUL</div-->
    <div id="julio" data-mesc="julio" class="mesesOff" >JUL</div>
    <div id="agosto" data-mesc="agosto" class="mesesOff">AGO</div>
    <div id="septiembre" data-mesc="septiembre" class="mesesOff">SEP</div>
    <div id="octubre" data-mesc="octubre" class="mesesOff">OCT</div>
    <div id="noviembre" data-mesc="noviembre" class="mesesOff">NOV</div>
    <div id="diciembre" data-mesc="diciembre" class="mesesOff">DIC</div>
</div>
</div>

@foreach( $resultado as $resultados )
<script type="text/javascript">
  var meses = ['titulo','enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre'];
  var demos = '{{$resultados->ale_mes}}';
  document.getElementById(demos).classList.remove('mesesOff');
  document.getElementById(demos).classList.add("mesesRep");
  console.log(demos)
</script>
@endforeach
<script type="text/javascript">
var ele = document.getElementsByClassName('mesesRep');

if (ele.length===0) {
  var ini = document.getElementById('enero');
    ini.classList.remove('mesesOff');
    ini.classList.add('mesesOn');
    ini.setAttribute('data-toggle', 'modal');
    ini.setAttribute('data-target', '#exampleModalCenter');
    ini.setAttribute('data-id', 'ene');
} else {
var lastEle = ele[ ele.length-1 ];
var falta = lastEle.nextElementSibling;
    falta.classList.remove('mesesOff');
    falta.classList.add('mesesOn');
    falta.setAttribute('data-toggle', 'modal');
    falta.setAttribute('data-target', '#exampleModalCenter');
    falta.setAttribute('data-id', falta.id);
}

var meson = document.getElementsByClassName("mesesOn")[0];
meson.addEventListener('mousedown', setid, false);

function setid() {
  var id = this.getAttribute('data-id');
  document.getElementById('repEmail').setAttribute('data-mes',id);
}



</script>

<div class="row">

</div>
</div>
</section>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Ingrese su clave de confirmación.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon3"><i class="fa fa-key" aria-hidden="true"></i></span>
          </div>
          <input type="password" class="form-control" id="clave" name="clave" aria-describedby="basic-addon3" maxlength="6">

        </div>
        <div id="errorEmail" class="hidden" style="color: red;"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="repEmail" data-mes="">Notificar a UTP</button>
      </div>
    </div>
  </div>
</div>



@endsection


@extends('layouts.app')

@section('content')

<style type="text/css">
.mesesOff{text-align: center;background-color:#fce4ec;margin: 2% 2%;float: left;width: 12.6666666667%;font-size: 2em;color: #333;-moz-box-shadow:inset 0 0 5px #999;-webkit-box-shadow: inset 0 0 5px #999;box-shadow:inset 0 0 5px #999;border-radius: 5px;}

.mesesRep{text-align: center;background-color:#546e7a;margin: 2% 2%;float: left;width: 12.6666666667%;font-size: 2em;color: #fff;-moz-box-shadow:inset 0 0 10px #999;-webkit-box-shadow: inset 0 0 10px #999;box-shadow:inset 0 0 10px #999;border-radius: 5px;cursor:not-allowed;}

.mesesOn{text-align: center;background-color: #fff;margin: 2% 2%;cursor: pointer;float: left;width: 12.6666666667%;border-radius: 5px;font-size: 2em;color: #333;}

.mesesOn:hover{background-color: #EA0D94;color: #fff;}
.contPanel{box-shadow: 0 2px 4px rgba(0,0,0,.15);background: #f5f5f5;width: 100%;margin-top: 5em;padding: 3%;}

.btn-primary:hover{background: #EA0D94; color: #fff; border:solid 1px #EA0D94; }
.btn-primary{background: #f8bbd0; color: #000; border:solid 1px #f8bbd0; }


</style>

  <div class="col-md-12">
    <!-- Main content -->
<section class="content">

  <div class="container">
    <!-- Espacio de Trabajo -->

<div class="row">
<div class="contPanel">
    <h3 class="textoPrincipal">Notificación mensual</h3>
    <div id="ene" class="mesesOff">ENE</div>
    <div id="feb" class="mesesOff">FEB</div>
    <div id="mar" class="mesesOff">MAR</div>
    <div id="abr" class="mesesOff">ABR</div>
    <div id="may" class="mesesOff">MAY</div>
    <div id="jun" class="mesesOff">JUN</div>
    <!--div id="jul" class="mesesOn" data-toggle="modal" data-target="#exampleModalCenter">JUL</div-->
    <div id="jul" class="mesesOff" >JUL</div>
    <div id="ago" class="mesesOff">AGO</div>
    <div id="sep" class="mesesOff">SEP</div>
    <div id="oct" class="mesesOff">OCT</div>
    <div id="nov" class="mesesOff">NOV</div>
    <div id="dic" class="mesesOff">DIC</div>
</div>
</div>

@foreach( $resultado as $resultados )
<script type="text/javascript">
  var meses = ['titulo','ene','feb','mar','abr','may','jun','jul','ago','sep','oct','nov','dic'];
  var demos = '{{$resultados->ale_mes}}';
  document.getElementById(demos).classList.remove('mesesOff');
  document.getElementById(demos).classList.add("mesesRep");
</script>
@endforeach
<script type="text/javascript">
var ele = document.getElementsByClassName('mesesRep');

if (ele.length===0) {
  var ini = document.getElementById('ene');
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
        <button type="button" class="btn btn-primary" id="repEmail" data-mes="">Continuar y Notificar</button>
      </div>
    </div>
  </div>
</div>



@endsection


@extends('layouts.app')

@section('content')

<style type="text/css">
.mesesOff{text-align: center;background-color:#fce4ec;margin: 2% 2%;float: left;width: 12.6666666667%;font-size: 2em;color: #333;-moz-box-shadow:inset 0 0 5px #999;-webkit-box-shadow: inset 0 0 5px #999;box-shadow:inset 0 0 5px #999;border-radius: 5px;}

.mesesRep{text-align: center;background-color:#546e7a;margin: 2% 2%;float: left;width: 12.6666666667%;font-size: 2em;color: #fff;-moz-box-shadow:inset 0 0 10px #999;-webkit-box-shadow: inset 0 0 10px #999;box-shadow:inset 0 0 10px #999;border-radius: 5px;cursor:not-allowed;}

.mesesOn{text-align: center;background-color: #fff;margin: 2% 2%;border: dashed 1px #ccc;cursor: pointer;float: left;width: 12.6666666667%;border-radius: 5px;font-size: 2em;color: #333;}

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
    <h3 class="textoPrincipal">De clic en el mes que desea notificar</h3>
    <div class="mesesRep">ENE</div>
    <div class="mesesRep">FEB</div>
    <div class="mesesRep">MAR</div>
    <div class="mesesRep">ABR</div>
    <div class="mesesRep">MAY</div>
    <div class="mesesRep">JUN</div>
    <div class="mesesOn" data-toggle="modal" data-target="#exampleModalCenter">JUL</div>
    <div class="mesesOff">AGO</div>
    <div class="mesesOff">SEP</div>
    <div class="mesesOff">OCT</div>
    <div class="mesesOff">NOV</div>
    <div class="mesesOff">DIC</div>
</div>
</div>
<div class="row">
  <!--div class="col-md-3">
    <button type="submit" class="btn btn-block btn-danger">Reportar actividad</button>
  </div-->
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
            <span class="input-group-text" id="basic-addon3">Su clave de confirmación</span>
          </div>
          <input type="password" class="form-control" id="clave" name="clave" aria-describedby="basic-addon3" maxlength="6">

        </div>
        <div id="errorEmail" class="hidden" style="color: red;"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="repEmail" data-mes="jul">Continuar y Notificar</button>
      </div>
    </div>
  </div>
</div>



@endsection